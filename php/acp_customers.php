<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
    <link rel="stylesheet" href="css/stock.css">
</head>

<body>

<?php
    $page_title = 'BioMarket | Customers';
    include "admin_panel_connection.php";
 /*
    $search = "SELECT * FROM users WHERE users.lvl = 'MEMBER' ";
    $result = mysqli_query($mysqli, $search);   
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {    
 */  
    
    $search = "SELECT * FROM users WHERE users.lvl = 'MEMBER' ";
    $result = mysqli_query($mysqli, $search);   
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {  
         
        $search = "SELECT SUM(price_sum) FROM customer_order, users WHERE users.usr_id = customer_order.usr_id";
        $result2 = mysqli_query($mysqli, $search); 
           if (mysqli_num_rows($result2) > 0) {
               
           // output data of each row
           while($row2 = mysqli_fetch_assoc($result2)) {
               
           $sum = $row2["SUM(price_sum)"];
        
  
?>  
<div class="row-stock">

  <div class="column two-stock" style="background-color:#ccc;">
    <p><?php echo $row["f_name"] . " " . $row["l_name"]?></p>
   
  </div>

  <div class="column unit2" style="background-color:#bbb;">
   
    <p>Member since: </p>
  </div>
  <div class="column unit2" style="background-color:#ccc;">
    
    <p><?php $joindate = strtotime($row["acc_crt_dte"]);
                      echo date("d/m/Y", $joindate) ;?></p>
  </div>
  <div class="column unit2" style="background-color:#bbb;">
   
    <p>Orders Value: </p>
  </div>

  <div class="column" style="background-color:#ccc;">
     
    <p><?php 
   
    
//$sum = 0;
//    $search2 = "SELECT SUM(price_sum) FROM customer_order, users WHERE customer_order.usr_id = users.usr_id";
//    $result2 = mysqli_query($mysqli, $search2);
//    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

  //   $sum = $row["SUM(price_sum)"];


      echo $sum;
    }
} 

    ?></p>
  </div>  

  <div class="column unit2" style="background-color:#bbb;">
<?php   
   print '<div class="btn-details">
         
   <a href="?page=acp_customers&usr_id=' . $row["usr_id"] . '&action=see_details">Details</a></div> ';  
   
?>      
     
  </div>  

</div>
<?php
 
  } 
  
?>
</body>





