<?php
$userlevel = get_user_level();
$page_title = 'BioMarket | LOGIN';

if ($userlevel == "visitor")
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

    <button class="btn-login" type="submit">LOGIN</button>

    <p>New user?</p>

    <button class="btn-register">Register</button>
  </div>
 </form>

    
</body>
</html>
<?php
}

if (!is_logged_in()){
    
      $login_action = "?page=login";
      
}
$userlevel = get_user_level();


if ($userlevel == "admin"){
    if (is_logged_in()){

 

    include "admin_panel_connection.php";

    }
}

if ($userlevel == "member"){
    if (is_logged_in()){    

      
    include "user_panel_connection.php";

    }

}
?>