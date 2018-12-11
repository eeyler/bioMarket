<?php
if ((isset($_POST["prod_id"])) || (isset($_POST["cat_id"])) || (isset($_POST["sup_id"]))) { 
   
    $search = "SELECT * FROM products, suppliers, category WHERE products.cat_id = category.cat_id AND suppliers.sup_id = products.sup_id AND products.prod_id = '" . $_POST["prod_id"] . "'";
    $result = mysqli_query($mysqli, $search);

    while ($row = mysqli_fetch_assoc($result))
    {   
        include_once "admin_panel_connection.php";   
                  
            
?>                  
<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="css/new_product.css">
</head>
<body>

<form action="?page=acp_product_to_stock_confirm" method="post" enctype="multipart/form-data"> 
<div class="acp-add-prod-wrap">

  <div class="side left">
    <?php print '<div class="fakeimg"><img alt="product example" src=" ' .$row["prod_img"]. ' "></div>'; ?>
  </div>

  <div class="side right">
    <input type="text" name="prod_name" value="<?php echo $row["prod_name"]?>" >
  <div class="product">
    <p>Product Category: <?php echo $row["cat_name"]?></p>
    <select name="cat_id">
        <option value="<?php echo $row["cat_id"]?>">Choose Category</option> 
        <option value="1">Bakery</option>  
        <option value="2">Drink</option>       
        <option value="3">Vegetables</option>
        <option value="4">Dairy</option>
    </select>
  </div>      
    
    
  <div class="product">
    <p>Price: &pound</p><input type="text" name="price" value="<?php echo $row["price"]?>" >
  </div>
  <div class="product">
    <p>Supplier: <?php echo $row["sup_name"]?></p>
    <select name="sup_id">
        <option value="<?php echo $row["sup_id"]?>">Choose Supplier</option> 
        <option value="1">Real Bakery</option>  
        <option value="2">Organic Drink Corp</option>       
        <option value="3">Fresh Veggie</option>
        <option value="4">Happy Cows Dairy</option>
    </select>
  </div>      
    
    
  <div class="product">
    <p>Description of the Product:</p>
    <textarea  name="prod_dsc" maxlength="255" ><?php echo $row["prod_dsc"]?></textarea>
  </div>
  <div class="product">
    <p>Quantity:</p><input type="text" name="sto_qty" value="<?php echo $row["sto_qty"]?>" >
  </div>
    
  <!-- Hidden Input area to call in the value for the prod_id primary key   -->
  <input name="prod_id" type="hidden" value="<?php echo $row["prod_id"]; ?>" > 
  <button name="confirm" type="submit" class="btn-conf-details">Confirm Product Details</button>  


  
  </div>

    
</div>
</form>    
<?php 
    }

}   
