<!DOCTYPE html>

<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/supplier.css">

</head>



<?php

	
	$page_title = 'BioMarket | Supplier Order';
        include "admin_panel_connection.php";	       
        include "sup_panel.php";
         
        
	$user =  '5';
     
        

	if (isset($_POST["cat_tmp"]) )
	{
	$cat_tmp = $_POST["cat_tmp"];
	}
	else
	{
	$cat_tmp = '1';	
	}
			
/*
   	
	if (isset($_POST["cat_tmp"])) 
	{
	
	}
	else
	{
	$_POST["cat_tmp"] = "1";	
	};
*/
	
		echo "
		<h1>PLEASE SELECT CATEGORY</h1>
		<table>
		<tr>
		<td><form action='?page=acp_sup_ord_main' method = 'post'>
			<input type='hidden' name='cat_tmp' value='1' >
			<input type='submit' value='BAKERY'>
			</form> 
		</td>
		<td><form action='?page=acp_sup_ord_main' method = 'post'>
			<input type='hidden' name='cat_tmp' value='2' >
			<input type='submit' value='DRINK'>
			</form> 
		</td>
		<td><form action='?page=acp_sup_ord_main' method = 'post'>
			<input type='hidden' name='cat_tmp' value='3' >
			<input type='submit' value='VEGETABLES'>
			</form> 
		</td>
		<td><form action='?page=acp_sup_ord_main' method = 'post'>
			<input type='hidden' name='cat_tmp' value='4' >
			<input type='submit' value='DAIRY'>
			</form> 
		</td>
		</tr>
		</table>";
	
	
	
	

		
    $search = "SELECT * FROM products, category WHERE products.cat_id = category.cat_id AND products.cat_id = '$cat_tmp' ORDER BY products.cat_id";
    $result = mysqli_query($mysqli, $search);        
		
	echo "<h1>PRODUCTS</h1>";
	echo "<table border = '1'>";
	echo "<tr>
	<td>Product Name</td>
	<td>Stock Qty</td>
	<td>Price</td>
	<td>Supplier ID</td>
	<td>Product Description</td>
	<td>Category</td>
	<td>Qty</td></tr>";

    while ($row = mysqli_fetch_assoc($result))
		{
		echo "<tr>
		<td>{$row['prod_name']}</td>
		<td>{$row['sto_qty']}</td>
		<td>{$row['price']}</td>
		<td>{$row['sup_id']}</td>
		<td>{$row['prod_dsc']}</td>
		<td>{$row['cat_name']}</td>
                    
		<td><form action='?page=sup_ord_tmp_add' method = 'post'>
			<input type='text' name='ord_qty' size='4'>
			<input type='hidden' name='prod_id' value={$row['prod_id']} >
			<input type='hidden' name='sup_ord_id' value= ". $user . " >
			<input type='hidden' name='cat_tmp' value= '$cat_tmp' >
			<input type='submit' value='ADD TO CART'>
			</form>
		</td>
		</tr>";
	

		};
			echo"</table>";

// display of tmp table 
	$search = "SELECT COUNT(*) as c from sup_ord_tmp";
    $result = mysqli_query($mysqli, $search);
	$row = mysqli_fetch_assoc($result);
	If ($row['c'] == 0)	
	{	}
	else 
	{   	
		$search = "SELECT * from sup_ord_tmp ORDER BY ord_ln ";
		$result = mysqli_query($mysqli, $search);
		echo "<h1>PRODUCTS IN SUPPLIER ORDER CART</h1>";
		echo "<table border = '1'>";
		echo "<tr>
		<td>Supplier Order Id</td>
		<td>Order Line</td>
		<td>Order Quantity</td>
		<td>Product Id</td>
		<td>Upadte Qty</td>
		<td>Remove</td>
		</tr>";

		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>
			<td>{$row['sup_ord_id']}</td>
			<td>{$row['ord_ln']}</td>
			<td>{$row['ord_qty']}</td>
			<td>{$row['prod_id']}</td>
			<td><form action='?page=sup_ord_tmp_upd' method = 'post'>
			<input type='text' name='ord_qty' size='4'>
			<input type='hidden' name='prod_id' value={$row['prod_id']} >
			<input type='hidden' name='sup_ord_id' value= ". $user . " >
			<input type='submit' value='UPDATE'>
			</form> 
			</td>
			<td><form action='?page=sup_ord_tmp_del' method = 'post'>
			<input type='hidden' name='prod_id' value={$row['prod_id']} >
			<input type='hidden' name='sup_ord_id' value= ". $user . " >
			<input type='submit' value='DELETE'>
			</form> 
			</td>
			</tr>";

		}
			echo"</table>";
			echo "<table>
			<tr>
			<td>
                        <form action='?page=sup_ord_create_order' method = 'post'>

			<input type='hidden' name='sup_ord_id' value= ". $user . " >
			<input type='submit' value='CREATE ORDER'>
			</form>
			</td>
			<td>
                        <form action='?page=sup_ord_cart_clear' method = 'post'>

			<input type='hidden' name='user_id' value= ". $user . " >
			<input type='submit' value='CLEAR CART'>
			</form>
			</td>
			</tr>
			</table>";
		
	
	}
		?>
</html>
