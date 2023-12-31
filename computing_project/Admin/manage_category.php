<?php
 require_once 'include/header.php'; 
 $value = view_category(); 
 status_active();
 ?>
<?php require_once 'include/navbar.php' ?>

<h1 class="heading_padding">Category</h1>
<br>
<div class="card shadow mb-4">
<div class="card-body">
    <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
                 <tr>
                    <th>Category_ID</th>
                    <th>Category_Name</th>
                    <th>Status</th>
                    <th class="text-center">Operations</th>
                 </tr>
            </thead>
            <tbody>
            <tr>
                 <?php
                     while($row=mysqli_fetch_assoc($value))
                     { 
                         ?>
                        <td> <?php echo $row['Category_ID']; ?></td>
                        <td> <?php echo $row['Category_Name']; ?></td>
                        <td> <?php echo $row['Category_status']; ?></td>
                        <td class="text-center">
                            <?php 
                            
                             if($row['Category_status'] == 'Active')
                             {
                                 echo "<a href='manage_category.php?op=Deactivate&id=".$row['Category_ID']."'class='btn btn-primary'>Deactivate</a>";
                             }
                             else
                             {
                                echo "<a href='manage_category.php?op=Activate&id=".$row['Category_ID']."'class='btn btn-primary'>Activate</a>";
                             }    
                            ?>

                        <a href="Edit_category.php?id=<?php echo $row['Category_ID']?>" class="btn btn-dark">Edit</a>
                        <a href="delete_category.php?id=<?php echo $row['Category_ID']?>" class="btn btn-danger" name="delete_category">Delete</a>
                        </td>
                        </tr>
                     <?php   
                     }
                     ?>

            </tbody>

        </table>
<?php 

if (isset($_POST['delete_category'])) 
{	
  $stmt = $connection->prepare("DELETE FROM category WHERE Category_ID= ?");
  $stmt->bind_param('i',$id);
  $stmt->execute(); 
  $stmt->close();
  header("location:manage_category.php");
}
else 
{ 
    $errorMessage='Could not update report data: ' . mysqli_error($connection); 
}
?>
    </div>
    </div>
    
<?php require_once 'include/footer.php' ?>