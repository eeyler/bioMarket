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
            <form method="post" name="contact_form" action="" enctype="multipart/form-data"> 
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

<script language="JavaScript">
var frmvalidator  = new Validator("contactform");
frmvalidator.addValidation("name","req","Please provide your name");
frmvalidator.addValidation("email","req","Please provide your email");
frmvalidator.addValidation("email","email",
  "Please enter a valid email address");
</script>

    <?php
    $errors = '';
    $myemail = 'contact@biomarket.store'; //<-----Put Your email address here.
    if (empty($_POST['firstname']) ||
            empty($_POST['email']) ||
            empty($_POST['subject'])) {
        $errors .= "\n Error: all fields are required";
    }
    $name = $_POST['firstname'];
    $email_address = $_POST['email'];
    $message = $_POST['subject'];
    if (!preg_match(
                    "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address)) {
        $errors .= "\n Error: Invalid email address";
    }
    if (empty($errors)) {
        $to = $myemail;
        $email_subject = "Contact form submission: $name";
        $email_body = "You have received a new message. " .
                " Here are the details:\n Name: $name \n " .
                "Email: $email_address\n Message \n $message";
        $headers = "From: $myemail\n";
        $headers .= "Reply-To: $email_address";
        mail($to, $email_subject, $email_body, $headers);
//redirect to the 'thank you' page
        header('Location: index.php');
    }
    ?>

</body>
</html>