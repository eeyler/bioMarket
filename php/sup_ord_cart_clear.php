<?php 

	if ((isset($_POST["user_id"]))) {
		$search = "DELETE FROM `sup_ord_tmp`";
		mysqli_query($mysqli, $search);
	};
	include "acp_sup_ord_main.php";	
//	header("Location: ". $php_dir . "acp_sup_ord_main.php");

?>