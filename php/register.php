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
$page_title = 'BioMarket | Register';
if ($userlevel == "MEMBER")
{
    print "<br><h4>You are already registered!</h4>";
}
else {
    include "register_me.php";
}

// To check if the user is Logged IN
if (!is_logged_in()) 
{
    if ((isset($_POST["e_mail"])) && (isset($_POST["pswrd"])))
        {
                if ($_POST["pswrd"] != $_POST["psw_repeat"])
		{
                print "<br><h4>The passwords are not identical!</h4>"; 
                }
                else{
                    print "<br><h4>Congratulations on Joining the Bio Market!</h4>"; 
         
                    include "banner.php";
                    include "categories.php";
                   
                }
        }
    else {
       
       
    ?>
    
<form action="?page=register" method="post">
  <div class="form-wrap">
    <div class="logo">
        <a href="?page=home"><img id='logo' src="img/logo_colour_toggle.png" /></a>
    </div>      
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
	<label for="first_name"><b>First Name</b></label>
    <input type="text" placeholder="Enter first name" name="f_name" required>
	<label for="last_name"><b>Last Name</b></label>
    <input type="text" placeholder="Enter last name" name="l_name" required>
    	<label for="dob"><b>Date of Birth</b></label>
    <input type="date" placeholder="Enter Date of Birth" name="dob" required>
    	<label for="street"><b>Address Line 1</b></label>
    <input type="text" placeholder="Enter House Number and Street" name="adr_ln_1" required>
    	<label for="city"><b>Address Line 2</b></label>
    <input type="text" placeholder="Enter city" name="adr_ln_2" required>
	<label for="postcode"><b>Postcode</b></label>
    <input type="text" placeholder="Enter Postcode" name="pstcod" required>
    	<label for="phone"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="phn_num" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="e_mail" required>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pswrd" required>
    <label for="psw_repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw_repeat" required>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="btn-register">REGISTER</button>
    
    <hr>
    
    <p>Already have an account?</p>
    <a href="?page=login"><div class="btn-login">LOGIN</div></a>

  </div>
</form>
</body>
</html>
<?php
    }

 
 
}   












