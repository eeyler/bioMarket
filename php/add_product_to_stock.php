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
                $search = "INSERT INTO products (prod_name, price, sup_id, prod_dsc, prod_img, cat_id, sto_qty) VALUES ('".$_POST["prod_name"]."', '".$_POST["price"]."', '".$_POST["sup_id"]."', '".$_POST["prod_dsc"]."', '$fileDestination', '".$_POST["cat_id"]."', '".$_POST["sto_qty"]."')";
                mysqli_query($mysqli, $search);
             
             
                $search = "SELECT * FROM products WHERE prod_img = ('$fileDestination')";
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


<div class="acp-add-prod-wrap">

  <div class="side left">
    <?php print '<div class="fakeimg"><img alt="product example" src=" ' .$row["prod_img"]. ' "></div>'; ?>
  </div>
<form action="#" method="post" enctype="multipart/form-data">
  <div class="side right">
    <input type="text" name="prod_name" value="<?php echo $row["prod_name"]?>">
  <div class="product">
    <p>Product Category:</p>
    <select name="cat_id" ><?php echo $row["cat_id"]?>
        
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
                  
                  
                  
<?php                  
                 
                }
                
    
                echo "Upload Successful!";
            }else {
                echo "Your image file is too big!";
            }
        }else {
            echo "There was an error uploading your file!";
        }
    }else {
        echo "You cannot upload files of this kind!";
    }
    
}

