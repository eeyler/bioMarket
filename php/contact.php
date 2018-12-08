<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <style>
            input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            input[type=submit] {
                background-color: Black;
                color: white;
                padding: 12px 50px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #484848;
            }

            .container-contact {
                position: relative;
                margin: 10px auto;
                max-width: 1500px;
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <?php
        $userlevel = get_user_level();
        $page_title = 'BioMarket | Contact';
        if ($userlevel == "ADMIN") {
            include "admin_panel_connection.php";
        }
        if ($userlevel == "MEMBER") {
            include "user_panel_connection.php";
        }
        ?>


        <div class="container-contact">
            <h2>Contact Us:</h2>
            <form action="#?page=contact" method="post" enctype="multipart/form-data">  
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                <label for="email"> Email address</label>
                <input type="text" id="email" name="email" placeholder="Your emial address..">

                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                <input type="submit" value="Submit">
            </form>
            <h2>Where are we?</h2><br>
            <iframe width=100% height="400" src="https://maps.google.com/maps?q=St%20Mary's%20Rd%2C%20London%20W5%205RF&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe></a>
        <p>or call us on:</p> <br>
        <p>020 999 99 99</p>
    </div>
</body>
</html>
