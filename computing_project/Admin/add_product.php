<?php
 require_once 'include/header.php';
$cat_view = view_category();
$supplier_view = view_supplier();
?>
<?php require_once 'include/navbar.php' ?>
<h1 class="heading_padding">Add new product</h1>
<br>

<form class="user" method="post" action="add_product.php" enctype="multipart/form-data">

<div class="product">
<div class="form-group">
    <select name="supp_id"  class="custom-select" required>
        <option value="">Select Supplier</option>
        <?php 
             while($row = mysqli_fetch_assoc($supplier_view))
        { 
        ?>
                <option value="<?php echo $row['Supplier_ID'] ?>"><?php echo $row['Supplier_Name'] ?></option>
        <?php
        
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
        ?>
                <option value="<?php echo $row['Category_ID'] ?>"><?php echo $row['Category_Name'] ?></option>
        <?php
        
        } 
        ?>
    </select>                                 
</div>
<div class="form-group">
    <input type="text" class="form-control"
    placeholder="Enter Product name " name="product_name" required>                                   
</div>
<div class="form-group">
    <input type="file" class="form-control-file border" 
    placeholder="Upload product image" name="product_image" required>                                   
</div>
<div class="form-group">
    <input type="text" class="form-control"
    placeholder="Enter Unit Price" name="unit_price" required>                                   
</div>
<div class="form-group">
    <input type="text" class="form-control"
    placeholder="Enter quantity purchased" name="quantity_purchased" required>                                   
</div>
<div class="center-align">
    <input id="btn" type="submit" value="Add Product" class="btn btn-dark center-align " class="btn btn-dark btn-block" name="add_product_btn">
</div>
<?php
     add_product();
?>
</div>
<?php

?>

</form>
<br>
<br>

<?php require_once 'include/footer.php' ?>