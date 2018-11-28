<?php

$page_title = 'BioMarket | SUPPLIER ORDERS | NEW PRODUCT';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">


  <link rel="stylesheet" type="text/css" href="css/new_product.css"> 
</head>
<body>
    
    
<?php include "admin_panel_connection.php"; ?>      


<div class="acp-add-prod-wrap">
  <div class="side left">   
  <div class="fakeimg">Image</div>    
<form action="?page=add_product_to_stock" method="post" enctype="multipart/form-data">

   <input type="file" name="prod_img">
<!--    <button type="submit" name="submit" >UPLOAD</button>-->

  </div>

  <div class="side right">
  <div class="product">
    <input type="text" placeholder="Enter product name" name="prod_name" >
  </div>    
  <div class="product">
    <p>Product Category:</p>
    <select name="cat_id">
        
        <option value="BAKERY">Bakery</option>  
        <option value="DRINK">Drink</option>       
        <option value="VEGETABLES">Vegetables</option>
        <option value="DAIRY">Dairy</option>
    </select>
  </div>     
  <div class="product">
    <p>Price:</p><input type="text" placeholder="Enter product price" name="price" >
  </div>
  <div class="product">
    <p>Supplier:</p>
    <select name="sup_id">
        <option value="0">Choose Supplier</option>  
        <option value="1">Real Bakery</option>  
        <option value="2">Organic Drink Corp</option>       
        <option value="3">Fresh Veggie</option>
        <option value="4">Happy Cows Dairy</option>
    </select>
  </div>      
   
    
  <div class="product">
    <p>Description of the Product:</p>
    <textarea  placeholder="Enter Product Description" name="prod_dsc" ></textarea>
  </div>
  <div class="product">
    <p>Quantity:</p><input type="text" placeholder="Enter stock quantity" name="sto_qty" >
  </div>
  <button type="submit" name="submit" class="btn-login">Add Product To Stock</button>
  </div>


</form>

</div>

 </body>
</html>
