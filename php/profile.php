<?php
$userlevel = get_user_level();
$page_title = 'BioMarket | PROFILE';
if ($userlevel == "admin")
{
    include "admin_panel_connection.php";
    
}
if ($userlevel == "member")
{
    include "user_panel_connection.php";
    
}