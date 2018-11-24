<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/panel_connection.css">
</head>
<body>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'yourDetails')">Your details</button>
  <button class="tablinks" onclick="openCity(event, 'yourOrders')">Your orders</button>
 
  
</div>

<div id="yourDetails" class="tabcontent">
  <h3>Your Details</h3>
  <?php include_once 'user_details.php'; ?>
</div>

<div id="yourOrders" class="tabcontent">
  <h3>Your Orders</h3>
  <?php include_once 'user_orders.php'; ?>
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
