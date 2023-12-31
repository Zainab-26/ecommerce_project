<?php require_once 'include/header.php' ?>
<?php require_once 'include/navbar.php' ?>

<h1 class="heading_padding">Add new supplier</h1>
<br>

<form class="user" method="post" action="add_supplier.php">

<div class="supplier">
<div class="form-group">
    <!-- <input type="text" class="form-control form-control-user"
    placeholder="Enter Supplier ID" name="supplier_ID" ><br>     -->
    <input type="text" class="form-control form-control-user"
    placeholder="Enter Supplier Name" name="supplier_name" ><br>
    <input type="text" class="form-control form-control-user"
    placeholder="Enter Supplier Telephone " name="supplier_tel" ><br>  
    <input type="text" class="form-control form-control-user"
    placeholder="Enter Supplier Email" name="supplier_email">  
</div>

<br>
    <input id="btn" type="submit" value="Add supplier" class="btn btn-dark btn-user btn-block" name="supplier_btn">
</div>
<?php
    
add_supplier();

?>

</form>
<br>
<br>
<?php require_once 'include/footer.php' ?>