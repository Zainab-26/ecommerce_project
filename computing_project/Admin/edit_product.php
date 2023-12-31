<?php
 require_once 'include/header.php';
$cat_view = view_category();
$supplier_view = view_supplier();
$product_view = display_current_record();

while ($row=mysqli_fetch_assoc($product_view))
{
    $product_id = $row['Inventory_ID'];
    $category_name = $row['Category_ID'];
    $supplier_name = $row['Supplier_ID'];
    $prod_name = $row['Item_Description'];
    $image = $row['Image'];
    $unit_price1 = $row['Unit_Price'];
    $qty_purchased = $row['Quantity_purchased'];
}
    //$img = $_FILES['product_image']['name'];
?>
<?php require_once 'include/navbar.php' ?>
<h1 class="heading_padding">Edit product</h1>
<br>

<form class="user" method="post" action="" enctype="multipart/form-data">

<div class="product">
<div class="form-group">
    <select name="supp_id"  class="custom-select" required>
        <option value="">Select Supplier</option>
        <?php 
             while($row = mysqli_fetch_assoc($supplier_view))
        { 
            if($category_name==$row['Supplier_ID'])
            {
        ?>
                <option selected value="<?php echo $row['Supplier_ID'] ?>"><?php echo $row['Supplier_Name'] ?></option>
        <?php
            }
            else{
                ?>
                 <option value="<?php echo $row['Supplier_ID'] ?>"><?php echo $row['Supplier_Name'] ?></option>

                <?php
            }
        
        } 
        ?>
    </select>                                 
</div>

<div class="form-group">
    <select name="cat_id" id="" class="custom-select" required>
        <option value="">Select Category</option>
        <?php 
             while($row = mysqli_fetch_assoc($cat_view))
        { 
            if($category_name==$row['Category_ID'])
            {

            
        ?>
                <option selected value="<?php echo $row['Category_ID'] ?>"><?php echo $row['Category_Name'] ?></option>
        <?php
            }
            else
            {
                ?>
                <option value="<?php echo $row['Category_ID'] ?>"><?php echo $row['Category_Name'] ?></option>
                <?php
            }
        
        } 
        ?>
    </select>                                 
</div>
<div class="form-group">
    <input type="text" class="form-control"
    placeholder="Enter Product name " name="product_name" value="<?php echo $prod_name ?>" required>                                   
</div>
<div class="form-group">
    <input type="file" class="form-control-file border" 
    placeholder="Upload product image" name="product_image" value="<?php echo $image ?>"required>                                   
</div>
<div class="form-group">
    <input type="text" class="form-control"
    placeholder="Enter Unit Price" name="unit_price" value="<?php echo $unit_price1 ?>" required>                                   
</div>
<div class="form-group">
    <input type="text" class="form-control"
    placeholder="Enter quantity purchased" name="quantity_purchased" value="<?php echo $qty_purchased ?>" required>                                   
</div>
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
<div class="center-align">
    <input id="btn" type="submit" value="Edit Product" class="btn btn-dark center-align " class="btn btn-dark btn-block" name="edit_product_btn">
</div>
<?php
     
?>
</div>
<?php

?>

</form>
<br>
<br>

<?php require_once 'include/footer.php' ?>

<?php 

if (isset($_POST['edit_product_btn'])) 
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

    $id1 = $_POST['product_id'];
    $stmt = $connection->prepare("UPDATE inventory SET Supplier_ID= ?, Category_ID= ?, Item_Description= ?, Image= ?, 
                                  Unit_Price= ?, Quantity_purchased= ? WHERE Inventory_ID= ?");
    $stmt->bind_param('sisssii',$sup_name, $cat_name,$product_name,$img,$unit_price,$qty,$id1);
    move_uploaded_file($tmp_name,$path);
    $stmt->execute(); 
    $stmt->close();
    header("location:manage_inventory.php");
}
else { $errorMessage='Could not update report data: ' . mysqli_error($connection); }

?>

