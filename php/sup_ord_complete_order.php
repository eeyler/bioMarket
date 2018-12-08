<?php

	if ((isset($_POST["sup_ord_id2"])) || (isset($_POST["sts"])))
	{
	$ord_sts = $_POST["sts"];
	if ($ord_sts == 'SUBMITED')
		{	
	
		$ord_num = $_POST["sup_ord_id2"];
		$sql = "SELECT sol.prod_id as prod_id, sol.ord_qty ord_qty FROM supplier_ord_ln sol, products pro WHERE sup_ord_id = '$ord_num' AND sol.prod_id = pro.prod_id ";
		$result = mysqli_query($mysqli, $sql);
			while ($row = mysqli_fetch_assoc($result))
			{
				$cur_prod = $row['prod_id'];
				$cur_qty = $row['ord_qty'];
				$sql2 = "UPDATE products pro SET pro.sto_qty = pro.sto_qty + '$cur_qty' WHERE pro.prod_id = '$cur_prod'";
				mysqli_query($mysqli, $sql2);
			};
			$sql3 = "UPDATE supplier_ord so SET so.sts = 'CLOSED' WHERE so.sup_ord_id = '$ord_num' ";
			mysqli_query($mysqli, $sql3);
		};	
	};
	include "acp_sup_ord_view.php";	
//	header("Location: ". $php_dir . "acp_sup_ord_view.php");
?>