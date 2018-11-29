<?php

$page_title = 'BioMarket | STOCK ORDERS | NEW PRODUCT';

include_once "admin_panel_connection.php"; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="css/new_product.css">
</head>
<body>


<div class="acp-add-prod-wrap">

  <div class="side left">
   
  </div>
<form action="#" method="post" enctype="multipart/form-data">
  <div class="side right">
    <input type="text" name="prod_name" value="<?php echo $row["prod_name"]?>">
  <div class="product">
    <p>Product Category: <?php echo $row["cat_id"]?></p>
    <select name="cat_id" >       
        <option value="BAKERY">Bakery</option>  
        <option value="DRINK">Drink</option>       
        <option value="VEGETABLES">Vegetables</option>
        <option value="DAIRY">Dairy</option>
    </select>
  </div>      
    
    
  <div class="product">
    <p>Price:</p><input type="text" name="price" value="<?php echo $row["price"]?>">
  </div>
  <div class="product">
    <p>Supplier:</p>
    <select name="sup_id"><?php echo $row["sup_id"]?>
        <option value="0">Choose Supplier</option>  
        <option value="1">Real Bakery</option>  
        <option value="2">Organic Drink Corp</option>       
        <option value="3">Fresh Veggie</option>
        <option value="4">Happy Cows Dairy</option>
    </select>
  </div>      
    
    
  <div class="product">
    <p>Description of the Product:</p>
    <textarea  name="prod_dsc" ><?php echo $row["prod_dsc"]?></textarea>
  </div>
  <div class="product">
    <p>Quantity:</p><input type="text" name="sto_qty" value="<?php echo $row["sto_qty"]?>">
  </div>

  </div>

</form>
 
</div>

 </body>
</html>
