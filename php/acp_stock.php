<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
    <link rel="stylesheet" href="css/stock.css">
</head>

<?php  include "admin_panel_connection.php"; ?>
<body>
    <div class="btn-add"><a href="?page=acp_add_new_product">Add New Product</a></div>
    <hr>
<?php
    $page_title = 'BioMarket | Stock';
    
    // Delete Product from the cart    
    if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "remove") {
    $search = "SELECT * FROM products, category WHERE products.cat_id = category.cat_id ORDER BY products.cat_id";
    $result = mysqli_query($mysqli, $search);        
  
    
    $search = "DELETE FROM products WHERE prod_id = ".(int)$_REQUEST["prod_id"]." ";
    mysqli_query($mysqli, $search);   
       
    }   
    $search = "SELECT * FROM products, category WHERE products.cat_id = category.cat_id ORDER BY products.cat_id";
    $result = mysqli_query($mysqli, $search);

    while ($row = mysqli_fetch_assoc($result))
    { 

                 
?>                  
 
<div class="row-stock">
  <div class="column" style="background-color:#aaa;">
      <?php print '<div class="category-img"><img alt="product example" src=" ' .$row["cat_img"]. ' "></div>'; ?>
   
  </div>
  <div class="column two-stock" style="background-color:#bbb;">
    <p><?php echo $row["prod_name"]?></p>
   
  </div>
  <div class="column" style="background-color:#ccc;">
    <p>Qty: </p>
 
  </div>
  <div class="column" style="background-color:#ddd;">
    
    <p><?php echo $row["sto_qty"]?></p>
  </div>  
  <div class="column unit2" style="background-color:#bbb;">
   
    <p>Price per unit: </p>
  </div>
  <div class="column" style="background-color:#ccc;">
    
    <p>&pound<?php echo $row["price"]?></p>
  </div>
  <div class="column three" style="background-color:#ddd;">
<?php   
    print '<div class="btn-details">
         
    <a href="?page=acp_stock_details&prod_id=' . $row["prod_id"] . '&action=see_details">Details</a></div> ';  
      
?>      
<?php   
    print '<div class="btn-details">
         
    <a href="?page=acp_stock&prod_id=' . $row["prod_id"] . '&action=remove">Remove</a></div> ';    
      
?>       
  </div>  

</div>

</body>

<?php


        }
