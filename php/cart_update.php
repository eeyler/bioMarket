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
?>
<div class="container-cart">
      <h2>Your Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h2>
<?php
$message = '';
 // Delete Product from the cart    
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "remove") {
    
    // Update Product quantity with the deleted quantity        
    $search = "SELECT * FROM cart_tmp WHERE crt_id =  ".(int)$_SESSION["users"]["usr_id"]."";
    $result = mysqli_query($mysqli, $search); 
    $temp_row1 = mysqli_fetch_assoc($result);  
    
    $search = "SELECT * FROM cart_tmp, products WHERE cart_tmp.prod_id = products.prod_id ";
    $result = mysqli_query($mysqli, $search); 
    $temp_row2 = mysqli_fetch_assoc($result);    
    
    $new_qty = $temp_row2["sto_qty"] + $temp_row1["ord_qty"];
    $search = "UPDATE products SET sto_qty = $new_qty WHERE prod_id =   " . $temp_row1["prod_id"] . " ";
    mysqli_query($mysqli, $search);    
    
    
    $search = "DELETE FROM cart_tmp WHERE prod_id = ".(int)$_REQUEST["prod_id"]." AND crt_id =  ".(int)$_SESSION["users"]["usr_id"]." ";
    mysqli_query($mysqli, $search);
    $message = 'The Product was removed from your Cart!';
     
}
if (isset($_POST["prod_id"]))
    {
 $search = "SELECT * FROM cart_tmp WHERE prod_id = '".$_POST["prod_id"]."' AND crt_id =  ".(int)$_SESSION["users"]["usr_id"]."";
 $result = mysqli_query($mysqli, $search); 
  $row = mysqli_fetch_assoc($result); 
 $search = "SELECT * FROM products WHERE prod_id = '".$_POST["prod_id"]."' ";
 $result = mysqli_query($mysqli, $search); 
 $row1 = mysqli_fetch_assoc($result); 
// Add product to the cart  
if (isset($_POST["ord_qty"]))
    {
	if (($_POST["ord_qty"] == 0 ) || ($_POST["ord_qty"] == "0"))
	{
                $message = 'Enter the requested quantity!';
            //    print "<h4>Enter the requested quantity!</h4>";
	}
	elseif ($_POST["ord_qty"] > ($row["ord_qty"] + $row1["sto_qty"])) { 
            $message = 'Sorry, but the Product is not avaiable in the requested quantity!';
          // print "<h4>Sorry, but the product is not avaiable in the requested quantity!</h4>";
        } else {      
        $search = "SELECT * FROM cart_tmp WHERE crt_id =  ".(int)$_SESSION["users"]["usr_id"]." AND prod_id = '" . $_POST["prod_id"] . "' ";
        $result = mysqli_query($mysqli, $search);
        $row2 = mysqli_fetch_assoc($result);                            
                
                
        if ( ($row2["prod_id"] == $_POST["prod_id"]) && ($row2["crt_id"] == $_SESSION["users"]["usr_id"]) ){

            if (($row2["ord_qty"] + $row1["sto_qty"]) >= $_POST["ord_qty"]) {     
            // Update the Product Quantaty in the Cart
            $search = "UPDATE cart_tmp SET ord_qty =  '" . $_POST["ord_qty"] . "'  WHERE prod_id =   '" . $_POST["prod_id"] . "' AND crt_id =  ".(int)$_SESSION["users"]["usr_id"]." ";
            mysqli_query($mysqli, $search);     
            $message = 'The Product quantity was updated in your Cart!';
          //  print "<h4>The Cart was Updated! </h4>";                           
            }  
        }

            $search = "SELECT * FROM products WHERE prod_id = '".$_POST["prod_id"]."' ";
            $result = mysqli_query($mysqli, $search); 
            $row3 = mysqli_fetch_assoc($result); 
            
            if ($row["ord_qty"] <= $_POST["ord_qty"]) {
            $quantity = $row3["sto_qty"] - ($_POST["ord_qty"] - $row["ord_qty"] );
   
            // Update the Product Quantaty in the Product table
            $search = "UPDATE products SET sto_qty =  $quantity  WHERE prod_id =   '" . $_POST["prod_id"] . "'  ";
            mysqli_query($mysqli, $search);

                
            }
            if ($row["ord_qty"] >= $_POST["ord_qty"]) {
            $qty2 = $row3["sto_qty"] + ($row["ord_qty"] - $_POST["ord_qty"]);
   
            // Update the Product Quantaty in the Product table
            $search = "UPDATE products SET sto_qty =  $qty2  WHERE prod_id =   '" . $_POST["prod_id"] . "'  ";
            mysqli_query($mysqli, $search);
        
         
            }     
         
        }
    } 
 
} 
  
       $search = "SELECT * FROM products, cart_tmp, category, users WHERE users.usr_id = " . (int) $_SESSION["users"]["usr_id"] . " AND cart_tmp.crt_id = users.usr_id AND products.prod_id = cart_tmp.prod_id AND products.cat_id = category.cat_id";
       $result = mysqli_query($mysqli, $search);
      
       $total = 0;
       while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       { 
            $subtotal = $row["price"] * $row["ord_qty"];   
?>                  
 

      
               <div class="cart-row">
                    <div class="row">
                        <div class="col-lg-1 col-md-3 col-xs-2 " >
                            <?php print '<div class="category-img"><img alt="product example" src=" ' . $row["cat_img"] . ' "></div>'; ?>
                        </div>

                        <div class="col-lg-2 col-md-3 col-xs-2 four" >
                            <p><?php echo $row["prod_name"] ?></p>
                        </div>

                        <div class="col-lg-1 col-md-3 col-xs-2" >
                            <p>Qty: </p>
                        </div>

                        <form action="?page=cart_update" method="post" enctype="multipart/form-data">       

                            <div class="col-lg-1 col-md-3 col-xs-2" >
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

                            <div class="col-lg-1 col-md-3 col-xs-2" >
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

