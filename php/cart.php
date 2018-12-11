<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/stock.css">
    </head>
    <body>
        <?php
        $page_title = 'BioMarket | Your Cart';
        include_once "user_panel_connection.php";
        $message = ' ';
        ?>
        <div class="container-cart">
            <h2>Your Cart <span class="price" style="color:black; font-size: 50px; margin-right: 20px;"><i class="fa fa-shopping-cart"></i></span></h2>
            <br><br>
            <?php
            if (isset($_POST["prod_id"])) {
                $search = "SELECT * FROM products WHERE prod_id = '" . $_POST["prod_id"] . "' ";
                $result = mysqli_query($mysqli, $search);
                $row1 = mysqli_fetch_assoc($result);
// Add product to the cart  
                if (isset($_POST["ord_qty"])) {
                    if (($_POST["ord_qty"] == 0 ) || ($_POST["ord_qty"] == "0")) {
                    $message = 'Enter the requested quantity!';    
                   //  print "<h4>Enter the requested quantity!</h4>";
                    } elseif (($_POST["ord_qty"] > $row1["sto_qty"])) {
                        //print "<h4>Sorry, but the product is not avaiable in the requested quantity!</h4>";
                        $message = 'Sorry, but the product is not avaiable in the requested quantity!';
                    } else {
                        $search = "SELECT * FROM cart_tmp WHERE crt_id =  " . (int) $_SESSION["users"]["usr_id"] . " AND prod_id = '" . $_POST["prod_id"] . "' ";
                        $result = mysqli_query($mysqli, $search);
                        $row = mysqli_fetch_assoc($result);
                        if (($row["prod_id"] == $_POST["prod_id"]) && ($row["crt_id"] == $_SESSION["users"]["usr_id"])) {
                            $new_qty = $row["ord_qty"] + $_POST["ord_qty"];
                            // Update the Product Quantaty in the Cart
                            $search = "UPDATE cart_tmp SET ord_qty =  $new_qty  WHERE prod_id =   '" . $_POST["prod_id"] . "' AND crt_id =  " . (int) $_SESSION["users"]["usr_id"] . " ";
                            mysqli_query($mysqli, $search);
                           $message = 'The Product quantity was updated in your Cart!';
                           // print "<h4>The Cart was Updated! </h4>";
                        }
                        if (($row["prod_id"] != $_POST["prod_id"]) && ($row["crt_id"] != $_SESSION["users"]["usr_id"])) {
                            $search = "INSERT INTO cart_tmp (ord_qty, prod_id, crt_id)
            VALUES
            ('" . $_POST["ord_qty"] . "', '" . $_POST["prod_id"] . "', " . (int) $_SESSION["users"]["usr_id"] . ");";
                           
                            $message = 'Succesfully added product to the cart!';                           
                        //    print "<h4>Succesfully added product to the cart!</h4>";
                            if (!mysqli_query($mysqli, $search)) {
                                die('Error: ' . mysql_error());
                            }
                        }
                        $search = "SELECT * FROM products WHERE prod_id = '" . $_POST["prod_id"] . "' ";
                        $result = mysqli_query($mysqli, $search);
                        $row = mysqli_fetch_assoc($result);
                        $quantity = $row["sto_qty"] - $_POST["ord_qty"];
                        // Update the Product Quantaty in the Product table
                        $search = "UPDATE products SET sto_qty =  $quantity  WHERE prod_id =   '" . $_POST["prod_id"] . "'  ";
                        mysqli_query($mysqli, $search);
                      //  $message = 'The Cart was updated!';
                      //  print "<h4>The Product Quantity was Updated! </h4>";
                    }
                }
                
                
                
                
                
                 }   
     
            $search = "SELECT * FROM products, cart_tmp, category, users WHERE users.usr_id = " . (int) $_SESSION["users"]["usr_id"] . " AND cart_tmp.crt_id = users.usr_id AND products.prod_id = cart_tmp.prod_id AND products.cat_id = category.cat_id";
            $result = mysqli_query($mysqli, $search);
            $total = 0;
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $subtotal = $row["price"] * $row["ord_qty"];
                ?>                  



                <div class="cart-row">
                    <div class="row">
                        <div class="col-lg-1 col-md-3 col-xs-2" >
                            <?php print '<div class="category-img"><img alt="product example" src=" ' . $row["cat_img"] . ' "></div>'; ?>
                        </div>

                        <div class="col-lg-2 col-md-3 col-xs-2 four" >
                            <p><?php echo $row["prod_name"] ?></p>
                        </div>

                        <div class="col-lg-1 col-md-3 col-xs-2" >
                            <p>Qty: </p>
                        </div>

                        <form action="?page=cart_update" method="post" enctype="multipart/form-data">       

                            <div class="col-lg-1 col-md-3 col-xs-2 field" >
                                <input name="ord_qty" type="text" value="<?php echo $row["ord_qty"] ?>" >  
                            </div>

                            <div class="col-lg-1 col-md-3 col-xs-2" >
                                <p>Value: </p>
                            </div>

                            <div class="col-lg-1 col-md-3 col-xs-2" >
                                <p>&pound<?php echo $row["price"] ?></p>
                            </div>

                            <div class="col-lg-1 col-md-3 col-xs-2" >
                                <p>Subtotal: </p>
                            </div> 

                            <div class="col-lg-1 col-md-3 col-xs-2" >
                                <p>&pound<?php echo $subtotal; ?></p>
                            </div>     

                            <div class="col-lg-1 col-md-3 col-xs-2 seven" >
                                <input name="prod_id" type="hidden" value="<?php echo $row["prod_id"] ?>" >      
                                <button type="submit" name="submit" class="btn-cart">Update</button> 
                            </div>

                            <div class="col-lg-1 col-md-3 col-xs-2s five" >
                                <?php
                                print '<div class="btn-remove">
         
    <a href="?page=cart_update&prod_id=' . $row["prod_id"] . '&action=remove">X</a></div> ';
                                ?>      

                            </div> 
                            
                            
                        </form> 
                    </div>
                </div>
                <?php
                $total += $subtotal;
            }
            ?>
            <hr>
            <p class="total"><span class="price" style="color:black">Total Value:
                    <b>&pound<?php echo $total; ?></b></span></p>   

            <br>
            <?php
        $search = "SELECT * FROM cart_tmp WHERE crt_id =  " . (int) $_SESSION["users"]["usr_id"] . " ";
        $result3 = mysqli_query($mysqli, $search);
        $row3 = mysqli_fetch_assoc($result3);
        if ($row3["crt_id"] == $_SESSION["users"]["usr_id"] ){
                
          
            
            
            print '<div class="btn-checkout">
         
    <a href="?page=checkout&crt_ln=' . $row["crt_ln"] . '&action=checkout">Proceed to Checkout</a></div> ';
            print "<h4>$message</h4>";
            
              }
            ?>     
        </div>
    </body>
</html>