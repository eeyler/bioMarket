<?php
$userlevel = get_user_level();
$page_title = 'BioMarket | Login';
if ($userlevel == "VISITOR")
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
  
</head>
<body>
  <form action="?page=login" method="post">    
  <div class="form-wrap">
    <div class="logo">
        <a href="#"><img id='logo' src="img/logo_colour_toggle.png" /></a>
    </div>   
    <h2>Login to an existing account</h2>
        <p>Email address</p>
    <input type="text" name="e_mail" placeholder="Your email address ...">
        <p>Password</p>
    <input type="password" name="pswrd" placeholder="Your password ...">
    <p class="forgot-password"><a href="?page=resetpassword">Forgot password?</a></p>
    <button class="btn-login" type="submit">LOGIN</button>
    <p>New user?</p>
    <a href="?page=register"><div class="btn-register">REGISTER</div></a>
  </div>
 </form>  
</body>
</html>
<?php
}
if (!is_logged_in()){
    $login_action = "?page=login";
}
if (is_logged_in()){ 
$userlevel = get_user_level();

if ($userlevel == "ADMIN"){
    
    include "admin_panel_connection.php";
    $login_action = "?page=home";
    }

if ($userlevel == "MEMBER"){
    include "user_panel_connection.php";
    $login_action = "?page=home"; 
    }
}
