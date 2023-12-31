<?php require_once 'include/header.php'; ?>
<?php require_once 'include/navbar.php'; ?>
<h1 class="heading_padding">Add new category</h1>
<br>

<form class="user" method="post" action="Add_category.php">

<div class="category">
<div class="form-group">
    <input type="text" class="form-control form-control-user"
    placeholder="Add new category " name="category" >                                   
</div>

    <input id="btn" type="submit" value="Add category" class="btn btn-dark btn-user btn-block" name="ctgrybtn">
</div>
<?php
    add_Category();
?>
</form>
<br>
<br>

<?php require_once 'include/footer.php' ?>