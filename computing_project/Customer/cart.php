<?php require_once 'Includes/header.php' ?>
<?php require_once 'Includes/nav.php' ?>

<?php

//Code for removing item from cart
if(isset($_POST['action']) == 'delete')
{
    foreach($_SESSION['shopping_cart'] as $key => $product)
    {
        if($_POST['hidden_prod_id'] == $product['id'])
        {
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

?>
<?php 
    if(empty($_SESSION['shopping_cart']))
    {
        ?>
        <img src="media/empty_cart.png" class="empty_cart">
        <?php
    }
    else
    {
        ?>

<div class="container">
    <div class="row">
        <div class="col">
                <div class="table-responsive cart2">

                    <table class="table rounded cart1">
                    <tbody>
                    <tr>
                    <th></th>
                    <th>ITEM NAME</th>
                    <th>QUANTITY</th>
                    <th>UNIT PRICE</th>
                    <th>ITEMS TOTAL</th>
                    <th></th>
                    </tr>	
                    <?php	//Displaying items in cart
                            $total_price = 0;	

                            foreach ($_SESSION["shopping_cart"] as $key => $product)
                            {
                    ?>

                    <tr>
                    <td class="td_img">
                    <img src='../Admin/img/Products/<?php echo $product["prod_img"]; ?>' width="50px"/>
                    </td>
                    <td><?php echo $product["prod_name"]; ?><br />

                    </td>
                    <td>
                        <?php echo $product['prod_qty'] ?>
                    </td>
                    <!-- Calculating total per product -->
                    <td><?php echo "K".$product["prod_price"]; ?></td>
                    <td><?php echo "K" .number_format($product["prod_price"] * $product["prod_qty"],2); ?></td>
                    <td>
                        <form method='post' action='cart.php'>
                        <input type='hidden' name='hidden_prod_id' value="<?php echo $product["id"]; ?>" />
                        <input type='hidden' name='action' value="remove" />
                        <button type='submit' class='remove'>Remove Item</button>
                        </form>
                    </td>
                    </tr>
                    <?php
                    //Calculating total per order
                        $total_price = $total_price + ($product["prod_price"] * $product["prod_qty"]);


                     
                            if(isset($_POST['pay']))
                            { 
                                //Saving order data to database
                                $inventory_id = $product['id'];
                                $emails = $_POST['email'];
                                $qty =  $product['prod_qty'];
                                $date = date("Y-m-d H:i:s");

                                $sql ="INSERT INTO orders (Inventory_ID, User_email, Quantity,Date_purchased) VALUES (?,?,?,?)";
                                $statement = $connection->prepare($sql);
                                $statement->bind_param("isis", $inventory_id, $emails,  $qty,$date);
                                $statement->execute();
                            }

                    }
                    ?>
                    <tr>
                    <td colspan="6" align="right">
                    <strong>TOTAL: <?php echo "K".$total_price; ?></strong>
                    </td>
                    </tr>
                    </tbody>
                    </table>
        </div>
        </div>
        <div class="col">
            <div class="billing1">
                <form method="post" action="cart.php" class="billing">
                    <br>
                <h3 class="bill_text">Delivery Address</h3>
                <br>
                    <!-- Form for delivery details -->
                    <label for="full_name"><i class="fa fa-user"></i> Full Name</label>
                    <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter email address" required>
                    <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                    <input type="text" id="adr" name="address" placeholder="Enter Address">
                    <label for="city"><i class="fa fa-institution"></i> City</label>
                    <input type="text" id="city" name="city" placeholder="Enter city">
                    <input type="submit" id="checkout" value="Checkout" name="pay">
                </form>
                <!-- Form for payment -->
                <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                    <input type="hidden" name="public_key" value="Public key removed" />
                    <input type="hidden" name="tx_ref" value="bitethtx-019203" />
                    <input type="hidden" name="amount" value="<?php echo $total_price ?>" />
                    <input type="hidden" name="payment_options" value="card,mobilemoneyzambia" />

                    <input type="hidden" name="currency" value="ZMW" />
                    <input type="hidden" name="redirect_url" value="localhost:8080/computing_project/Customer/Index.php" />
                    <input type="hidden" name="meta[token]" value="54" />
                    <input type="hidden" name="customer[name]" value="Zainab " />
                    <input type="hidden" name="customer[email]" value="zainabp269@gmail.com" />
                    <input type="submit" id="start-payment-button" value="Proceed to payment" name="pay">
                </form>
            </div>
        </div>
</div>
</div>

<?php
    }
?>

<?php
    if(isset($_POST['pay']))
    { 
        //Saving delivery data to database
        $emails = $_POST['email'];
        $name = $_POST['full_name'];
        $address = $_POST['address'];
        $city = $_POST['city'];

        $sql ="INSERT INTO billing (`Name`, Email,`Address`,City) VALUES (?,?,?,?)";
        $statement = $connection->prepare($sql);
        $statement->bind_param("ssss", $name,$emails,$address,$city);
        $statement->execute();

        echo "Your order has been placed, please proceed to payment";
    }
?>

<?php require_once 'Includes/footer.php' ?>
