<!DOCTYPE html>

<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/supplier.css">
</head>
<body>
<?php
	$page_title = 'BioMarket | Supplier Order';
        include "admin_panel_connection.php";	       
?>   
<div class="container"> 
<h2>Supplier Orders | Order Creation</h2>         
<div class="row2">
    
    <div class="title main">	
         <form action='?page=acp_sup_ord_view' method = 'post'>
            <input type='submit' value='Go to Order View'>
        </form>
    </div>
    <div class="title main">			
        <form action='?page=acp_sup_ord_arch' method = 'post'>                       
           <input type='submit' value='Go to Archive'>
        </form>  
    </div>  
</div>
<?php
	$user =  (int) $_SESSION["users"]["usr_id"];
 
	if (isset($_POST["cat_tmp"]) )
	{
	$cat_tmp = $_POST["cat_tmp"];
	}
	else
	{
	$cat_tmp = '1';	
	}
		

  ?> 
   

<h2>Products</h2>    
<h4>Please Select a Category</h4>		
    <div class="row2">
    
    <div class="title">
        <form action='?page=acp_sup_ord_main' method = 'post'>
            <input type='hidden' name='cat_tmp' value='1' >
            <input type='submit' value='BAKERY'>
        </form> 
    </div>
    <div class="title">
        <form action='?page=acp_sup_ord_main' method = 'post'>
            <input type='hidden' name='cat_tmp' value='2' >
            <input type='submit' value='DRINK'>
        </form> 
    </div>
    <div class="title">
        <form action='?page=acp_sup_ord_main' method = 'post'>
            <input type='hidden' name='cat_tmp' value='3' >
            <input type='submit' value='VEGETABLES'>
        </form> 
    </div>
    <div class="title">
        <form action='?page=acp_sup_ord_main' method = 'post'>
            <input type='hidden' name='cat_tmp' value='4' >
            <input type='submit' value='DAIRY'>
        </form> 
    </div>
 </div>
<?php
 

    $search = "SELECT * FROM products, category WHERE products.cat_id = category.cat_id AND products.cat_id = '$cat_tmp' ORDER BY products.cat_id";
    $result = mysqli_query($mysqli, $search);  
?>
<div class="row header">
  <div class="column cname">
    <h4>Product Name</h4>
   </div>
  <div class="column sup">
    <h4>Stock Qty</h4>      
  </div>
  <div class="column price">
    <h4>Price</h4>
  </div>
  <div class="column sup">
    <h4>Supplier ID</h4>
  </div>
  <div class="column dsc">
    <h4>Product Description</h4>
  </div>
  <div class="column">
    <h4>Category</h4>
  </div>
  <div class="column price">
    <h4>Qty</h4>
  </div>

</div>      
        
 <?php       

    while ($row = mysqli_fetch_assoc($result))
    {

?>
<div class="row">
  <div class="column cname">
    <?php echo $row["prod_name"] ?>
  </div>
  <div class="column sup">
      <?php echo $row["sto_qty"] ?>
  </div>
  <div class="column price">
     <?php echo $row["price"] ?>
  </div>
  <div class="column sup">
     <?php  echo $row["sup_id"] ?>
  </div>
  <div class="column dsc">
      <?php echo $row["prod_dsc"] ?>
  </div>
  <div class="column">
     <?php echo $row["cat_name"] ?>
  </div>
 

 
<?php
echo "<div class= 'column item'>  
    <form action='?page=sup_ord_tmp_add' method = 'post'>
        <input type='text' name='ord_qty' size='4'>
        <input type='hidden' name='prod_id' value={$row['prod_id']} >
        <input type='hidden' name='sup_ord_id' value= ". $user . " >
        <input type='hidden' name='cat_tmp' value= '$cat_tmp' >
        <input type='submit' value='Add to Cart' class='btn-supplier'>
    </form> </div> ";
 

?>
       
</div>

<?php
}   			
    $search = "SELECT COUNT(*) as c from sup_ord_tmp";
    $result = mysqli_query($mysqli, $search);
	$row = mysqli_fetch_assoc($result);
	If ($row['c'] == 0)	
	{	}
	else 
	{   	
		$search = "SELECT * from sup_ord_tmp ORDER BY ord_ln ";
		$result = mysqli_query($mysqli, $search);
        echo "<h4>Products in Supplier Order Cart</h4>";

?>              
                
<div class="row header">
  <div class="column cname">
    <h4>Supplier Order Id</h4>
   </div>
  <div class="column cname">
    <h4>Order Line</h4>      
  </div>
  <div class="column cname">
    <h4>Order Quantity</h4>
  </div>
  <div class="column cname">
    <h4>Product Id</h4>
  </div>
  <div class="column sup">
    <h4>Qty</h4>
  </div>



</div>                     
                
  <?php              
                
    while ($row = mysqli_fetch_assoc($result))
    {
	
?>		
 <div class="row">
  <div class="column cname">
    <?php echo $row["sup_ord_id"]; ?>
  </div>
  <div class="column cname">
      <?php echo $row["ord_ln"]; ?>
  </div>
  <div class="column cname">
     <?php echo $row["ord_qty"]; ?>
  </div>
  <div class="column cname">
     <?php  echo $row["prod_id"]; ?>
  </div>
<?php
  echo " <div class= 'column long'>
    <form action='?page=sup_ord_tmp_del' method = 'post'>
	<input type='hidden' name='prod_id' value={$row['prod_id']} >
	<input type='hidden' name='sup_ord_id' value= ". $user . " >
        <input type='submit' value='Delete' class='btn-suppdel'>
    </form> 
			
    <form action='?page=sup_ord_tmp_upd' method = 'post'>
        <input type='text' name='ord_qty' size='4'>
        <input type='hidden' name='prod_id' value={$row['prod_id']} >
	<input type='hidden' name='sup_ord_id' value= ". $user . " >
        <input type='submit' value='Update' class='btn-suppdel'> 
   </form> </div> ";
?>       
  </div>    
<?php                   
                } 
echo "<form action='?page=sup_ord_create_order' method = 'post'>
	<input type='hidden' name='sup_ord_id' value= ". $user . " >           
        <input type='submit' value='Create Order' class='btn-suppclear'>
    </form> ";        
                
                
?>                
    <form action='?page=sup_ord_cart_clear' method = 'post'>

        <input type='hidden' name='user_id' value="  <?php $user ?>" >
        <input type='submit' value='Clear Cart' class='btn-suppclear'>
    </form>                   
  </div>                    
              
<?php
	
	}
 ?>  



</body>                            
</html>
