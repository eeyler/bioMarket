<?php

 // Update Customer Order Status     
if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "sts_shipped") {

     // Update Customer Order Status to shipped       
    $search = "SELECT * FROM customer_order WHERE ord_num = ".(int)$_REQUEST["ord_num"]." ";
    $result = mysqli_query($mysqli, $search); 
  
    while ($temp_row1 = mysqli_fetch_assoc($result))
    {   
    $sts_ord_num = $temp_row1['ord_num'];
  
    $search = "UPDATE customer_order SET sts = 'SHIPPED' WHERE ord_num =   ' $sts_ord_num ' ";
    mysqli_query($mysqli, $search); 
  }
} 
include_once 'acp_customers_orders.php';

 if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "sts_delivered") {
 
     // Update Customer Order Status  to delivered      
    $search = "SELECT * FROM customer_order WHERE ord_num = ".(int)$_REQUEST["ord_num"]." ";
    $result = mysqli_query($mysqli, $search); 
    while ($temp_row1 = mysqli_fetch_assoc($result))
    {   
    $sts_ord_num = $temp_row1['ord_num'];
  
    
   
    $search = "UPDATE customer_order SET sts = 'DELIVERED' WHERE ord_num =   '$sts_ord_num' ";
    mysqli_query($mysqli, $search); 
    
  }
}
include_once 'acp_customers_orders.php';