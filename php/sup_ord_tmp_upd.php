<?php 
	
	if ((isset($_POST["ord_qty"])) || (isset($_POST["prod_id"])) || (isset($_POST["sup_ord_id"]))) {
		$search = "UPDATE `sup_ord_tmp` 
		SET `ord_qty`= ". $_POST["ord_qty"] . " WHERE prod_id = ". $_POST["prod_id"] ."";
		mysqli_query($mysqli, $search);
	};
        include "acp_sup_ord_main.php";	      
//	header("Location: ". $php_dir . "acp_sup_ord_main.php");

?>