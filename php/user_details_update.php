<?php

$search = "SELECT * FROM users WHERE usr_id = " .  $_SESSION["users"]["usr_id"] . ";";
$result = mysqli_query($mysqli, $search);
$row = mysqli_fetch_assoc($result);

// Update the Profile Settings
if (isset($_POST["e_mail"])) {
   
    if ($row["usr_id"]) {

        $search = "UPDATE users SET e_mail = '" . $_POST["e_mail"] . "', f_name = '" . $_POST["f_name"] . "',  l_name = '" . $_POST["l_name"] . "', adr_ln_1 = '" . $_POST["adr_ln_1"] . "',  adr_ln_2 = '" . $_POST["adr_ln_2"] . "', pstcod = '" . $_POST["pstcod"] . "', phn_num = '" . $_POST["phn_num"] . "' WHERE usr_id = '" . (int) $_SESSION["users"]["usr_id"] . "'";
        mysqli_query($mysqli, $search);

        $search = "SELECT * FROM users WHERE usr_id = " . (int) $_SESSION["users"]["usr_id"] . " ";
        $result = mysqli_query($mysqli, $search);
        $row = mysqli_fetch_assoc($result);
        
    } 
   
    

        
}
 if (isset($_POST["dob"])) {
     if ((!$_POST["dob"] == "")) {    
        $search = "UPDATE users SET dob = '" . $_POST["dob"] . "' WHERE usr_id = " . (int) $_SESSION["users"]["usr_id"] . "";
        mysqli_query($mysqli, $search);
        $search = "SELECT * FROM users WHERE usr_id = " . (int) $_SESSION["users"]["usr_id"] . ";";
        $result = mysqli_query($mysqli, $search);
        $row = mysqli_fetch_assoc($result);
    }
 }

// Update Profile Settings and Password if the New Password & New Password Again Field is not empty
if (isset($_POST["pswrd"])) {
    if ((!$_POST["pswrd"] == "") || (!$_POST["psw_repeat"] == "") ){  
    print "Password Change<br/>";
    if (password_verify($_POST["old_pass"], $_SESSION["users"]["pswrd"] )){
        if ($_POST["pswrd"] == $_POST["psw_repeat"]) {
        $hashed = password_hash($_POST["pswrd"], PASSWORD_BCRYPT);
            $search = "UPDATE users SET pswrd = '" . $hashed . "' WHERE usr_id = " . (int) $_SESSION["users"]["usr_id"] . "";
            mysqli_query($mysqli, $search);
            print "Successful password change!";
        } else {
            print "The Password are not the same!";
        }
    } else {
        print "The old password is wrong!";
        
    }
    }
}



