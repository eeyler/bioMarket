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

if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "add_to_basket") {
   if (isset($_POST["sto_qty"]))
    {
        if (!$_POST["sto_qty"] == ""){ 
    $search = "SELECT * FROM products WHERE prod_id = ".(int)$_REQUEST["prod_id"] ." ";
    $result = mysqli_query($mysqli, $search);   
    
    
    $search = "INSERT INTO cart_tmp (crt_id, prod_id, ord_qty) VALUES ('". (int) $_SESSION["users"]["usr_id"] ."' , ".(int)$_REQUEST["prod_id"] ." ,  '".$_POST["sto_qty"]."')";
    mysqli_query($mysqli, $search);
    
    
    
    
} print "Enter Quantity";  
}   
    }












       
       $search = "SELECT * FROM products, cart_tmp, category, users WHERE users.usr_id = " . (int) $_SESSION["users"]["usr_id"] . " AND cart_tmp.crt_id = users.usr_id AND products.prod_id = cart_tmp.prod_id AND products.cat_id = category.cat_id";
       $result = mysqli_query($mysqli, $search);
      
        while ($row = mysqli_fetch_assoc($result))
        { 
    
                 
?>                  
 

      
<div class="row-stock">
  <div class="column" style="background-color:#aaa;">
      <?php print '<div class="category-img"><img alt="product example" src=" ' .$row["cat_img"]. ' "></div>'; ?>
   
  </div>
  <div class="column two" style="background-color:#bbb;">
    <p><?php echo $row["prod_name"]?></p>
   
  </div>
  <div class="column" style="background-color:#ccc;">
    <p>Qty: </p>
 
  </div>
  <div class="column" style="background-color:#ddd;">
    
    <p><?php echo $row["ord_qty"]?></p>
  </div>  
  <div class="column unit" style="background-color:#bbb;">
   
    <p>Value: </p>
  </div>
  <div class="column" style="background-color:#ccc;">
    
    <p>£<?php echo $row["price"]?></p>
  </div>
  <div class="column three" style="background-color:#ddd;">
<?php   
    print '<div class="btn-details">
         
    <a href="?page=remove_from_cart&prod_id=' . $row["prod_id"] . '&action=remove">Remove</a></div> ';  
      
?>      
      
  </div>  

</div>
      
      

<?php }      ?>
      <hr>
      <p>Total Value: <span class="price" style="color:black"><b></b></span></p>
      <p> 1325223556</p>      
      
    </div>
     <div class="container-cart">
<?php   
    print '<div class="btn-checkout">
         
    <a href="?page=acp_stock_details&prod_id=' . $row["prod_id"] . '&action=checkout">Proceed to Checkout</a></div> ';  
      
?>     
    </div>



</body>
</html>


