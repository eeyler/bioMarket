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
.btn-add {
     text-align: center;
    padding : 5px;
    width: 200px;
    height: 30px;
    background-color: #3498db;
    color: #fff;
    border-radius:3px;
    border:0;
    font-size: 18px;

}

.btn-login:hover{
    background-color: rgb(52, 152, 219, 0.8);
    border-radius: 10px;
    font-size: 20px;
    font-weight: bold;
    -webkit-transition: all .2s ease;
    -moz-transition: all .2s ease;
    -o-transition: all .2s ease;
    transition: all .2s ease;
    
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
    
<div class="row-stock">
  <div class="column" style="background-color:#aaa;">
    <img class='menu-logo' src="img/bread.svg" />
   
  </div>
  <div class="column two" style="background-color:#bbb;">
    <p>Name of the Product</p>
   
  </div>
  <div class="column" style="background-color:#ccc;">
    <p>Qty:</p>
 
  </div>
  <div class="column" style="background-color:#ddd;">
    
    <p>130</p>
  </div>  
  <div class="column unit" style="background-color:#bbb;">
   
    <p>Price per unit: £</p>
  </div>
  <div class="column" style="background-color:#ccc;">
    
    <p>4.99</p>
  </div>
  <div class="column three" style="background-color:#ddd;">
   
   <a target="_blank" href="#">See Details</a>
  </div>  

</div>

</body>
</html>