<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/new_product.css"> 
</head>
<body>
  
<?php  
$page_title = 'BioMarket | Product'; 
include "admin_panel_connection.php"; 
 
    $search = "SELECT * FROM products, suppliers, category WHERE products.cat_id = category.cat_id AND suppliers.sup_id = products.sup_id AND products.prod_id = ".(int)$_REQUEST["prod_id"];
    $result = mysqli_query($mysqli, $search);

    while ($row = mysqli_fetch_assoc($result))
    {   

?>
<form action="?page=cart" method="post" enctype="multipart/form-data">    
<div class="acp-add-prod-wrap">
  
  <div class="side left">   
     <div class="fakeimg">
         <?php print '<img alt="product example" src=" ' .$row["prod_img"]. ' ">'; ?>
     </div>   
    
  </div>
     
 <div class="side right">
  <div class="product">
    <h2><?php echo $row["prod_name"]?></h2>
  </div>    
  <div class="product">
    <p>Product Category: <?php echo $row["cat_name"]?></p>
    
  </div>     
  <div class="product">
    <p>Price: £<?php echo $row["price"]?></p>
  </div>
  <div class="product">
    <p>Supplier: <?php echo $row["sup_name"]?></p>
  </div>      
     
  <div class="product">
    <p>Description of the Product:</p>
    <p><?php echo $row["prod_dsc"]?></p>
  </div>
  <div class="product">
    <p>Available: <?php echo $row["sto_qty"]?></p>
  </div>
   
    <div class="product">
        <p>Quantity: </p><input type="text" placeholder="Enter Required Quantity" name="ord_qty" >
  </div>   
    
     
    <!-- Hidden Input area to call in the value for the prod_id primary key -->     
    <input name="prod_id" type="hidden" value="<?php echo $row["prod_id"]?>" >  
 <!--      <button type="submit" name="submit" class="btn-login">Add to Cart</button>-->
   <input name="add_to_cart" type="submit" value="Add to Cart">  
  </div>  
    
 
</div>
</form>    


 </body>
</html>
<?php
}




