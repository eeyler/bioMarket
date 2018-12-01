<!DOCTYPE html>
<html>
<head>
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
       $search = "SELECT * FROM products, category WHERE products.cat_id = category.cat_id ORDER BY products.cat_id";
       $result = mysqli_query($mysqli, $search);

        while ($row = mysqli_fetch_assoc($result))
        { 
          //include_once "admin_panel_connection.php";   
                 
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
    
    <p><?php echo $row["sto_qty"]?></p>
  </div>  
  <div class="column unit" style="background-color:#bbb;">
   
    <p>Price per unit: </p>
  </div>
  <div class="column" style="background-color:#ccc;">
    
    <p>£<?php echo $row["price"]?></p>
  </div>
  <div class="column three" style="background-color:#ddd;">
<?php   
    print '<div class="btn-details">
         
    <a href="?page=acp_stock_details&prod_id=' . $row["prod_id"] . '&action=see_details">See Details</a></div> ';  
      
?>      
      
  </div>  

</div>

</body>

<?php


        }
