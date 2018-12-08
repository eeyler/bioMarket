<!DOCTYPE html>

<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" type="text/css" href="css/supplier.css">
</head>



<?php
	
	$page_title = 'BioMarket | Supplier Order';

	$user = '5';
        
        
include "admin_panel_connection.php";	
	echo	"<table>
			<tr>
			<td>
                        <form action='?page=acp_sup_ord_main' method = 'post'>

			<input type='submit' value='GO TO SUPPLIER ORDER CREATION'>
			</form>
			</td>
			<td>
                        <form action='?page=acp_sup_ord_arch' method = 'post'>

			<input type='submit' value='GO TO ARCHIVE'>
			</form>
			</td>
			</tr>
			</table>";


	echo "<h1>SUBMITED ORDERS</h1>";

		
	
		$search = "SELECT * FROM supplier_ord WHERE sts = 'SUBMITED' ORDER BY supplier_ord.sup_ord_id";
		$result = mysqli_query($mysqli, $search);        
		
		echo "<h2>ORDER HEADER</h2>";
		echo "<table>";
		echo "<tr>
		<td>Supplier Order Id</td>
		<td>Status</td>
		<td>Date Created</td>
		<td>Total Value</td>
		<td>Details</td>
		<td>Complete</td>
		</tr>";

		while ($row = mysqli_fetch_assoc($result))
		{
		echo "<tr>
		<td>{$row['sup_ord_id']}</td>
		<td>{$row['sts']}</td>
		<td>{$row['ord_dte']}</td>
		<td>{$row['price_sum']}</td>
                <td><form action='?page=acp_sup_ord_view' method = 'post'>    

			<input type = 'hidden'  name ='sup_ord_id1' value = {$row['sup_ord_id']}>
			<input type='submit' value='Details'>
			</form></td>
                <td><form action='?page=sup_ord_complete_order' method = 'post'>        

			<input type = 'hidden' name = 'sup_ord_id2' value = {$row['sup_ord_id']}>
			<input type = 'hidden' name = 'sts' value = {$row['sts']}>
			<input type='submit' value='COMPLETE'>
			</form></td>
		</tr>";
	

		}
			echo"</table>";

	
	
	if (isset($_POST["sup_ord_id1"]))
		{
			
			
		
// display of tmp table 
			$cri = $_POST["sup_ord_id1"];
			$search1 = "SELECT * FROM supplier_ord_ln WHERE sup_ord_id = '$cri' ORDER BY sup_ord_ln";
			#echo "<h1>'$search1'</h1>";
			
			$result1 = mysqli_query($mysqli, $search1);
			echo "<h2>ORDER LINES</h2>";
			echo "<p> DETAILS FOR ORDER: ".$_POST["sup_ord_id1"]."</p>";
			echo "<table>";
			echo "<tr>
			<td>Supplier Order Line</td>
			<td>Supplier Order Number</td>
			<td>Order Quantity</td>
			<td>Product Id</td>
			<td>Price</td>
			</tr>";

			while ($row = mysqli_fetch_assoc($result1))
			{
			echo "<tr>
			<td>{$row['sup_ord_ln']}</td>
			<td>{$row['sup_ord_id']}</td>
			<td>{$row['ord_qty']}</td>
			<td>{$row['prod_id']}</td>
			<td>{$row['price']}</td>
			</tr>";

			}
			echo"</table>";

		
	
		};
		
			
			
		
	
	
		?>
