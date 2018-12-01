<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>

<?php
$userlevel = get_user_level();
// If Logged In 
if (is_logged_in()){

// on Admin level which is for the BioMarket Team
 if ($userlevel == "ADMIN")
{
   $login_action = "?page=user_details_update";
  
   include "admin_panel_connection.php"; 
   include "user_details_update.php";    

   
    
// on Registered level which is for the Users 
} elseif ($userlevel == "MEMBER")
  {  
    
   $login_action = "?page=user_details_update";
 
   include "user_panel_connection.php"; 
   include "user_details_update.php";  
   

  }
  
}
?>

<form action="?page=user_details" method="post">
    
  <div class="form-wrap">
    <div class="logo">
        <a href="?page=home"><img id='logo' src="img/logo_colour_toggle.png" /></a>
    </div>      
    <h1>User Details</h1>
    <hr>
	<label for="first_name"><b>First Name</b></label>
    <input type="text" name="f_name" value="<?php echo $row["f_name"]?>">
	<label for="last_name"><b>Last Name</b></label>
    <input type="text" name="l_name" value="<?php echo $row["l_name"]?>">
    	<label for="dob"><b>Date of Birth</b> <?php echo $row["dob"]?>
    <input type="date" name="dob" /></label>
    	<label for="street"><b>Address Line 1</b></label>
    <input type="text"  name="adr_ln_1" value="<?php echo $row["adr_ln_1"]?>">
    	<label for="city"><b>Address Line 2</b></label>
    <input type="text" name="adr_ln_2" value="<?php echo $row["adr_ln_2"]?>">
	<label for="postcode"><b>Postcode</b></label>
    <input type="text"  name="pstcod" value="<?php echo $row["pstcod"]?>">
    	<label for="phone"><b>Phone Number</b></label>
    <input type="text" name="phn_num" value="<?php echo $row["phn_num"]?>">
    <label for="email"><b>Email</b></label>
    <input type="text" name="e_mail" value="<?php echo $row["e_mail"]?>">
        <label for="password"><b>Old Password</b></label>
    <input type="password" placeholder="Enter Password" name="old_pass">
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pswrd">
    <label for="psw_repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw_repeat">
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="btn-register">UPDATE PROFILE</button>
  
  </div>
</form>


</body>
</html> 
 

