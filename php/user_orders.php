<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/order.css">
</head>
<body>
  
 <?php 
    $page_title = 'BioMarket | Your Orders';
    include_once "user_panel_connection.php"; 
 ?>   
 <div class="orders_container">
      <h4>Your Orders:</h4>  
   
 <?php 
   $search = "SELECT  * FROM customer_order AS co JOIN customer_order_line AS col ON (co.ord_num = col.ord_num) "
           . "JOIN products AS pr ON (pr.prod_id = col.prod_id) "
           . "JOIN category AS cat ON (cat.cat_id = pr.cat_id) "
           . "WHERE co.usr_id = " . (int) $_SESSION["users"]["usr_id"] . " ";
    $result = mysqli_query($mysqli, $search);

     while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
   { 

 
 
?>  
      <div class="smaller_container">      
      
    <div class="row-order">
        <div class="ord_id">
            Order ID: <?php echo $row["ord_num"]?>
         
        </div>
        <div class="value">
            Total Value: &pound<?php echo $row["price_sum"]?>
         
        </div>
    </div>
    <div class="row-order">   
        <div class="bbbbbbb">
            <p>Order placed: 
                <?php $deliveryDate = strtotime($row["ord_dte"]);
                      echo date("d/m/Y", $deliveryDate) ;
                ?>
            <p>


        </div>
    </div>
     
      <hr>
     <div class="row-order">    
        <div class="dddddd">
            <p>Arriving: 
                <?php $date = date_create($row["ord_dte"]);
                date_add($date,date_interval_create_from_date_string("1 days"));
                echo date_format($date,"d/m/Y");
                ?>
            </p>
       
        </div>
    </div>
      

      
   <div class="orders_column col1">  
      
        <div class="row-order">    
         
          <div class="column cat" style="background-color:#aaa;">
              <?php print '<div class="category-img"><img alt="product example" src=" ' .$row["cat_img"]. ' "></div>'; ?>

          </div>
          <div class="column check-name" style="background-color:#bbb;">
            <p><?php echo $row["prod_name"]?></p>

          </div>
 
    
          <div class="column" style="background-color:#ccc;">
            <p>Qty: </p>
          </div>
          <div class="column" style="background-color:#ddd;">
            <p><?php echo $row["ord_qty"]?></p>              
          </div>  
          <div class="column check-price" style="background-color:#ccc;">
            <p>&pound<?php echo $row["sub_total"]?></p>
          </div>   
        </div>
        
    </div> 

      
      
    <div class="orders_column col2">        
        <div class="gggggg">
            <p>STATUS: <?php echo $row["sts"]?></p>
        
        </div>
    </div>
     
   </div>     
<?php 
 
 }

?>  
   
    
</div>
 
</body>
</html>