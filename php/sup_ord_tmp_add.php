<?php 

	if ((isset($_POST["ord_qty"])) || (isset($_POST["prod_id"])) || (isset($_POST["sup_ord_id"])) || (isset($_POST["cat_tmp"])) ) 
	{
	
		$search = "SELECT COUNT(*) as c FROM sup_ord_tmp WHERE prod_id = " . $_POST["prod_id"] . "";
		$result = mysqli_query($mysqli, $search);
		$row = mysqli_fetch_assoc($result);
		if ($row['c'] == 0) 
		{
	$search = "INSERT INTO `sup_ord_tmp`(`sup_ord_id`,`ord_qty`,`prod_id`) VALUES ('". $_POST["sup_ord_id"] ."','". $_POST["ord_qty"] ."','". $_POST["prod_id"] ."')";
	mysqli_query($mysqli, $search);
		}
		
		Else
		
		{
	$search = "UPDATE `sup_ord_tmp` SET `ord_qty`= `ord_qty` + ". $_POST["ord_qty"] ." WHERE prod_id = ". $_POST["prod_id"] ."";
	mysqli_query($mysqli, $search);
		}
		
	}
	$cat_tmp = $_POST["cat_tmp"];	
        
        include "acp_sup_ord_main.php";	
//	header("Location: ". $php_dir . "acp_sup_ord_main.php");

?>