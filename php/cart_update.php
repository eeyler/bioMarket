<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/stock.css">
</head>
<body>
<?php
      $page_title = 'BioMarket | Your Cart';
      include_once "user_panel_connection.php"; 
?>
<div class="container-cart">
      <h2>Your Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h2>
<?php
 // Delete Product from the cart    
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "remove") {
    
    // Update Product quantity with the deleted quantity        
    $search = "SELECT * FROM cart_tmp WHERE crt_id =  ".(int)$_SESSION["users"]["usr_id"]."";
    $result = mysqli_query($mysqli, $search); 
    $temp_row1 = mysqli_fetch_assoc($result);  
    
    $search = "SELECT * FROM cart_tmp, products WHERE cart_tmp.prod_id = products.prod_id ";
    $result = mysqli_query($mysqli, $search); 
    $temp_row2 = mysqli_fetch_assoc($result);    
    
    $new_qty = $temp_row2["sto_qty"] + $temp_row1["ord_qty"];
    $search = "UPDATE products SET sto_qty = $new_qty WHERE prod_id =   " . $temp_row1["prod_id"] . " ";
    mysqli_query($mysqli, $search);    
    
    
    $search = "DELETE FROM cart_tmp WHERE prod_id = ".(int)$_REQUEST["prod_id"]." AND crt_id =  ".(int)$_SESSION["users"]["usr_id"]." ";
    mysqli_query($mysqli, $search);
    
     
}
if (isset($_POST["prod_id"]))
    {
 $search = "SELECT * FROM cart_tmp WHERE prod_id = '".$_POST["prod_id"]."' AND crt_id =  ".(int)$_SESSION["users"]["usr_id"]."";
 $result = mysqli_query($mysqli, $search); 
  $row = mysqli_fetch_assoc($result); 
 $search = "SELECT * FROM products WHERE prod_id = '".$_POST["prod_id"]."' ";
 $result = mysqli_query($mysqli, $search); 
 $row1 = mysqli_fetch_assoc($result); 
// Add product to the cart  
if (isset($_POST["ord_qty"]))
    {
	if (($_POST["ord_qty"] == 0 ) || ($_POST["ord_qty"] == "0"))
	{

                print "<h4>Enter the requested quantity!</h4>";
	}
	elseif ($_POST["ord_qty"] > ($row["ord_qty"] + $row1["sto_qty"])) { 
            
                print "<h4>Sorry, but the product is not avaiable in the requested quantity!</h4>";
        } else {      
        $search = "SELECT * FROM cart_tmp WHERE crt_id =  ".(int)$_SESSION["users"]["usr_id"]." AND prod_id = '" . $_POST["prod_id"] . "' ";
        $result = mysqli_query($mysqli, $search);
        $row2 = mysqli_fetch_assoc($result);                            
                
                
        if ( ($row2["prod_id"] == $_POST["prod_id"]) && ($row2["crt_id"] == $_SESSION["users"]["usr_id"]) ){

            if (($row2["ord_qty"] + $row1["sto_qty"]) >= $_POST["ord_qty"]) {     
            // Update the Product Quantaty in the Cart
            $search = "UPDATE cart_tmp SET ord_qty =  '" . $_POST["ord_qty"] . "'  WHERE prod_id =   '" . $_POST["prod_id"] . "' AND crt_id =  ".(int)$_SESSION["users"]["usr_id"]." ";
            mysqli_query($mysqli, $search);     
               
            print "<h4>The Cart was Updated! </h4>";                           
            }  
        }

            $search = "SELECT * FROM products WHERE prod_id = '".$_POST["prod_id"]."' ";
            $result = mysqli_query($mysqli, $search); 
            $row3 = mysqli_fetch_assoc($result); 
            
            if ($row["ord_qty"] <= $_POST["ord_qty"]) {
            $quantity = $row3["sto_qty"] - ($_POST["ord_qty"] - $row["ord_qty"] );
   
            // Update the Product Quantaty in the Product table
            $search = "UPDATE products SET sto_qty =  $quantity  WHERE prod_id =   '" . $_POST["prod_id"] . "'  ";
            mysqli_query($mysqli, $search);
        //    print "<h4>The Product Quantity was Updated! </h4>";  
                
            }
            if ($row["ord_qty"] >= $_POST["ord_qty"]) {
            $qty2 = $row3["sto_qty"] + ($row["ord_qty"] - $_POST["ord_qty"]);
   
            // Update the Product Quantaty in the Product table
            $search = "UPDATE products SET sto_qty =  $qty2  WHERE prod_id =   '" . $_POST["prod_id"] . "'  ";
            mysqli_query($mysqli, $search);
         //   print "<h4>The Product Quantity was Updated! </h4>";           
         
            }     
         
        }
    } 
 
} 
  
       $search = "SELECT * FROM products, cart_tmp, category, users WHERE users.usr_id = " . (int) $_SESSION["users"]["usr_id"] . " AND cart_tmp.crt_id = users.usr_id AND products.prod_id = cart_tmp.prod_id AND products.cat_id = category.cat_id";
       $result = mysqli_query($mysqli, $search);
      
       $total = 0;
       while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
       { 
            $subtotal = $row["price"] * $row["ord_qty"];   
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
<form action="?page=cart_update" method="post" enctype="multipart/form-data">       
  <div class="column" style="background-color:#ddd;">
   
 
    <input name="ord_qty" type="text" value="<?php echo $row["ord_qty"]?>" >  
  </div>  
  <div class="column unit" style="background-color:#bbb;">
   
    <p>Value: </p>
  </div>
  <div class="column" style="background-color:#ccc;">
    <p>&pound<?php echo $row["price"]?></p>
  </div>
  <div class="column unit" style="background-color:#bbb;">
    <p>Subtotal: </p>
  </div>   
   <div class="column" style="background-color:#ccc;">
    <p>&pound<?php echo $subtotal; ?></p>
  </div>     
      
  <div class="column three" style="background-color:#ddd;">     
  <input name="prod_id" type="hidden" value="<?php echo $row["prod_id"]?>" >      
  <button type="submit" name="submit" class="btn-cart">Update</button> 

<?php   
    print '<div class="btn-cart">
         
    <a href="?page=cart_update&prod_id=' . $row["prod_id"] . '&action=remove">Remove</a></div> ';  
      
?>      
      
  </div>  
</form>  
</div>
      
      

<?php 
         $total += $subtotal;
    } 
    


?>
      <hr>
      <p>Total Value: <span class="price" style="color:black"><b></b></span></p>
       <p>&pound<?php echo $total; ?></p>      
      
    </div>
     <div class="container-cart">
<?php   
    print '<div class="btn-checkout">
         
    <a href="?page=checkout&prod_id=' . $row["prod_id"] . '&action=checkout">Proceed to Checkout</a></div> ';  
      
?>     
    </div>



</body>
</html>


