<?php

$userlevel = get_user_level();

if ($userlevel == "VISITOR")
{
    // login form
    if (!is_logged_in()) {
       
        $login_action = "?page=home";
        include "banner.php";
        include "categories.php";
    }
}
else
{
        include "banner.php";
        include "categories.php";
}

