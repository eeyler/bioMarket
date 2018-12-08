<!DOCTYPE html>
<html lang="en">
    <?php
    $userlevel = get_user_level();
    $page_title = 'BioMarket | Product Card';
    ?>    
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet prefetch" href="css/__codepen_io_andytran_pen.css"> 
        <link rel="stylesheet" href="css/stylelogin.css">        
        <link rel="stylesheet" href="css/product_card_style.css">

    </head>
    <body>
        <section class="category-section">
            <div class="container">
                <div class="row">
                    <?php
                    $search = "SELECT * FROM products WHERE cat_id = '3' ORDER BY prod_id ASC";

                    $result = mysqli_query($mysqli, $search);

                    while ($row = mysqli_fetch_assoc($result)) {
                        if (!$row["sto_qty"] <= 0) {

                            if ($userlevel == "MEMBER") {
                                ?>   

                                <!-- === category === -->

                                <!-- .section-title -->

                                <div class="col-lg-3 col-sm-6 col-xs-12" ><a href="#"></a>

                                    <!-- Post-->
                                    <div class="post-module">
                                        <!-- Thumbnail-->
                                        <div class="thumbnail">
                                            <div class="price">
                                                <div class="deal">&pound<?php echo $row["price"] ?></div>
                                            </div><img alt="product example" src="<?php echo $row["prod_img"] ?>">
                                        </div>

                                        <!-- Post Content-->
                                        <div class="post-content">
                                            <div class="category">
                                                <?php
                                                print '<div class="toCard"><a href="?page=product_page&prod_id=' . $row["prod_id"] . '&action=add_to_basket">Add to Basket</a>
                    </div> ';
                                                ?>      
                                            </div>
                                            <h1 class="title"><?php echo $row["prod_name"] ?></h1>
                                            <h2 class="sub_title">Fresh and tasty</h2>
                                            <p class="description"><?php echo $row["prod_dsc"] ?>
                                            <div class="post-meta">

                                                <span class="showStock"><i class="fa fa-check-circle"></i>
                                                    <a>Qty: <?php echo $row["sto_qty"] ?></a></span><a href="#" title="Love it" class="btn btn-counter" data-count="0"><span>&#x2764;</span></a></div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            } else {
                                ?>           

                                <div class="col-lg-3 col-sm-6 col-xs-12" ><a href="#"></a>

                                    <!-- Post-->
                                    <div class="post-module">
                                        <!-- Thumbnail-->
                                        <div class="thumbnail">
                                            <div class="price">
                                                <div class="deal">&pound<?php echo $row["price"] ?></div>
                                            </div><img alt="product example" src="<?php echo $row["prod_img"] ?>">
                                        </div>
                                        <!-- Post Content-->
                                        <div class="post-content">

                                            <h1 class="title"><?php echo $row["prod_name"] ?></h1>
                                            <h2 class="sub_title">Fresh and tasty</h2>
                                            <p class="description"><?php echo $row["prod_dsc"] ?>
                                            <div class="post-meta">

                                                <span class="showStock"><i class="fa fa-check-circle"></i>
                                                    <a>Qty: <?php echo $row["sto_qty"] ?></a></span><a href="#" title="Love it" class="btn btn-counter" data-count="0"><span>&#x2764;</span></a></div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                    }
                    ?>
                </div>  
            </div>
        </section>   
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="scripts/likes.js"></script>
        <script src="scripts/product-card.js"></script>
    </body>

</html>
