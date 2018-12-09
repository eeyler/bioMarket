<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/banner.css">
</head>
<body>

<div class="slideshow-container cont">
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img class='zoom' alt="Offer 1" src="img/Vegaterian-Peppers-wkshop-banner-800-300-w.jpg" style="width:100%">
  <div class="text"><h3>-20% Today Only</h3></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img class='zoom' alt="Offer 2" src="img/Vegetable-Wkshop-banner-800-300-w.jpg" style="width:100%">
  <div class="text"><h3>-25% All week</h3></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img class='zoom' alt="Offer 3" src="img/fresh-food-banner.jpg" style="width:100%">
  <div class="text"><h3>-50% Tomorrow Only</h3></div>
</div>

</div> 
<br>


<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 3 seconds
}
</script>

</body>
</html> 