<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
    <link rel="stylesheet" href="css/stock_07.12.2018.css">
</head>

<body>

<?php
    $page_title = 'BioMarket | Customers';
    include "admin_panel_connection.php";
    
?>    
 <div class="orders_container">
      <h2>Customers Report:</h2>  
<?php      
$search1 = "SELECT u.f_name AS f_name, u.l_name AS l_name, u.acc_crt_dte AS acc_crt_dte, u.usr_id AS usr_id, CASE WHEN SUM(col.sub_total) > 0 THEN SUM(col.sub_total) ELSE 0 END as sub_total FROM users u  LEFT JOIN customer_order co ON u.usr_id = co.usr_id LEFT JOIN customer_order_line col ON co.ord_num = col.ord_num  WHERE u.lvl = 'MEMBER' GROUP BY u.usr_id ORDER BY sub_total DESC";
$result1 = mysqli_query($mysqli, $search1);
while ($row1 = mysqli_fetch_assoc($result1)) 
{
$cur_user = $row1['f_name']. " " . $row1['l_name'];
$cur_acc_crt_dte = $row1['acc_crt_dte'] ;
$cur_sub_total = $row1['sub_total'];    
$cur_usr_id = $row1['usr_id'];     
?>  
<div class="row-stock customer-column">

  <div class="column two-stock">
    <p><?php echo $cur_user ?></p>
   
  </div>

  <div class="column unit2">
   
    <p>Member since: </p>
  </div>
  <div class="column unit2">
    
    <p><?php $joindate = strtotime($cur_acc_crt_dte);
                      echo date("d/m/Y", $joindate) ;?></p>
  </div>
  <div class="column unit2">
   
    <p>Orders Value: </p>
  </div>

  <div class="column unit2">
     
    <p>&pound <?php echo $cur_sub_total; ?></p>
  </div>  

  <div class="column unit2">
<?php   
   print '<div class="btn-details">
         
   <a href="?page=acp_customers&usr_id=' . $cur_usr_id . '&action=see_details">Details</a></div> ';  
   
?>      
     
  </div>  

</div>
<?php
 
  } 
  
?>
</div>      
</body>





