<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/admin_and_member_panel.css">

</head>
<body>

<div class="panel" id="myPanelnav">
  <a href="?page=acp_stock" class="active-panel">Stock</a>
  <a href="#?page=acp_customers_orders">Customer Orders</a>
  <a href="#?page=acp_suppliers_orders">Supplier Orders</a>
  <a href="#?page=acp_customers">Customers</a>
  <a href="?page=user_details">User Details</a>
  <a href="javascript:void(0);" class="icon-burger" onclick="myFunction()">
  <i class="fa fa-bars"></i>
  </a>
</div>


<script>
function myFunction() {
    var x = document.getElementById("myPanelnav");
    if (x.className === "panel") {
        x.className += " responsive";
    } else {
        x.className = "panel";
    }
}
</script>

</body>
</html>
