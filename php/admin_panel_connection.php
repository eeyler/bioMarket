<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/panel_connection.css">
</head>
<body>

<div class="tab">
  <!--navigation menu for orders and details acp_stock.html-->
  <button class="tablinks" onclick="openCity(event, 'stock')">Stock</button> <!--Reachable from here: acp_add_new_product.html-->
  <!--acp_customers_orders.html-->
  <button class="tablinks" onclick="openCity(event, 'customerOrders')">Customer Orders</button>
  <!--acp_suppliers_orders.html-->
  <button class="tablinks" onclick="openCity(event, 'supplierOrders')">Supplier Orders</button> <!--Reachable from here: acp_new_supplier.html-->
  <!--acp_customers.html--> 
  <button class="tablinks" onclick="openCity(event, 'customers')">Customers</button>
</div>
 
<div id="stock" class="tabcontent">
  <h3>Stock</h3>
  
<!--  <?php include_once 'acp_stock.html'; ?> -->
</div>
<div id="customerOrders" class="tabcontent">
  <h3>Customer Orders</h3>
  <?php include_once 'acp_customers_orders.php'; ?>
</div>
<div id="supplierOrders" class="tabcontent">
  <h3>Supplier Orders</h3>
  <?php include_once 'html/acp_suppliers_orders.html'; ?>
</div>
<div id="customers" class="tabcontent">
  <h3>Customers</h3>
 <!--   <?php include_once 'html/acp_customers.html'; ?> -->
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
     
</body>
</html> 
