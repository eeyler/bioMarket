<?php

if (isset($_POST["crt_ln"]))
    { 
   $search = "SELECT * FROM products, cart_tmp, category, users WHERE users.usr_id = " . (int) $_SESSION["users"]["usr_id"] . " AND cart_tmp.crt_id = users.usr_id AND products.prod_id = cart_tmp.prod_id AND products.cat_id = category.cat_id";
   $result = mysqli_query($mysqli, $search);

    while ($row2 = mysqli_fetch_assoc($result))
    { 
        $subtotal = $row2["price"] * $row2["ord_qty"]; 
        $ord_num =  $row2["crt_id"] . "_"  . date("YmdHis"); 
        $query = "INSERT INTO customer_order_line (ord_ln, ord_num,  prod_id, ord_qty, sub_total)
        VALUES
        (" . $row2["crt_ln"] .", '$ord_num' , " . $row2["prod_id"] ." , " . $row2["ord_qty"] .", $subtotal);";   

        print "<h4>Succesfully added product to the order history!</h4>";       
   
        if (!mysqli_query($mysqli, $query)) {
        printf("Errormessage: %s\n", $mysqli->error);
        }       
    }
   $search = "SELECT * FROM cart_tmp, customer_order_line WHERE cart_tmp.crt_ln = customer_order_line.ord_ln ";
   $result = mysqli_query($mysqli, $search);   
   $total = 0;
        while ($row = mysqli_fetch_assoc($result)){
            $total += $row["sub_total"]; 
        }
        
if (isset($_POST["adr_ln_1"]) || isset($_POST["adr_ln_2"]) || isset($_POST["pstcod"]) ){

    $search = "SELECT * FROM cart_tmp, customer_order_line WHERE cart_tmp.crt_ln = customer_order_line.ord_ln AND cart_tmp.crt_id = " . (int) $_SESSION["users"]["usr_id"] . " ";
    $result = mysqli_query($mysqli, $search);     
    $row = mysqli_fetch_assoc($result);
   
    $query2 = "INSERT INTO customer_order (ord_num, usr_id, ord_dte, sts, price_sum, adr_ln_1, adr_ln_2, pstcod)
    VALUES('".$row["ord_num"]."', ".(int)$_SESSION["users"]["usr_id"].", NOW(), 'ORDERED', $total, '".$_POST["adr_ln_1"]."', '".$_POST["adr_ln_2"]."', '".$_POST["pstcod"]."' );";     
      print "<h4>The order was added to your order history!</h4>";   
        
        if (!mysqli_query($mysqli, $query2)) {
        printf("Errormessage: %s\n", $mysqli->error);
        }           
        
        
    }

  
 $query3 = "DELETE FROM cart_tmp WHERE crt_id = ".(int)$_SESSION["users"]["usr_id"].";"; 
 mysqli_query($mysqli, $query3);

 }  
    include "user_orders.php"; 