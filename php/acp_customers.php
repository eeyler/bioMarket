<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
    <link rel="stylesheet" href="css/stock_07.12.2018.css">
</head>

<body>

<?php
    $page_title = 'BioMarket | Customers';
    include "admin_panel_connection.php";
    
?>    
 <div class="orders_container">
      <h2>Customer Report:</h2>
<div class="row-stock customer-column2">
  
  

  <div class="column two-stock2" >
    <p>E-mail</p>
  </div>
  <div class="column unit2">
    <p>Member since</p>
  </div>
    <div class="column unit2">
    <p>Post Code</p>
  </div>
    <div class="column unit2">
    <p>Orders Value</p>
  </div>
    <div class="column unit2">
    <p>Date Of Birth</p>
  </div>
  <div class="column unit3">
    <p>Days Until Birthday</p>
  </div>




</div>
<?php	
	$search0 = "SELECT usr_id, dob FROM users  WHERE lvl = 'MEMBER'";
	$result0 = mysqli_query($mysqli, $search0);
while ($row0 = mysqli_fetch_assoc($result0))
		{
				$cur_usr_id= $row0['usr_id'];
				$cur_dob = $row0['dob'];
				$cur_year = date("Y");
				$birth_month = date("m",strtotime($cur_dob));
				$birth_day = date("d",strtotime($cur_dob));
				$leapyear = checkdate($birth_month ,$birth_day,$cur_year);
				if($leapyear == True)
				{
				$cur_birthday = $cur_year . "-" . $birth_month . "-" . $birth_day;	
				}
				else
				{
				$birth_day =$birth_day - 1;	
				$cur_birthday = $cur_year . "-" . $birth_month . "-" . $birth_day;
				}
				$days = strtotime($cur_birthday) - strtotime(date("Y-m-d"));
				$days_to_bd = round($days / (60 * 60 * 24));
				if ($days_to_bd >= 0)
				{
				$days_to_bd = $days_to_bd;	
				}
				else
				{
				$days_to_bd = $days_to_bd + 365;	
				};
				$search3 ="INSERT INTO tmp_dob (usr_id, days) VALUES('". $cur_usr_id ."','" . $days_to_bd . "')";
				mysqli_query($mysqli, $search3);
		}	


 ?>
	  
<?php      
$search1 = "SELECT  u.f_name AS f_name, u.e_mail as e_mail, u.l_name AS l_name, u.acc_crt_dte AS acc_crt_dte, u.pstcod AS pstcod, u.usr_id AS usr_id, CASE WHEN SUM(col.sub_total) > 0 THEN SUM(col.sub_total) ELSE 0 END as sub_total, u.dob AS dob , td.days as days FROM users u  LEFT JOIN tmp_dob td ON u.usr_id = td.usr_id LEFT JOIN customer_order co ON u.usr_id = co.usr_id LEFT JOIN customer_order_line col ON co.ord_num = col.ord_num  WHERE u.lvl = 'MEMBER' GROUP BY u.usr_id ORDER BY td.days ASC, sub_total DESC";
$result1 = mysqli_query($mysqli, $search1);
while ($row1 = mysqli_fetch_assoc($result1)) 
{
$cur_user = $row1['f_name']. " " . $row1['l_name'];
$cur_acc_crt_dte = $row1['acc_crt_dte'];
$cur_sub_total = $row1['sub_total'];    
$cur_pstcod = $row1['pstcod'];
$cur_dob = $row1['dob'];
$cur_days =  $row1['days'];
$cur_emial = $row1['e_mail'];  
?>  
<div class="row-stock customer-column">

  
   <div class="column two-stock2">
    <p><?php echo $cur_emial ?></p>
   
  </div>

  <div class="column unit2">
   
    <p><?php $joindate = strtotime($cur_acc_crt_dte);
                      echo date("d/m/Y", $joindate) ;?></p>
  </div>
  <div class="column unit2">
    
    <p><?php echo $cur_pstcod; ?></p>
	
  </div>
  <div class="column unit2">
   
    <p>&pound <?php echo $cur_sub_total; ?></p>
  </div>

  <div class="column unit2">
     
    <p><?php echo $cur_dob; ?></p>
  </div>
  <div class="column unit3">
     
    <p><?php echo $cur_days;	?> days</p>
  </div>    

 

</div>
<?php
 
  }

	$sql1 = "DELETE FROM tmp_dob";
	mysqli_query($mysqli, $sql1);
  
?>
</div>      
</body>





