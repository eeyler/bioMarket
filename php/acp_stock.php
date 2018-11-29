<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/stylelogin.css">


<style>
* {
    box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column {
   float: left;
   width: 5%;
   padding: 10px;
   height: 50px;
   vertical-align: middle;
   text-align: left;
}
.two { width: 45%; }

.three { width: 25%; }       
.unit{
    width: 10%;
    text-align: right;
}
.btn-add, .btn-details {
    text-align: center;
    padding : 5px;
    width: 200px;
    height: 30px;
    background-color: grey;
    color: #fff;
    border-radius:3px;
    border:0;
    font-size: 16px;

}

.btn-add:hover, .btn-details:hover  {
    background-color: gray;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
    -webkit-transition: all .2s ease;
    -moz-transition: all .2s ease;
    -o-transition: all .2s ease;
    transition: all .2s ease;
}

.category-img img{
    width: 39px;
    height: 41px;
}
/* Clear floats after the columns */
.row-stock:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - makes the four columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column {
        width: 100%;
    }
}
</style>
</head>
<?php  include "admin_panel_connection.php"; ?>
<body>
    <div class="btn-add"><a href="?page=acp_add_new_product">Add New Product</a></div>
    <hr>
<?php
       $page_title = 'BioMarket | Stock';
       $search = "SELECT * FROM products, category WHERE products.cat_id = category.cat_id ORDER BY products.cat_id";
       $result = mysqli_query($mysqli, $search);

        while ($row = mysqli_fetch_assoc($result))
        { 
          //include_once "admin_panel_connection.php";   
                 
?>                  
 
<div class="row-stock">
  <div class="column" style="background-color:#aaa;">
      <?php print '<div class="category-img"><img alt="product example" src=" ' .$row["cat_img"]. ' "></div>'; ?>
   
  </div>
  <div class="column two" style="background-color:#bbb;">
    <p><?php echo $row["prod_name"]?></p>
   
  </div>
  <div class="column" style="background-color:#ccc;">
    <p>Qty: </p>
 
  </div>
  <div class="column" style="background-color:#ddd;">
    
    <p><?php echo $row["sto_qty"]?></p>
  </div>  
  <div class="column unit" style="background-color:#bbb;">
   
    <p>Price per unit: </p>
  </div>
  <div class="column" style="background-color:#ccc;">
    
    <p>£<?php echo $row["price"]?></p>
  </div>
  <div class="column three" style="background-color:#ddd;">
<?php   
    print '<div class="btn-details">
         
    <a href="?page=acp_stock_details&prod_id=' . $row["prod_id"] . '&action=see_details">See Details</a></div> ';  
      
?>      
      
  </div>  

</div>

</body>

<?php


        }
