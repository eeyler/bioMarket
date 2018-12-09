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
    <div class="btn-new-prod"><a href="?page=acp_add_new_product">Add New Product</a></div>

<?php
    $page_title = 'BioMarket | Stock';
    
    // Delete Product from the cart    
    if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "remove") {
 /*   $search = "SELECT * FROM products, category WHERE products.cat_id = category.cat_id ORDER BY products.cat_id";
    $result = mysqli_query($mysqli, $search);        
 */ 
    
    $search = "DELETE FROM products WHERE prod_id = ".(int)$_REQUEST["prod_id"]." ";
    mysqli_query($mysqli, $search);   
       
    }   
    $search = "SELECT * FROM products, category WHERE products.cat_id = category.cat_id ORDER BY products.cat_id";
    $result = mysqli_query($mysqli, $search);

    while ($row = mysqli_fetch_assoc($result))
    { 

                 
?>                  
                <div class="cart-row">
                    <div class="row">
                        <div class="col-lg-1 col-md-3 col-xs-2 " >
                        <?php print '<div class="category-img"><img alt="product example" src=" ' .$row["cat_img"]. ' "></div>'; ?>
   
                        </div>
                        <div class="col-lg-2 col-md-3 col-xs-2 stock-name" >
                            <p><?php echo $row["prod_name"] ?></p>
                        </div>

                        <div class="col-lg-1 col-md-3 col-xs-2" >
                            <p>Qty: </p>
                        </div>

                        <div class="col-lg-1 col-md-3 col-xs-2" >
    
                            <p><?php echo $row["sto_qty"]?></p>
                        </div>  
                        <div class="col-lg-2 col-md-3 col-xs-2 four" >
   
                           <p>Price per unit: </p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-xs-2" >
    
                           <p>&pound<?php echo $row["price"]?></p>
                        </div>
                        <div class="col-lg-1 col-md-3 col-xs-2 seven" >
<?php   
    print '<div class="btn-details"><a href="?page=acp_stock_details&prod_id=' . $row["prod_id"] . '&action=see_details">Details</a></div> ';  
      
?>   
                        </div>                                
                        <div class="col-lg-1 col-md-3 col-xs-2s five" >                            
<?php   
    print '<div class="btn-remove"><a href="?page=acp_stock&prod_id=' . $row["prod_id"] . '&action=remove">X</a></div> ';    
      
?>       
                        </div>  

                    </div>

                </div>
</body>

<?php


        }
