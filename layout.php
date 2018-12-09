<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Organic Food">
        <meta name="keywords" content="organic, food, bio">
        <meta name="author" content="UWL Team">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- =======================-->

        <title><?php
            if (isset($page_title)) {
                echo $page_title;
            } else {
                echo 'BioMarket Organic Food';
            }
            ?>    
        </title>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <!-- End -->

        <link rel="stylesheet" href="css/reset.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">       
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel='stylesheet prefetch' href='css/__codepen_io_andytran_pen.css'>
        <link rel="stylesheet" href="css/product_card_style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">



    </head>
    <body class="<?php echo $page ?>">
        <header>
            <?php
            // The Menu option changes if user is logged IN
            if (!is_logged_in()) {
                include "php/header.php"; // change header.php menu points
            }
            if (is_logged_in()) {
                include "php/loggedInHeader.php";
            }
            ?>
        </header>

        <div class="content">
            <?php echo $content ?>
        </div>

        <footer class="footer">
            <?php include "html/footer.html"; ?>
        </footer>

    </body>

</html>