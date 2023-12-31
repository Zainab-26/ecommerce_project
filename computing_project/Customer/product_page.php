<?php require_once 'Includes/header.php' ?>
<?php require_once 'Includes/nav.php' ?>
<?php

$products = array();
if(isset($_POST['cartbtn']))
{
    if(isset($_SESSION['shopping_cart']))
    {
        $count = count($_SESSION['shopping_cart']);

        $products = array_column($_SESSION['shopping_cart'], 'id');

        if(!in_array(($_POST['hidden_prod_id']), $products))
        {   //Creating an array to store cart items
            $_SESSION['shopping_cart'][$count] = array
            (
                'id' => $_POST['hidden_prod_id'],
                'prod_name' => $_POST['hidden_prod_name'],
                'prod_qty' => $_POST['Quantity_purchased'],
                'prod_price' => $_POST['hidden_prod_price'],
                'prod_img' => $_POST['hidden_prod_image']
            );
        }
        else
        {   //Code for editing the cart items
            for($i = 0; $i < count($products); $i++)
            {
                if($products[$i] == $_POST['hidden_prod_id'])
                {
                    $_SESSION['shopping_cart'][$i]['prod_qty'] += $_POST['Quantity_purchased'];
                }
            }
        }
    }
    else
    {
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => $_POST['hidden_prod_id'],
            'prod_name' => $_POST['hidden_prod_name'],
            'prod_qty' => $_POST['Quantity_purchased'],
            'prod_price' => $_POST['hidden_prod_price'],
            'prod_img' => $_POST['hidden_prod_image']
        );
    }
    header("Location:cart.php");
}

?>
<?php
         $prod_id = "";
         if(isset($_GET['p_id']))
         {
             $prod_id = $_GET['p_id'];
         }
         $product = display_single_product($prod_id); 


      while($row = mysqli_fetch_assoc($product))
      {
?>
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" 
                    src="../Admin/img/Products/<?php echo $row['Image'] ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"></div>
                        <h1 class="display-5 fw-bolder"><?php echo $row['Item_Description'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span>K<?php echo $row['Unit_Price'] ?></span>
                        </div>
                        <p class="lead"><?php echo $row['Description'] ?></p>
                        <div class="d-flex">



                        <div class="container">
<div class="col-md-6 col-12">

<form method="post" action="product_page.php">
      <div>
         <p class="text-dark">Quantity: </p>
      </div> 
      <div class="input-group w-auto justify-content-end align-items-center">
         <input type="number" step="1" max="10" value="1" name="Quantity_purchased" class="quantity-field border-0 text-center w-25">
      </div>
      <input type="hidden" name="hidden_prod_name" value="<?php echo $row['Item_Description'] ?>"> 
      <input type="hidden" name="hidden_prod_image" value="<?php echo $row['Image'] ?>"> 
      <input type="hidden" name="hidden_prod_price" value="<?php echo $row['Unit_Price'] ?>">
      <input type="hidden" name="hidden_prod_id" value="<?php echo $row['Inventory_ID'] ?>"> 
 

      <a href="cart.php">
      <button class="btn btn-outline-dark flex-shrink-0 cart-btn" type="submit" name="cartbtn">
      <i class="bi-cart-fill me-1"></i>
        Add to cart
      </button>
      </a>

</form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    } ?>
<div class="message_box" style="margin:10px 0px;">

</div>
<?php require_once 'Includes/footer.php' ?>