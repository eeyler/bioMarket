<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/stock.css">
    </head>
    <body>
        <?php
        $page_title = 'BioMarket | Checkout';
        include_once "user_panel_connection.php";
        ?>
        <div class="container-cart">
            <h2>Checkout</h2>
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12" >
                    <h4>Your Basket:</h4>
                    <?php
                    if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "checkout") {

                        $search = "SELECT * FROM products, cart_tmp, category, users WHERE users.usr_id = " . (int) $_SESSION["users"]["usr_id"] . " AND cart_tmp.crt_id = users.usr_id AND products.prod_id = cart_tmp.prod_id AND products.cat_id = category.cat_id";
                        $result = mysqli_query($mysqli, $search);

                        $total = 0;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $subtotal = $row["price"] * $row["ord_qty"];
                            ?>  

                            <div class="cart-row">
                                <div class="row">
                                    <div class="col-lg-1 col-md-3 col-xs-6 " >
                                        <?php print '<div class="category-img"><img alt="product example" src=" ' . $row["cat_img"] . ' "></div>'; ?>
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-xs-6" >
                                        <p><?php echo $row["prod_name"] ?></p>
                                    </div>

                                    <div class="col-lg-1 col-md-3 col-xs-6" >
                                        <p>Qty: </p>
                                    </div>

                                    <div class="col-lg-1 col-md-3 col-xs-6" >
                                        <input name="ord_qty" type="text" value="<?php echo $row["ord_qty"] ?>" >  
                                    </div> 
                                    <div class="col-lg-1 col-md-3 col-xs-6" >
                                        <p>&pound<?php echo $row["price"] ?></p>
                                    </div>     
                                </div>      
                            </div>

                            <?php
                            $total += $subtotal;
                        }
                    }
                    ?>
                    <div class="total">
                        <hr>
                        <p><span class="price" style="color:black">Total Value:
                                <b>&pound<?php echo $total; ?></b></span></p>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12 col-xs-12 " >

                    <?php
                    $search = "SELECT * FROM users WHERE usr_id = " . $_SESSION["users"]["usr_id"] . ";";
                    $result = mysqli_query($mysqli, $search);
                    $row2 = mysqli_fetch_assoc($result);
                    ?>

                    <div class="container-checkout col2">
                        <form action="checkout_update.php">
                            <div class="column-stock">

                                <h4>Confirm Delivery Address:</h4>
                                <br>
                                <label for="street"><b>Address Line 1</b></label>
                                <input type="text"  name="adr_ln_1" value="<?php echo $row2["adr_ln_1"] ?>">
                                <label for="city"><b>Address Line 2</b></label>
                                <input type="text" name="adr_ln_2" value="<?php echo $row2["adr_ln_2"] ?>">
                                <label for="postcode"><b>Postcode</b></label>
                                <input type="text"  name="pstcod" value="<?php echo $row2["pstcod"] ?>">
                            </div> 
                        </form>  
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 cart-row">
                    <h2>Confirm Delivery Date and Time:</h2> 


                    <div class="col-lg-7 col-md-3 col-xs-6" >
                        <h4>DATE: 
                            <?php
                            $deliveryDate = strtotime("tomorrow");
                            echo date("d/m/Y", $deliveryDate);
                            ?>
                        </h4>
                    </div>

                    <div class="col-lg-5 col-md-3 col-xs-6" >
                        <h4>PRICE: &pound5.99</h4>
                    </div>

                </div> 

                <div class="col-lg-6 col-sm-12 col-xs-12">
                    <div class="col-lg-12" >
                        <button type="submit" class="btn-checkout btn-paypal">Continue to checkout with PayPal</button> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
