<!DOCTYPE html>
<html>
<head>
  <title>AdventureHub</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body{
        font-family: "Montserrat", sans-serif;
  font-optical-sizing: auto;
  font-style: normal;
    }
/***************************like button *****/
.fa {
  font-size: 25px;
  cursor: pointer;
  user-select: none;
}

.fa:hover {
  color: darkblue;
}





/*******************************slidder****************/
    * {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 25px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}



/* Number text (1/8 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #4325f0;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
/*end style slider ********/








</style>
<link rel="icon" href="img/logo.png" type="image/png">

</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button"><img src="img/logo.png" alt="AdventureHub logo" width="40px"> EventHub</a>
    <!-- Float links to the right. Hide them on small screens -->

    <div class="w3-right w3-hide-small">
      <a href="#home" class="w3-bar-item w3-button">Acceuil</a>
      <a href="#shop" class="w3-bar-item w3-button">Boutique</a>
      <a href="#Agency" class="w3-bar-item w3-button">Agences</a>
      <!-- bouton ajouter -->
      <button type="button" onclick="redirectForm()" style="
 
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      border-radius: 12px;">ajouter un événement</button>
      <!-- end bouton ajouter -->
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="img/bgphoto.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><img src="img/logo white.png" alt="logo white" width="80px"> EventHub</h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">
  
  
  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Choix des Voyageurs</h3>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Capri Blue Grotto Boat Tour From Sorrento</div>
        <img src="img/Montenegro.jpg" alt="House" style="width:100%">
        <p><button class="w3-button w3-light-grey w3-block">plus</button></p>
        <p><button class="w3-button w3-light-grey w3-block">like <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i></button></p>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Full-day Customizable Private Seoul Highlight Tour
        </div>
        <img src="img/France.jpg" alt="House" style="width:100%">
        <p><button class="w3-button w3-light-grey w3-block">plus</button></p>
        <p><button class="w3-button w3-light-grey w3-block">like <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i></button></p>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding"> Enjoy Holi (Colour Festival)</div>
        <img src="img/Sicily.jpg" alt="House" style="width:100%">
        <p><button class="w3-button w3-light-grey w3-block">plus</button></p>
        <p><button class="w3-button w3-light-grey w3-block">like <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i></button></p>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Skip the Line:Roman Forum & Palatine Hill Guided Tour</div>
        <img src="img/Lisbon.jpg" alt="House" style="width:100%">
        <p><button class="w3-button w3-light-grey w3-block">plus</button></p>
        <p><button class="w3-button w3-light-grey w3-block">like <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i></button></p>
      </div>
    </div>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">The Real Mary King's Close</div>
        <img src="img/Scotland.jpg" alt="House" style="width:100%">
        <p><button class="w3-button w3-light-grey w3-block">plus</button></p>
        <p><button class="w3-button w3-light-grey w3-block">like <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i></button></p>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Agafay Desert Package, Quad Bike, Camel Ride and Dinner Show</div>
        <img src="img/Marrakech.jpg" alt="House" style="width:100%">
        <p><button class="w3-button w3-light-grey w3-block">plus</button></p>
        <p><button class="w3-button w3-light-grey w3-block">like <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i></button></p>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Senso-ji Temple  </div>
        <img src="img/Kyoto.jpg" alt="House" style="width:100%">
        <p><button class="w3-button w3-light-grey w3-block">plus</button></p>
        <p><button class="w3-button w3-light-grey w3-block">like <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i></button></p>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Brandenburg Gate</div>
        <img src="img/Berlin.jpg" alt="House" style="width:100%">
        <p><button class="w3-button w3-light-grey w3-block">plus</button></p>
        <p><button class="w3-button w3-light-grey w3-block">like <i onclick="myFunction(this)" class="fa fa-thumbs-up"></i></button></p>
      </div>
    </div>
    
  </div>
    <!-- ======= Gallery Section ======= -->
    <div class="slideshow-container">

      <div class="mySlides fade">
        <div class="numbertext">1 / 8</div>
        <img src="img/gallery/1.jpg" style="width:100%">
        
      </div>
      
      <div class="mySlides fade">
        <div class="numbertext">2 / 8</div>
        <img src="img/gallery/2.jpg" style="width:100%">
        
      </div>
      
      <div class="mySlides fade">
        <div class="numbertext">3 / 8</div>
        <img src="img/gallery/3.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">4 / 8</div>
        <img src="img/gallery/4.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">5 / 8</div>
        <img src="img/gallery/5.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">6 / 8</div>
        <img src="img/gallery/6.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">7 / 8</div>
        <img src="img/gallery/7.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">8 / 8</div>
        <img src="img/gallery/8.jpg" style="width:100%">
        
      </div>
      
      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>
      
      </div>
      <br>
      
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
        <span class="dot" onclick="currentSlide(4)"></span> 
        <span class="dot" onclick="currentSlide(5)"></span> 
        <span class="dot" onclick="currentSlide(6)"></span>
        <span class="dot" onclick="currentSlide(7)"></span> 
        <span class="dot" onclick="currentSlide(8)"></span> 
        
      </div>
      
      <script>
      let slideIndex = 1;
      showSlides(slideIndex);
      
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
      
      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
      
      function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }



      //like button
      function myFunction(x) {
  x.classList.toggle("fa-thumbs-down");
      }

    //redirect func
    function redirectForm() {
      window.location.href="View/addEvent.php";
  
      }
      </script>
      

    <!-- End Gallery Section -->

  
  
<!-- Image of location/map -->
<div class="w3-container">
  <img src="img/5.jpg" class="w3-image" style="width:100%">
</div>

<!-- End page content -->
</div>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
  
  <div class="w3-content w3-padding" style=color:#FC5E04 ><p>AdventureHub - EventHub </p></div>
</footer>

</body>
</html>
