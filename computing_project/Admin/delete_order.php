<?php require_once 'include/header.php' ?>
<?php
     if(isset($_GET['id']))
     {
         $id_to_delete = $_GET['id'];
         $statement = $connection->prepare("DELETE FROM orders WHERE Order_ID= ?");
         $statement->bind_param('i',$id_to_delete);
         $statement->execute(); 
         $statement->close();
         header("location:manage_orders.php");

     }

?>
<?php require_once 'include/navbar.php' ?>
<?php require_once 'include/footer.php' ?>