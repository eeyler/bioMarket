<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/order.css">
</head>
<body>
  
 <?php 
    $page_title = 'BioMarket | Customer Orders';
    include_once "admin_panel_connection.php"; 
 ?>   
 <div class="orders_container">
      <h2>Customer Orders:</h2>  
   
 <?php 
    $search0 = "SELECT * FROM customer_order AS co LEFT JOIN users u ON co.usr_id = u.usr_id ORDER BY co.ord_dte DESC";
    $result0 = mysqli_query($mysqli, $search0);
            while ($row0 = mysqli_fetch_assoc($result0))
            {     
                
                $cur_ord_num = $row0['ord_num'];
                $cur_price_sum = $row0['price_sum'];
                $cur_ord_dte = $row0['ord_dte']; 
                $cur_sts = $row0['sts'];
                $cur_user = $row0['f_name'] . " " . $row0['l_name'];
      
?>  
    <div class="smaller_container">      
      
    <div class="row-order">
        <div class="ord_id">
            Order ID: <?php echo $cur_ord_num; ?>
         
        </div>
        <div class="value">
            Total Value: &pound<?php echo $cur_price_sum; ?>
         
        </div>
    </div>    
    <div class="row-order">   
    
        <div class="ord_id">
            Customer: <?php echo $cur_user; ?>
        </div>      
        

        <div class="value">
            Order placed: 
                <?php $deliveryDate = strtotime($cur_ord_dte);
                      echo date("d/m/Y", $deliveryDate) ;
                ?>
            
        </div>
    </div>
    <hr>
     <div class="row-order">    
        <div class="ord_id">
            Arriving: 
                <?php $date = date_create($cur_ord_dte);
                date_add($date,date_interval_create_from_date_string("1 days"));
                echo date_format($date,"d/m/Y");
                ?>
            
       
        </div>
        <div class="value">
            Status: <?php echo $cur_sts; ?>
         </div>       
    </div>
<?php
  $search1 = "SELECT * FROM customer_order_line col, products prod, category cat WHERE ord_num = '$cur_ord_num' AND col.prod_id = prod.prod_id AND prod.cat_id = cat.cat_id";
                $result1 = mysqli_query($mysqli, $search1);
                while ($row1 = mysqli_fetch_assoc($result1)) 
                {
                $cur_prod_id = $row1['prod_id'];
                $cur_cat_img = $row1['cat_img'];              
                $cur_prod_name = $row1['prod_name'];              
                $cur_ord_qty = $row1['ord_qty'];              
                $cur_sub_total = $row1['sub_total'];                 


?>     
   <div class="orders_column col1">  
        <div class="row-order">    
          <div class="column" style="background-color:#aaa;">
              <?php print '<div class="category-img"><img alt="product example" src=" ' .$cur_cat_img. ' "></div>'; ?>
          </div>
          <div class="column check-name" style="background-color:#bbb;">
            <p><?php echo $cur_prod_name; ?></p>
          </div>
          <div class="column" style="background-color:#ccc;">
            <p>Qty: </p>
          </div>
          <div class="column" style="background-color:#ddd;">
            <p><?php echo $cur_ord_qty; ?></p>              
          </div>  
          <div class="column check-price" style="background-color:#ccc;">
            <p>&pound<?php echo $cur_sub_total; ?></p>
          </div>   
        </div>
    </div> 
<?php 
     // Update Customer Order Status  to delivered      
    $search = "SELECT * FROM customer_order WHERE ord_num = '$cur_ord_num' ";
    $result = mysqli_query($mysqli, $search); 
    $temp_row2 = mysqli_fetch_assoc($result);
   

                }

 
        print '<div class="btn-status">
    <div class="btn-sts">
         
    <a href="?page=acp_customers_orders_sts&ord_num='  .$temp_row2['ord_num']. ' &action=shipped">Shipped</a></div> 
    <div class="btn-sts">  
         
    <a href="?page=acp_customers_orders_sts&ord_num=' .$temp_row2['ord_num']. '&action=delivered">Delivered</a></div> </div> ';  
 /* 
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
  
 
*/
 
 
?>  
      
      

     
   </div>     
<?php 
           
 }
    
?>  
     
   
    
</div>
 
</body>
</html>