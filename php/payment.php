<!DOCTYPE html>
<html lang="en">
    <?php
    $userlevel = get_user_level();
    $page_title = 'BioMarket | Payment';
    if (isset($_POST["crt_ln"]) )
    { 

        
   
    ?> 
<head>
  <meta charset="UTF-8">
<title>payment</title>
<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>


<body>

  <div class="form-wrap">
   <form action="?page=payment_confirmation" method="post" enctype="multipart/form-data">     
    <h2>Insert your PayPal login details</h2>
        <p>Email address</p>
    <input type="text" name="email" placeholder="Your email address ...">
        <p>Password</p>
    <input type="password" name="password" placeholder="Your password ...">
    <input name="crt_ln" type="hidden" value="<?php echo $_POST["crt_ln"] ?>" > 
    <input name="adr_ln_1" type="hidden" value="<?php echo $_POST["adr_ln_1"] ?>">  
    <input name="adr_ln_2" type="hidden" value="<?php echo $_POST["adr_ln_2"] ?>" >    
    <input name="pstcod" type="hidden" value="<?php echo $_POST["pstcod"] ?>" >    
    
    <button type="submit" name="submit">     
        <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-medium.png" alt="Buy now with PayPal" />
    </button>
   </form>  
  </div>
<?php
 }
?>
</body>
</html>
