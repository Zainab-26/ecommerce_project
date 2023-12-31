<?php
 require_once 'include/header.php'; 
 $value1 = view_supplier(); 
 status_active();
 ?>
<?php require_once 'include/navbar.php' ?>

<h1 class="heading_padding">Supplier</h1>
<br>
<div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div> -->
<div class="card-body">
    <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
                 <tr>
                    <th>Supplier_ID</th>
                    <th>Supplier_Name</th>
                    <th>Supplier_Telephone</th>
                    <th>Supplier_Email</th>
                    <th class="text-center">Operations</th>
                 </tr>
            </thead>
            <tbody>
            <tr>
                 <?php
                     while($row=mysqli_fetch_assoc($value1))
                     { 
                         ?>
                        <td> <?php echo $row['Supplier_ID']; ?></td>
                        <td> <?php echo $row['Supplier_Name']; ?></td>
                        <td> <?php echo $row['Supplier_Tel']; ?></td>
                        <td> <?php echo $row['Supplier_Email']; ?></td>
                        <td class="text-center">
                            <?php   
                            //  if($row['Category_status'] == 'Active')
                            //  {
                            //      echo "<a href='manage_category.php?op=Deactivate&id=".$row['Category_ID']."'class='btn btn-primary'>Deactivate</a>";
                            //  }
                            //  else
                            //  {
                            //     echo "<a href='manage_category.php?op=Activate&id=".$row['Category_ID']."'class='btn btn-primary'>Activate</a>";
                            //  }    
                            ?>

                    
                        <a href="Edit_supplier.php?id=<?php echo $row['Supplier_ID']?>" class="btn btn-dark">Edit</a>
                        <a href="delete_supplier.php?id=<?php echo $row['Supplier_ID']?>" class="btn btn-danger" name="delete_category">Delete</a>
                        </td>
                        </tr>
                     <?php   
                     }
                     ?>

            </tbody>

        </table>
        <?php 

if (isset($_POST['delete_supplier'])) 
{	
  $stmt = $connection->prepare("DELETE FROM supplier WHERE Supplier_ID= ?");
  $stmt->bind_param('i',$id);
  $stmt->execute(); 
  $stmt->close();
  header("location:manage_supplier.php");
}
else 
{ 
    $errorMessage='Could not update report data: ' . mysqli_error($connection); 
}
?>
    </div>
    </div>
    
<?php require_once 'include/footer.php' ?>