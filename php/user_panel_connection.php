<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/admin_and_member_panel.css">

</head>
<body>

<div class="panel" id="myPanelnav">
  <a href="?page=cart">Your Cart</a>
  <a href="?page=user_orders">User Orders</a>
  <a href="?page=user_details" class="active-panel">User Details</a>
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
