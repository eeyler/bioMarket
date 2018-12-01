<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['prod_img'];
    $fileName = $_FILES['prod_img']['name'];
    $fileTmpName = $_FILES['prod_img']['tmp_name'];
    $fileSize = $_FILES['prod_img']['size'];    
    $fileError = $_FILES['prod_img']['error']; 
    $fileType = $_FILES['prod_img']['type'];
    
    $fileExtention = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExtention));
    
    $allowed = array('jpg', 'jpeg', 'png');
    
    if(in_array($fileActualExt, $allowed)){
        if ($fileError == 0){
            if ($fileSize < 1000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'img/uploads/'.$fileNameNew;
              
                move_uploaded_file($fileTmpName, $fileDestination);
                if ((!$_POST["sup_id"] == "0")) {
                $search = "INSERT INTO products (prod_name, price, sup_id, prod_dsc, prod_img, cat_id, sto_qty) VALUES ('".$_POST["prod_name"]."', '".$_POST["price"]."', '".$_POST["sup_id"]."', '".$_POST["prod_dsc"]."', '$fileDestination', '".$_POST["cat_id"]."', '".$_POST["sto_qty"]."')";
                mysqli_query($mysqli, $search);
             
             
                $search = "SELECT * FROM products, suppliers, category WHERE prod_img = ('$fileDestination') AND products.cat_id = category.cat_id AND products.sup_id = suppliers.sup_id";
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
    <input type="text" name="prod_name" value="<?php echo $row["prod_name"]?>" required>
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
    <p>Price:</p><input type="text" name="price" value="<?php echo $row["price"]?>" >
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
    <textarea  name="prod_dsc" maxlength="255" required><?php echo $row["prod_dsc"]?></textarea>
  </div>
  <div class="product">
    <p>Quantity:</p><input type="text" name="sto_qty" value="<?php echo $row["sto_qty"]?>" >
  </div>
    
  <!-- Hidden Input area to call in the value for the prod_id primary key -->     
  <input name="prod_id" type="hidden" value="<?php echo $row["prod_id"]?>" > 
  <input name="confirm" type="submit" value="Confirm Product Details">  
  
 <!-- 
  <button type="submit" name="submit" class="btn-login">Change Product Details</button> -->
  
  </div>

</form>
 
</div>

 </body>                  
                  
                  
                  
<?php                  
                 
                }
                
            }
                echo "Upload Successful!";
            }else {
                echo "Your image file is too big!";
            }
        }else {
            echo "There was an error uploading your file!";
        }
    }else {
        echo "You are missing the product picture or you are trying to upload a file which is not a jpg, jpeg oor png!";
    }
    
}

