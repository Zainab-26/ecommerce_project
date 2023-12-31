<?php
function set_message($message)
{
    if(!empty($message))
    {
        $_SESSION['Message'] = $message;
    }
    else
    {
        $message = "";
    }
}

function display_message()
{
    if(isset($_SESSION['Message']))
    {
        echo $_SESSION['Message'];
        unset($_SESSION['Message']);
    }
}


function display_error($err)
{
    echo "<p class='alert alert-danger'>$err</p>";
}

set_message("<p class='alert alert-danger'> The username or password is incorrect. Please try again.</p>");

function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4, $length);

    for($i=0; $i<$len; $i++)
    {
        $text .= rand(0,9);
    }
    return $text;
}

//Add category
function add_Category()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ctgrybtn']))
    {
       global $connection;
       $category_name = $_POST['category'];
       $statement = $connection->prepare("select * from category where Category_Name = ?");
       $statement->bind_param("s",$category_name );
       $statement->execute();
       $statement->store_result();

       if($statement->num_rows == 0)
       {
           $statement2 = $connection->prepare("insert into category(Category_Name) values (?)");
           $statement2->bind_param('s',$category_name);
           $statement2->execute();
           header("Location: manage_category.php");
           $statement2->close();
       }
       else
       {

       }
       $statement->free_result();
       $statement->close();
    }
}

//View category table
function view_category()
{
    global $connection;
    $sql = "select * from category";
    return mysqli_query($connection,$sql);
}


//Activate and Deactivate category status
function status_active()
{
    global $connection;
    if(isset($_GET['op']) && $_GET['op']!="")
    {
        $opr = $_GET['op'];
        $id = $_GET['id'];

        if($opr == 'Activate')
        {
          $status = 'Active';
        }
        else
        {
          $status = 'Deactive';
        }

        $query = "update category set Category_status = '$status' where Category_ID='$id'";
        $res = mysqli_query($connection,$query);

        if($res)
        {
            header("location:manage_category.php");
        }
    }
}


function change_user_type()
{
    global $connection;
    if(isset($_GET['op']) && $_GET['op']!="")
    {
        $opr = $_GET['op'];
        $id = $_GET['id'];

        if($opr == 'Change_type_cust')
        {
          $status = 'Customer';
        }
        else
        {
          $status = 'Admin';
        }

        $query = "update users set User_type = '$status' where User_ID='$id'";
        $res = mysqli_query($connection,$query);

        if($res)
        {
            header("location:manage_users.php");
        }
    }
}

//Add new supplier
function add_supplier()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['supplier_btn']))
    {
       global $connection;
       $supplier_ID = "";
       $supplier_name = $_POST['supplier_name'];
       $supplier_tel = $_POST['supplier_tel'];
       $supplier_email = $_POST['supplier_email'];
       $statement = $connection->prepare("select * from supplier where Supplier_Name = ?");
       $statement->bind_param("s",$supplier_name );
       $statement->execute();
       $statement->store_result();

       if($statement->num_rows == 0)
       {
           $statement2 = $connection->prepare("insert into supplier(Supplier_Name,Supplier_Tel,Supplier_Email) values (?,?,?)");
           $statement2->bind_param('sss',$supplier_name, $supplier_tel, $supplier_email);
           $statement2->execute();
           header("Location: manage_supplier.php");
           $statement2->close();
       }
       else
       {

       }
       $statement->free_result();
       $statement->close();
    }
}

//View supplier table
function view_supplier()
{
    global $connection;
    $sql = "select * from supplier";
    return mysqli_query($connection,$sql);
}

//Add product
function add_product()
{
    global $connection;
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product_btn']))
    {
        $sup_name = $_POST['supp_id'];
        $cat_name = $_POST['cat_id'];
        $product_name = $_POST['product_name'];;
        $unit_price = $_POST['unit_price'];
        $qty = $_POST['quantity_purchased'];

        $img = $_FILES['product_image']['name'];
        $type = $_FILES['product_image']['type'];
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $size = $_FILES['product_image']['size'];

        //$img_extension = explode('.',$img);
        $img_correct = strtolower(pathinfo($img,PATHINFO_EXTENSION));
        $allow = array('jpeg','jpg','png');
        $path = "img/Products/".$img;

        $stmt = $connection->prepare("SELECT * FROM inventory WHERE Item_Description = ?");
        $stmt->bind_param("s", $product_name);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows == 0){
        if(in_array($img_correct,$allow))
        {
            if($size<5000000)
            {
                if($cat_name == 0 || $sup_name == 0)
                {
                    echo "Please enter a valid input.";
                }
                else
                {
                    $sql = "insert into inventory(Supplier_ID,Category_ID,Item_Description,Image,Unit_Price,
                    Quantity_purchased) values (?,?,?,?,?,?)";
                    $statement = $connection->prepare($sql);
                    $statement->bind_param('ssssss',$sup_name, $cat_name,$product_name,$img,$unit_price,$qty);
                    move_uploaded_file($tmp_name,$path);
                    $statement->execute();
                    header("location:manage_inventory.php");
                    $statement->close();
                }

            }
        }
    }
        else
        {
            echo "The product already exists or the image file type is not supported. Please try again.";
        }

    }
    //$statement->free_result();

}

//View products
function view_products()
{
    global $connection;
    $sql = "select * from inventory";
    return mysqli_query($connection,$sql);
}

//Activate and deactivate product status
function product_status_active()
{
    global $connection;
    if(isset($_GET['op']) && $_GET['op']!="")
    {
        $opr = $_GET['op'];
        $id = $_GET['id'];

        if($opr == 'Activate')
        {
          $status = 'Active';
        }
        else
        {
          $status = 'Deactive';
        }

        $query = "update inventory set Status = '$status' where Inventory_ID='$id'";
        $res = mysqli_query($connection,$query);

        if($res)
        {
            header("location:manage_inventory.php");
        }
    }
}

//Display current product
function display_current_record()
{
    global $connection;
    if (isset($_GET['id']) && !empty($_GET['id'])) {

        $id2 = ($_GET['id']);
    
        $sql = "SELECT * FROM inventory WHERE Inventory_ID = $id2";
        $result = mysqli_query($connection,$sql);
        return $result;
    
}
}

function view_orders()
{
    global $connection;
    $sql = "select * from orders";
    return mysqli_query($connection,$sql);
}

function view_users()
{
    global $connection;
    $sql = "select * from users";
    return mysqli_query($connection,$sql);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>