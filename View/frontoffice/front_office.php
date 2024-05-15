<?php
    include_once '../../config.php';
    include_once '../../../Model/event.php';
    include_once '../../Controller/EventC.php';
    $eventC = new EventC();
    $list = $eventC->listEvents();
    ?>
<!DOCTYPE html>
<html>
<head>
  <title>AdventureHub</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNdop61_FrgNrp87Sl1mwpaTEWp1-bVNM&libraries=places"></script>
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
<link rel="icon" href="../../img/logo.png" type="image/png">

</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button"><img src="../../img/logo.png" alt="AdventureHub logo" width="40px"> EventHub</a>
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
  <img class="w3-image" src="../../img/bgphoto.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><img src="../../img/logo white.png" alt="logo white" width="80px"> EventHub</h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">
  
  
 <!-- Project Section -->
 
<!-- Project Section -->
<div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Choix des Voyageurs</h3>
</div>

<div class="w3-row-padding">
    <div class="w3-content w3-display-container">
        <?php
        foreach ($list as $index => $event) {
        ?>
            <div class="projectSlides">
                <div class="w3-display-container">
                    <div class="w3-display-topleft w3-black w3-padding"></div>
                    <img src="../../img/event.jpg" alt="" style="width:100%">
                    <div class="w3-display-bottomleft w3-padding">
                        <p><strong>Nom:</strong> <?= $event['nom']; ?></p>
                        
                        <button onclick="goToEventDetail(<?= $event['ide'] ?>)">Read More</button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- Navigation buttons -->
        <button class="w3-button w3-black w3-display-left" onclick="plusProjectSlides(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right" onclick="plusProjectSlides(1)">&#10095;</button>
    </div>
</div>

<!-- JavaScript for project slideshow functionality -->
<script>
    var projectSlideIndex = 1;
    showProjectSlides(projectSlideIndex);

    function plusProjectSlides(n) {
        showProjectSlides(projectSlideIndex += n);
    }

    function showProjectSlides(n) {
        var i;
        var x = document.getElementsByClassName("projectSlides");
        if (n > x.length) { projectSlideIndex = 1 }
        if (n < 1) { projectSlideIndex = x.length }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[projectSlideIndex - 1].style.display = "block";
    }

    // Function to navigate to event detail page
    function goToEventDetail(eventId) {
        window.location.href = "event_details.php?id=" + eventId;
    }
</script>


    <!-- ======= Gallery Section ======= -->
    <div class="slideshow-container">

      <div class="mySlides fade">
        <div class="numbertext">1 / 8</div>
        <img src="../../img/gallery/1.jpg" style="width:100%">
        
      </div>
      
      <div class="mySlides fade">
        <div class="numbertext">2 / 8</div>
        <img src="../../img/gallery/2.jpg" style="width:100%">
        
      </div>
      
      <div class="mySlides fade">
        <div class="numbertext">3 / 8</div>
        <img src="../../img/gallery/3.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">4 / 8</div>
        <img src="../../img/gallery/4.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">5 / 8</div>
        <img src="../../img/gallery/5.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">6 / 8</div>
        <img src="../../img/gallery/6.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">7 / 8</div>
        <img src="../../img/gallery/7.jpg" style="width:100%">
        
      </div>

      <div class="mySlides fade">
        <div class="numbertext">8 / 8</div>
        <img src="../../img/gallery/8.jpg" style="width:100%">
        
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
      window.location.href="addEvent.php";
  
      }
      //plus func
    function plus() {
      window.location.href="event_details.php";

      }
      </script>
      

    <!-- End Gallery Section -->

    <div id="map" style="height: 400px; width: 100%;"></div>
    <!-- Replace the existing initMap() function with the updated one -->
    <script>
function initMap() {
    // Coordinates for all locations
    var locations = [
        {lat: 36.867157, lng: 10.107955, title: 'Zone Industrielle Chotrana II, B.P. 160 Pôle Technologique El Ghazela 2083 Ariana Tunis'},
        {lat: 36.899690, lng: 10.189488, title: 'Location 2'},
        {lat: 36.806019, lng: 10.183426, title: 'Location 3'},
        {lat: 36.587079, lng: 10.278759, title: 'Location 4'}
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        center: locations[0], // Center the map on the first location
        zoom: 10 // Adjust the zoom level as needed
    });

    // Add markers for all locations
    for (var i = 0; i < locations.length; i++) {
        var marker = new google.maps.Marker({
            position: locations[i],
            map: map,
            title: locations[i].title
        });
    }
}
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNdop61_FrgNrp87Sl1mwpaTEWp1-bVNM&callback=initMap"></script>
  
<!-- Image of location/map -->
<div class="w3-container">
  <img src="../../img/5.jpg" class="w3-image" style="width:100%">
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
