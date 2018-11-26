<?php
$userlevel = get_user_level();
$page_title = 'BioMarket | CONTACT';
if ($userlevel == "admin")
{
    include "acp_add_new_product.php";
    
}
if ($userlevel == "member")
{
    include "user_panel_connection.php";
    
}