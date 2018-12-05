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
<div class="row-checkout">

    <div class="container-checkout col1">
      <h4>Your Basket:</h4>
<?php     
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "checkout") {

   $search = "SELECT * FROM products, cart_tmp, category, users WHERE users.usr_id = " . (int) $_SESSION["users"]["usr_id"] . " AND cart_tmp.crt_id = users.usr_id AND products.prod_id = cart_tmp.prod_id AND products.cat_id = category.cat_id";
   $result = mysqli_query($mysqli, $search);

   $total = 0;
   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
   { 
        $subtotal = $row["price"] * $row["ord_qty"];
?>      
        <div class="row-stock">
          <div class="column cat" style="background-color:#aaa;">
              <?php print '<div class="category-img"><img alt="product example" src=" ' .$row["cat_img"]. ' "></div>'; ?>

          </div>
          <div class="column check-name" style="background-color:#bbb;">
            <p><?php echo $row["prod_name"]?></p>

          </div>
          <div class="column" style="background-color:#ccc;">
            <p>Qty: </p>
          </div>
          <div class="column" style="background-color:#ddd;">
            <p><?php echo $row["ord_qty"]?></p>              
          </div>  
          <div class="column check-price" style="background-color:#ccc;">
            <p>&pound<?php echo $row["price"]?></p>
          </div>      
        </div>      
<?php 
       $total += $subtotal;
   } 
}
?>
      <br>
      <div class="total">
        <hr>
        <p><span class="price" style="color:black">Total Value:
                <b>&pound<?php echo $total; ?></b></span></p>
      </div>
    
   
    </div>
<?php

$search = "SELECT * FROM users WHERE usr_id = " .  $_SESSION["users"]["usr_id"] . ";";
$result = mysqli_query($mysqli, $search);
$row2 = mysqli_fetch_assoc($result);

?>
    
    <div class="container-checkout col2">
      <form action="checkout_update.php">
        <div class="column-stock">

           <h4>Confirm Delivery Address:</h4>
           <br>
            <label for="street"><b>Address Line 1</b></label>
                <input type="text"  name="adr_ln_1" value="<?php echo $row2["adr_ln_1"]?>">
            <label for="city"><b>Address Line 2</b></label>
                <input type="text" name="adr_ln_2" value="<?php echo $row2["adr_ln_2"]?>">
            <label for="postcode"><b>Postcode</b></label>
                <input type="text"  name="pstcod" value="<?php echo $row2["pstcod"]?>">
        </div> 
      </form>  
    </div>
  </div>
  <div class="row-checkout">
         <h4>Confirm Delivery Date and Time:</h4>  
    <div class="container-checkout">        
         
          <div class="column delivdate">
            <h4>DATE: 
            <?php $deliveryDate = strtotime("tomorrow");
                  echo date("d/m/Y", $deliveryDate) ;?>
            </h4>
             
          </div>  
          <div class="column delivdate">
            <h4>PRICE: &pound5.99</h4>
         
          </div>           

    
        <button type="submit" class="btn-checkout btn-paypal">Continue to checkout with PayPal</button>           
    </div>
  </div>

 </div>
</body>
</html>
