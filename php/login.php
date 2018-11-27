<?php
$userlevel = get_user_level();
$page_title = 'BioMarket | LOGIN';
if ($userlevel == "VISITOR")
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>
<body>
  <form action="?page=login" method="post">
  <div class="login-wrap">
    <h2>Login to an existing account</h2>
        <p>Email address</p>
    <input type="text" name="e_mail" placeholder="Your email address ...">
        <p>Password</p>
    <input type="password" name="pswrd" placeholder="Your password ...">
    <p class="forgot-password"><a href="?page=resetpassword">Forgot password?</a></p>
    <button class="btn-login" type="submit">Login</button>
    <p>New user?</p>
    <a href="?page=register"><div class="btn-register">Register</div></a>
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
