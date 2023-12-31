<?php
 require_once 'include/header.php'; 
 $users = view_users(); 
 change_user_type();
 ?>
<?php require_once 'include/navbar.php' ?>

<h1 class="heading_padding">Users</h1>
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
                    <th>User_ID</th>
                    <th>User_name</th>
                    <th>User_email</th>
                    <th>Password</th>
                    <th>User_type</th>
                    <th>Date_registered</th>
                    <th class="text-center">Operations</th>
                 </tr>
            </thead>
            <tbody>
            <tr>
                 <?php
                     while($row=mysqli_fetch_assoc($users))
                     { 
                         ?>
                        <td> <?php echo $row['User_ID']; ?></td>
                        <td> <?php echo $row['User_name']; ?></td>
                        <td> <?php echo $row['User_email']; ?></td>
                        <td> <?php echo $row['Password']; ?></td>
                        <td> <?php echo $row['User_type']; ?></td>
                        <td> <?php echo $row['Date_registered']; ?></td>

                        <td class="text-center" style='white-space: nowrap'>
                            <?php 
                            
                             if($row['User_type'] == 'Customer')
                             {
                                 echo "<a href='manage_users.php?op=Change_type_admin&id=".$row['User_ID']."'class='btn btn-primary'>Make Admin</a>";
                             }
                             else
                             {
                                echo "<a href='manage_users.php?op=Change_type_cust&id=".$row['User_ID']."'class='btn btn-primary'>Make Customer</a>";
                             }    
                            ?>

                    
                        <a href="Edit_category.php?id=<?php echo $row['User_ID']?>" class="btn btn-dark">Edit</a>
                        <a href="delete_category.php?id=<?php echo $row['User_ID']?>" class="btn btn-danger" name="delete_category">Delete</a>
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
  //$cat_name = $_POST['DeleteCategory'];
  //$id1 = $_POST['cat_id'];
  //$cat_status = "";
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