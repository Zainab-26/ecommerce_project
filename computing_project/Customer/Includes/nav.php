<?php
    $view_cat = display_categories();
?>

<body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#"><img src="media/fs_logo.jpeg" alt="Fidelity Stores logo" width=150px height=50px></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <?php 
                            
                            while($row = mysqli_fetch_assoc($view_cat))
                            {
                        ?>
                        <li class="nav-item"><a class="nav-link" href="Index.php?id=<?php echo $row['Category_ID']?>"><?php echo $row['Category_Name'] ?></a></li>

                        <?php
                            }
                        
                        ?>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="">All Products</a></li>
                                <li><a class="dropdown-item" href="">Popular Items</a></li>
                                <li><a class="dropdown-item" href="">New Arrivals</a></li>
                            </ul>
                        </li> -->
                    </ul>

                    <form class="d-flex">
                        
                        <button class="btn btn-outline-dark" type="submit">
                        <a href="../Customer/cart.php">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"></span></a></span>
                        </button>
                        </a>
                    </form>
                    
                </div>
            </div>
        </nav>