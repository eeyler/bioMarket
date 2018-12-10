<?php
  // Update Customer Order Status     
 if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "shipped") {
 
    $ord_num = $_REQUEST["ord_num"];
    $search = "UPDATE customer_order co SET co.sts = 'SHIPPED' WHERE co.ord_num = '$ord_num' ";
    mysqli_query($mysqli, $search);
    

    include_once 'acp_customers_orders.php';  
    
}      
      
        
  if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "delivered") {
 
    $ord_num = $_REQUEST["ord_num"];
    $search = "UPDATE customer_order co SET co.sts = 'DELIVERED' WHERE co.ord_num = '$ord_num' ";
    mysqli_query($mysqli, $search);
    
    

   include_once 'acp_customers_orders.php';   
  
}
        
  