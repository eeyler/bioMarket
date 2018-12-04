<?php

if ((isset($_POST["e_mail"])) && (isset($_POST["pswrd"])))
{
$hashed = password_hash($_POST["pswrd"], PASSWORD_BCRYPT);
$search = "SELECT * FROM users WHERE e_mail = '".$_POST["e_mail"]."'; ";
$result = mysqli_query($mysqli, $search);
if (mysqli_num_rows($result) == 1)
{ 
$users = mysqli_fetch_assoc($result);

$search = "UPDATE users SET
    e_mail = '".$_POST["e_mail"]."',
    pswrd = '".$hashed."',
    acc_crt_dte = NOW(),
    lvl = 'MEMBER',
    WHERE usr_id = ".$users["usr_id"];

mysqli_query($mysqli, $search);
       
       $userlevel = get_user_level();
       
       if (($userlevel == "ADMIN") || ($userlevel == "MEMBER"))
       {
     
       include "profile.php";
       }
      
} 
else {
    


if (isset($_POST["f_name"]))
{
	if (($_POST["f_name"] == "") || ($_POST["l_name"] == "") || ($_POST["e_mail"] == "") || ($_POST["pswrd"] == "") || ($_POST["psw_repeat"] == "") || ($_POST["dob"] == "") 
        ||  ($_POST["adr_ln_1"] == "") ||  ($_POST["adr_ln_2"] == "") ||  ($_POST["pstcod"] == "") ||  ($_POST["phn_num"] == ""))
	{

             print "<h4>Empty Fields!</h4>";
          
	}
	else
	{
		if ($_POST["pswrd"] == $_POST["psw_repeat"])
		{
                     
$search = "INSERT INTO users (f_name, l_name, e_mail, pswrd, dob, acc_crt_dte, lvl, adr_ln_1, adr_ln_2, pstcod, phn_num)
VALUES
('".$_POST["f_name"]."','".$_POST["l_name"]."','".$_POST["e_mail"]."','".$hashed."','".$_POST["dob"]."', NOW(),'member', '".$_POST["adr_ln_1"]."','".$_POST["adr_ln_2"]."','".$_POST["pstcod"]."','".$_POST["phn_num"]."');";



                    
                print "<h4>Successful Registration!</h4>";
  if (!mysqli_query($mysqli, $search))
  {
    die('Error: ' . mysql_error());
  }

		}
		else
		{
                    print "<h4>The Passwords are not identical!</h4>";
                   
                }    	
                
        }
}


  }
}

