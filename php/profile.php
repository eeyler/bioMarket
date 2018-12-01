<?php
$userlevel = get_user_level();
$page_title = 'BioMarket | Profile';
if ($userlevel == "ADMIN")
{
   $login_action = "?page=profile";

   include "acp_stock.php";
    
}
if ($userlevel == "MEMBER")
{  
   $login_action = "?page=profile";

   include "user_details.php";
    
}