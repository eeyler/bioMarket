<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/admin_panel.css">

</head>
<body>

<div class="admin_panel" id="myPanelnav">
  <a href="?page=acp_stock" class="active">Stock</a>
  <a href="?page=acp_customers_orders">Customer Orders</a>
  <a href="#?page=acp_suppliers_orders">Supplier Orders</a>
  <a href="#?page=acp_customers">Customers</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<script>
function myFunction() {
    var x = document.getElementById("myPanelnav");
    if (x.className === "admin_panel") {
        x.className += " responsive";
    } else {
        x.className = "admin_panel";
    }
}
</script>

</body>
</html>
