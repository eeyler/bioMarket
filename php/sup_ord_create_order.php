<?php 


	#declare variables
	$sup_ord_tmp = $_POST["sup_ord_id"];
	$sup_ord_id1 = $_POST["sup_ord_id"] . "_" . date('YmdHis');
//	$ord_date = date("Y-m-d");
	
	#insert query to supplier_ord_ln
	

	$sql0 = "SELECT  '$sup_ord_id1' as sup_ord_id , sot.ord_ln as ord_ln , sot.ord_qty as ord_qty , sot.prod_id  as prod_id, pro.price * sot.ord_qty as price FROM sup_ord_tmp sot, products pro  WHERE  sot.prod_id = pro.prod_id";
	
	#echo  "<h1>'$sql0'</h1>";
	
	$result0 = mysqli_query($mysqli, $sql0);
	while ($row0 = mysqli_fetch_assoc($result0))
	{
	$cur_sup_ord_id = $row0["sup_ord_id"];
	$cur_ord_ln = $row0["ord_ln"];
	$cur_ord_qty = $row0["ord_qty"];
	$cur_prod_id = $row0["prod_id"];
	$cur_price = $row0["price"];
	$sql1 = "INSERT INTO supplier_ord_ln (sup_ord_id, sup_ord_ln, ord_qty, prod_id ,price) VALUES ( '" . $row0["sup_ord_id"] . "','" . $row0["ord_ln"] . "','" . $row0["ord_qty"] . "','" . $row0["prod_id"] . "','" . $row0["price"] . "')";
	
	#echo  "<h1>'$sql1'</h1>";

        if (!mysqli_query($mysqli, $sql1)) {
        printf("Errormessage: %s\n", $mysqli->error);
        }
        }
	#delete supplier order cart

	$sql2 = "DELETE FROM sup_ord_tmp WHERE sup_ord_id = ". $_POST["sup_ord_id"] ."";
	mysqli_query($mysqli, $sql2);
	
	#insert to supplier ord table
	
	$ord_sts = 'SUBMITED';
	$sql3 = "SELECT '$sup_ord_id1' as sup_ord_id, '$ord_sts' as sts, NOW() as ord_date, sum(price) as price_sum FROM supplier_ord_ln WHERE sup_ord_id = '$sup_ord_id1' ";
	$result3 = mysqli_query($mysqli, $sql3);
	$row3 = mysqli_fetch_assoc($result3);
	$sql4 = "INSERT INTO supplier_ord (sup_ord_id , sts , ord_dte , price_sum) VALUES ('". $row3["sup_ord_id"] ."','". $row3["sts"] ."','". $row3["ord_date"] ."','". $row3["price_sum"] ."')";
	#echo  "<h1>$sql</h1>";

        if (!mysqli_query($mysqli, $sql4)) {
        printf("Errormessage: %s\n", $mysqli->error);
        } 
        
        include "acp_sup_ord_view.php";	
//	header("Location: ". $php_dir . "acp_sup_ord_view.php");
	
	
?>

