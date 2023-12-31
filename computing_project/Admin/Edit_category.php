<?php 
error_reporting(E_ALL);
    require_once 'include/header.php';
?>
<?php require_once 'include/navbar.php' ?>

<h1 class="heading_padding">Edit Category</h1>
<br>

<form class="user" method="post" action="">
<?php 

if (isset($_POST['edit_category'])) 
{	
  $cat_name = $_POST['EditCategory'];
  $id1 = $_POST['cat_id'];
  $stmt = $connection->prepare("UPDATE category SET Category_Name= ? WHERE Category_ID= ?");
  $stmt->bind_param('si', $cat_name,$id1);
  $stmt->execute(); 
  $stmt->close();
  header("location:manage_category.php");
}
else { $errorMessage='Could not update report data: ' . mysqli_error($connection); }

?>
<div class="category">
<div class="form-group">
    <input type="text" class="form-control form-control-user"
    name="EditCategory" value="
    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = ($_GET['id']);

    $sql = $connection->prepare("SELECT * FROM category WHERE Category_ID = ?  ");
    $sql->bind_param('i', $id);
    $sql->execute();
    $sql->bind_result($id,$category_name,$category_status);

    while ($sql->fetch()) {

        echo $category_name;
    }

} else {

}

    ?>">                                
</div>
    <input type="hidden" name="cat_id" value="<?php echo $_GET['id']; ?>">
    <input id="btn" type="submit" value="Edit category" class="btn btn-dark btn-user btn-block" name="edit_category">

</div>
</form>
<?php require_once 'include/footer.php' ?>