<!DOCTYPE html>

<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" type="text/css" href="css/supplier.css">
</head>



<?php
	
	$page_title = 'BioMarket | Supplier Order';
        include "admin_panel_connection.php";
	
?>   
<div class="container"> 
<h2>Supplier Orders | Supplier Order View</h2>         
<div class="row2">
    
  
    <div class="title main2">	
        <form action='?page=acp_sup_ord_main' method = 'post'>  
            <input type='submit' value='Go to Supplier Order Creation'>
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

    $search = "SELECT * FROM supplier_ord WHERE sts = 'SUBMITED' ORDER BY supplier_ord.sup_ord_id";
    $result = mysqli_query($mysqli, $search);        
?>

<h4>Submitted Orders</h4>  
<div class="row header-supplier">
  <div class="column cname">
    <h4>Supplier Order Id</h4>
   </div>
  <div class="column cname">
    <h4>Status</h4>      
  </div>
  <div class="column cname">
    <h4>Date Created</h4>
  </div>
  <div class="column sup">
    <h4>Total Value</h4>
  </div>

</div>      
<?php    
    while ($row = mysqli_fetch_assoc($result))
    {
?>        
<div class="row">
  <div class="column cname">
    <?php echo $row["sup_ord_id"] ?>
  </div>
  <div class="column cname">
      <?php echo $row["sts"] ?>
  </div>
  <div class="column cname">
     <?php echo $row["ord_dte"] ?>
  </div>
  <div class="column cname">
     <?php  echo $row["price_sum"] ?>
  </div>
     
                     
<?php 

echo "<div class= 'column long'>  
        <form action='?page=acp_sup_ord_view' method = 'post'>    
            <input type = 'hidden'  name ='sup_ord_id1' value = {$row['sup_ord_id']}>
            <input type='submit' value='Details' class='btn-suppdel'>
        </form>
   
        <form action='?page=sup_ord_complete_order' method = 'post'>        

            <input type = 'hidden' name = 'sup_ord_id2' value = {$row['sup_ord_id']}>
            <input type = 'hidden' name = 'sts' value = {$row['sts']}>
            <input type='submit' value='Complete' class='btn-suppdel'>
        </form> </div> 
    </div> ";
	

}
	
if (isset($_POST["sup_ord_id1"]))
{

    $cri = $_POST["sup_ord_id1"];
    $search1 = "SELECT * FROM supplier_ord_ln WHERE sup_ord_id = '$cri' ORDER BY sup_ord_ln";
    $result1 = mysqli_query($mysqli, $search1);
  
        echo "<h2>Order Lines</h2>";
        echo "<h4>Detail for Order: ".$_POST["sup_ord_id1"]."</h4>";
?>                        
<div class="row header-supplier">
  <div class="column cname">
    <h4>Supplier Order Line</h4>
   </div>
  <div class="column cname">
    <h4>Supplier Order Number</h4>      
  </div>
  <div class="column cname">
    <h4>Order Quantity</h4>
  </div>
  <div class="column cname">
    <h4>Product Id</h4>
  </div>
  <div class="column sup">
    <h4>Price</h4>
  </div>

</div>   


<?php
        while ($row = mysqli_fetch_assoc($result1))
        {
?>   
 <div class="row">
  <div class="column cname">
    <?php echo $row["sup_ord_ln"]; ?>
  </div>
  <div class="column cname">
      <?php echo $row["sup_ord_id"]; ?>
  </div>
  <div class="column cname">
     <?php echo $row["ord_qty"]; ?>
  </div>
  <div class="column cname">
     <?php  echo $row["prod_id"]; ?>
  </div> 
  <div class="column cname">
     <?php  echo $row["price"]; ?>
  </div>     
 </div>                         


  <?php                      

			}
?>
</div> 
<?php

		
	
		}
		
			
			
	