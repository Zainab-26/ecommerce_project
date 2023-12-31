<?php 
error_reporting(E_ALL);
    require_once 'include/header.php';
?>
<?php require_once 'include/navbar.php' ?>

<h1 class="heading_padding">Edit User</h1>
<br>

<form class="user" method="post" action="">
<?php 

if (isset($_POST['edit_user'])) 
{	
  $sup_name = $_POST['EditUserName'];
  $sup_tel = $_POST['EditUserPassword'];
  $sup_email = $_POST['EditUserEmail'];
  $id1 = $_POST['use_id'];
  $stmt = $connection->prepare("UPDATE users SET `User_name`= ?, Password= ?, User_email= ? WHERE `User_ID`= ?");
  $stmt->bind_param('sssi', $sup_name,$sup_tel,$sup_email,$id1);
  $stmt->execute(); 
  $stmt->close();
  header("location:manage_supplier.php");
}
else { $errorMessage='Could not update user data: ' . mysqli_error($connection); }

?>
<div class="users">
<div class="form-group">
    <input type="text" class="form-control form-control-user"
    name="EditUserName" value="
    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id2 = ($_GET['id']);

    $sql = $connection->prepare("SELECT * FROM users WHERE `User_ID` = ?  ");
    $sql->bind_param('i', $id2);
    $sql->execute();
    $sql->bind_result($id2,$supplier_name, $supplier_tel, $supplier_email);

    while ($sql->fetch()) {

        echo $supplier_name;
    }

} else {

    
}
            
    ?>">      
    <br>
    <input type="text" class="form-control form-control-user"
    name="EditUserPassword" value="
    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id2 = ($_GET['id']);

    $sql = $connection->prepare("SELECT * FROM users WHERE `User_ID` = ?  ");
    $sql->bind_param('i', $id2);
    $sql->execute();
    $sql->bind_result($id2,$supplier_name, $supplier_tel, $supplier_email);

    while ($sql->fetch()) {

        echo $supplier_tel;
    }

} else {

}
            
    ?>">
    <br>
    <input type="text" class="form-control form-control-user"
    name="EditUserEmail" value="
    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id2 = ($_GET['id']);

    $sql = $connection->prepare("SELECT * FROM users WHERE `User_ID` = ?  ");
    $sql->bind_param('i', $id2);
    $sql->execute();
    $sql->bind_result($id2,$supplier_name, $supplier_tel, $supplier_email);

    while ($sql->fetch()) {

        echo $supplier_email;
    }

} else {

    //return errors
}
            //}
    ?>">                          
</div>
    <input type="hidden" name="use_id" value="<?php echo $_GET['id']; ?>">
    <br>
    <input id="btn" type="submit" value="Edit Supplier" class="btn btn-dark btn-user btn-block" name="edit_user">

</div>
</form>
<?php require_once 'include/footer.php' ?>