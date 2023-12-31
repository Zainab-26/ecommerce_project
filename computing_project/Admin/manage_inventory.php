<?php
 require_once 'include/header.php'; 
 $value = view_products(); 
 product_status_active();
 ?>
<?php require_once 'include/navbar.php' ?>

<h1 class="heading_padding">Products</h1>
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
                    <th>Product_ID</th>
                    <th>Supplier_ID</th>
                    <th>Category_ID</th>
                    <th>Item_Description</th>
                    <th>Image</th>
                    <th>Unit_Price</th>
                    <th>Quantity_Purchased</th>
                    <th>Amount_Owing</th>
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
                        <td> <?php echo $row['Inventory_ID']; ?></td>
                        <td> <?php echo $row['Supplier_ID']; ?></td>
                        <td> <?php echo $row['Category_ID']; ?></td>
                        <td> <?php echo $row['Item_Description']; ?></td>
                        <td><img src="img/Products/<?php echo $row['Image'] ?>" width=70px height=50px></td>
                        <td> <?php echo $row['Unit_Price']; ?></td>
                        <td> <?php echo $row['Quantity_purchased']; ?></td>
                        <td> <?php echo $row['Amount_Owing']; ?></td>
                        <td> <?php echo $row['Status']; ?></td>

                        <td class="text-center" style='white-space: nowrap'>
                            <?php 
                            
                             if($row['Status'] == 'Active')
                             {
                                 echo "<a href='manage_inventory.php?op=Deactivate&id=".$row['Inventory_ID']."'class='btn btn-primary'>Deactivate</a>";
                             }
                             else
                             {
                                echo "<a href='manage_inventory.php?op=Activate&id=".$row['Inventory_ID']."'class='btn btn-primary'>Activate</a>";
                             }    
                            ?>

                     
                        <a href="edit_product.php?id=<?php echo $row['Inventory_ID']?>" class="btn btn-dark">Edit</a>
                        <a href="delete_product.php?id=<?php echo $row['Inventory_ID']?>" class="btn btn-danger" name="delete_category">Delete</a> 
                        </td>
                        </tr>
                     <?php   
                     }
                     ?>

            </tbody>

        </table>
        <?php 

// ?>
     </div>
   </div>
    
<?php require_once 'include/footer.php' ?>