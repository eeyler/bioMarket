<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/new_product.css"> 
</head>
<body>

<?php
include_once "admin_panel_connection.php";   
if ((isset($_POST["prod_id"])) && ((isset($_POST["cat_id"])) || (isset($_POST["sup_id"])))) {
    
    if ((!$_POST["prod_name"] == "")) {
  
    // Update the Product Details
    $search = "UPDATE products SET prod_name = '" . $_POST["prod_name"] . "', price = '" . $_POST["price"] . "',  sup_id = '" . $_POST["sup_id"] . "', prod_dsc = '" . $_POST["prod_dsc"] . "',  cat_id = '" . $_POST["cat_id"] . "', sto_qty = '" . $_POST["sto_qty"] . "' WHERE prod_id =   '" . $_POST["prod_id"] . "'  ";
    mysqli_query($mysqli, $search);
    print "<h4>The Product was Updated! </h4>"; 
  
    
    $search = "SELECT * FROM products, suppliers, category WHERE products.cat_id = category.cat_id AND suppliers.sup_id = products.sup_id AND products.prod_id = ".(int)$_REQUEST["prod_id"];
    $result = mysqli_query($mysqli, $search);

    while ($row = mysqli_fetch_assoc($result))
    {   

?>      
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
    <p>Price: &pound<?php echo $row["price"]?></p>
  </div>
  <div class="product">
    <p>Supplier: <?php echo $row["sup_name"]?></p>
  </div>      
     
  <div class="product">
    <p>Description of the Product:</p>
    <p><?php echo $row["prod_dsc"]?></p>
  </div>
  <div class="product">
    <p>Quantity: <?php echo $row["sto_qty"]?></p>
  </div>

  </div>  
</div>
  


 </body>
</html>
<?php
        }

    }
}
    
