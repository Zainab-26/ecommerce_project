<?php require_once 'Includes/header.php' ?>
<?php require_once 'Includes/nav.php' ?>
<?php

    $category_id = "";
    if(isset($_GET['id']))
    {
        $category_id = $_GET['id'];
    }
    $view_products = display_products($category_id);
?>

<img src="media/cover.jpg" width="100%" height="auto" class="cover_img">

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

<?php 
                       while($row=mysqli_fetch_assoc($view_products))
                       {
                           ?>

    <!-- Product Item -->
    <div class="product-grid col-xs-12 col-sm-6 col-md-3">
      <div class="product-item">
        <div class="card-img-top">
          <a href="product_page.php?p_id=<?php echo $row['Inventory_ID']?>"><img src="../Admin/img/Products/<?php echo $row['Image'] ?>" 
          alt="Product 1"></a>
        </div>
        <div class="caption">
          <div class="name text-center">
            <h5><?php echo $row['Item_Description'] ?> </h5>
          </div>
          <div class="price">
            <span> K<?php echo $row['Unit_Price'] ?></span>
          </div>
          <div class="cart">
          <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="product_page.php?p_id=<?php echo $row['Inventory_ID']?>">
          View more</a></div>
          </div>
        </div>
        <button type="button" class="btn btn-default wishlist" data-toggle="tooltip" data-placement="right" title="Wishlist">
          <i class="fa fa-heart"></i></button>
      </div>
    </div>
    <?php
         }
     ?>
                </div>
            </div>
        </section>

       
        <div class="map">
  <h1>We would love to see you</h1>
  <hr>
<div id="map">
  <!-- The map will be displayed here -->
</div>

<script>
  function initMap()
  {
    // Specifying the location coordinates and marker position on map
    var location = {lat: -15.420468715769763, lng:28.28033295717051};
    var map = new google.maps.Map(document.getElementById("map"),
    {
      zoom:4,
      center: location
    });
    var marker = new google.maps.Marker(
      {
        position: location,
        map: map
      });
  }
</script>
<script async defer src="Google API key link"></script>
</div>
        <?php require_once 'Includes/footer.php' ?>

 
