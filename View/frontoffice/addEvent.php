<?php

include '../../Controller/EventC.php';

$error = "";

// Create event
$event = null;

// Create an instance of the controller
$eventC = new EventC();
if (
    
    isset($_POST["nom"]) &&
    isset($_POST["host"]) &&
    isset($_POST["description"]) &&
    isset($_POST["location"]) &&
    isset($_POST["date"]) &&
    isset($_POST["status"])
) {
    if (
        
        !empty($_POST["nom"]) &&
        !empty($_POST["host"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["location"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["status"])
    ) {
        $event = new Event(
            null,
            
            $_POST['nom'],
            $_POST['host'],
            $_POST['description'],
            $_POST['location'],
            new DateTime($_POST['date']),
            $_POST['status']
        );
        $eventC->addEvent($event);
        header('Location: ../backoffice/ListEvents.php');
    } else {
        $error = "Missing information";
    }
}

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



/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}









/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
/*end style slider ********/


.error-message {
  color: red;
  font-size: 12px;
  margin-top: 5px;
}





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
      </div>
    </div>
  </div>
  
  <!-- Header -->
  <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="../img/bgphoto.jpg" alt="Architecture" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
      <h1 class="w3-xxlarge w3-text-white"><img src="../../img/logo white.png" alt="logo white" width="80px"> EventHub</h1>
    </div>
  </header>
  
<!-- add event Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Ajouter un événement</h3>
    
    
    
    
    <form action="" method="POST" id="form"  onsubmit="return validateForm()">
<tr>      
  <input class="w3-input w3-section w3-border" type="text" placeholder="nom" maxlength=20 name="nom" id="nom" >
  <td><div id="erreurNom" class="error-message"></div></td>
</tr>
<tr>
  <input class="w3-input w3-section w3-border" type="text" placeholder="host" maxlength=20 name="host" id="host" >
  <td><div id="erreurHost" class="error-message"></div></td>

</tr>

      <br><br>
<tr>
  <textarea placeholder="description" id="description" name="description" rows="10" cols="50" maxlength=1000 
  style="     width: 100%; /* Adjusts to the length of the page */
      padding: 10px;
      border: 1px solid #ccc; /* Light grey border */
      border-radius: 5px; /* Rounded corners */
      font-size: 16px; /* Placeholder text size */
      color: #888; /* Placeholder text color */
      background-color: #fff; /* White background */"></textarea><br><br>
  <td><div id="erreurDescription" class="error-message"></div></td>

</tr>

<tr>
  <input class="w3-input w3-section w3-border" type="text" placeholder="location"  name="location" id="location"  maxlength=20>
  <td><div id="erreurLocation" class="error-message"></div></td>
</tr>
<tr>

  <input class="w3-input w3-section w3-border" type="date" placeholder="date"  name="date" id="date" >
  <td><div id="erreurDate" class="error-message"></div></td>
</tr>
<tr>
  <input class="w3-input w3-section w3-border" type="text" placeholder="status"  name="status" id="status"  maxlength=20>
  <td><div id="erreurStatus" class="error-message"></div></td>
</tr>

  <button class="w3-button w3-black w3-section" type="submit">
    <i class="fa fa-paper-plane"></i> confirmer
  </button>
    <!--<button class="w3-button w3-black w3-section" type="submit">
    <i class="fa fa-paper-plane"></i> inserer une image
  </button>*/-->
  
    </form>
  </div>
  <script src="event.js" ></script>
  </body>
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

  
  
  </html>
  