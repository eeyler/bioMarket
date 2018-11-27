<head>
  <link rel="stylesheet" type="text/css" href="css/products.css">
</head>
<body>
  <!-- === category === -->
  <section id="category" class="category-section">
    <div class="container-main">
      <!-- .section-title -->
 <?php
    $search = "SELECT * FROM products WHERE cat_id = 'BAKERY' ORDER BY prod_id ASC";
        
    $result = mysqli_query($mysqli, $search);    
    
    while ($row = mysqli_fetch_assoc($result))
    {
      if (!$row["sto_qty"] <= 0) {
?> 
        <div class="col-sm-3" >
          <div class="product-box category-products">
              <a href="?page=products_bakery"> 
              <img alt="product examples" src="<?php echo $row["prod_img"]?>">
              <h5><?php echo $row["prod_name"]?></h5>
              <p class="price">£<?php echo $row["price"]?> / each</p>
           </a>
                <a target="_blank" href="">
                <p><button>Add to Cart</button></p>
                </a>
          </div>
        </div>
       <!-- .col-sm-4 col-sm-12 -->
        
<?php        
        }
   
       
   } 
    
?>
                   

    </div>
    <!-- .container -->

  </section>
  <!-- === End Of category === -->


</body>
    
 
