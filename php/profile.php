<?php
$userlevel = get_user_level();
$page_title = 'BioMarket | PROFILE';
if ($userlevel == "ADMIN")
{
    
    include "admin_panel_connection.php";
    
}
if ($userlevel == "MEMBER")
{
    include "user_panel_connection.php";
    
}