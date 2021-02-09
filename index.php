<?php
	include ("header.php");
?>

<section id="main">
<div class="slideshow-container">
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <!-- Photo by Evgeny Tchebotarev on Unsplash -->
  <img src="./images/homepage/1.jpg" alt="car photo 1" style="width:100%">
  <div class="text">Major Sales Up to 30% Off</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <!-- Photo by Samuele Errico Piccarini on Unsplash -->
  <img src="./images/homepage/2.jpg" alt="car photo 2" style="width:100%">
  <div class="text">All New Cars for Summer</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <!-- Photo by Angus Gray on Unsplash -->
  <img src="./images/homepage/3.jpg" alt="car photo 3" style="width:100%">
  <div class="text">Rent More Save More Offer</div>
</div>
</div>

<div style="text-align:center">
  <span class="dot" onclick="currentDiv(1)"></span>
  <span class="dot" onclick="currentDiv(2)"></span>
  <span class="dot" onclick="currentDiv(3)"></span>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);
showSlides();

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) { //function to change banner via onclick
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

function showSlides() { //function to change banner every interval automatically
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every ? seconds
}
</script>
			<br><br>
			<h1>Welcome to our Hertz-UTS online store!</h1>
			<p>
        Find quality vehicles at affordable rates with Hertz-UTS. We make comparing car hire quick and easy, getting you great rates from Australia’s leading rental suppliers. 20% off for your first car rental. Enter code: <b>20OFFNEW</b> during checkout.
			</p>
			<br />
      <h1>Our Story of Car Renting</h1>
      <br>
			<div class="flip-box">
				  <div class="flip-box-inner">
				    <div class="flip-box-front">
              <!-- Photo by Jamie Street on Unsplash -->
				      <img src="images/homepage/4.jpg" alt="founder" class="founder-img">
				    </div>
				    <div class="flip-box-back hide">
							<br><br><br><br>
				      <h2>Runzhe Liao</h2>
				      <p>The founder of Hertz-UTS</p>
							<p>"Live your life to the fullest!"</p>
				    </div>
				  </div>
				</div>
			<p>
      We are proud to be the only true global car rental company, providing quality car rental service for over 90 years.
			</p>
			<p>We sell one-year-old vehicles from our rental fleet to make room for new models. With our low fixed prices, you have the advantage. 
      </p>
      <br>
			<h3><b><I>"We travel not to escape life but for life not to escape us."</I></b></h3>
			<p>Whether moving across town or travelling, we're here to help. Hertz has set the standard for quality, reliability and service worldwide. We bring you that same dependability for all your moving needs. Rent a car today!</p>
		</section>
	</div>

<?php
	include ("footer.php");
?>
