<?php
session_start();

//require_once '../view/functions.php';
//is_connect();
include_once "../config.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Acceuil</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
  <style>
    body {
      font-family: "Montserrat", sans-serif;
      font-optical-sizing: auto;
      font-style: normal;
    }

    .slick-carousel {
      margin-right: 0.5px;
    }
  </style>
  <link rel="icon" href="image/logo.png" type="image/png">

</head>

<body>

  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
      <a href="http://localhost/gestion_users/Front/view/index.php" class="w3-bar-item w3-button"><img
          src="image/logo.png" alt="AdventureHub logo" width="40px"> AdventureHub</a>
      <!-- Float links to the right. Hide them on small screens -->

      <div class="w3-right w3-hide-small">
        <a href="http://localhost/gestion_users/Front/view/logout.php" class="w3-bar-item w3-button">Se deconnecter</a>
        <a href="http://localhost/gestion_users/Front/controller/profilController.php"
          class="w3-bar-item w3-button">profil</a>
      </div>
    </div>

    <br><br><br><br><br><br><br><br>
    <!-- Deuxième barre de menu -->
    <div class="w3-display-middle w3-center">
      <div class="w3-bar w3-white w3-card w3-margin-top" style="border-radius: 20px; max-width: 800px;">
        <a href="#" class="w3-bar-item w3-button">Option 1</a>
        <a href="#" class="w3-bar-item w3-button">Option 2</a>
        <a href="#" class="w3-bar-item w3-button">Option 3</a>
      </div>
    </div>
  </div>
  <br><br><br><br><br><br><br><br>
  <div class="carousels-container" style="display: flex; justify-content: space-between; align-content= space-between;">
    <div class="slick-carousel" style="max-width:500px; border-radius: 20px; margin-right: 1px;" id="home">
      <div>
        <img src="image/bgphoto.jpg" alt="Image 1" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/6.jpg" alt="Image 2" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/8.jpg" alt="Image 3" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/10.jpg" alt="Image 4" width="500" height="300" style="border-radius: 20px;">
      </div>
      Explorez les métropoles dynamiques et découvrez la diversité culturelle et architecturale des villes.
    </div>
    <div class="slick-carousel" style="max-width: 500px; border-radius: 20px;" id="home">
      <div>
        <img src="image/bgphoto.jpg" alt="Image 1" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/6.jpg" alt="Image 2" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/8.jpg" alt="Image 3" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/10.jpg" alt="Image 4" width="500" height="300" style="border-radius: 20px;">
      </div>
      Explorez des sentiers pittoresques au cœur de la nature et vivez des aventures inoubliables.
    </div>
    <div class="slick-carousel" style="max-width:500px; border-radius: 20px;" id="home">
      <div>
        <img src="image/bgphoto.jpg" alt="Image 1" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/6.jpg" alt="Image 2" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/8.jpg" alt="Image 3" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/10.jpg" alt="Image 4" width="500" height="300" style="border-radius: 20px;">
      </div>
      Évadez-vous vers des plages paradisiaques et laissez le bruit des vagues vous apaiser.
    </div>
  </div>
  </div>
  <br><br>
  <div class="carousels-container" style="display: flex; justify-content: space-between; align-content= space-between;">
    <div class="slick-carousel" style="max-width:500px; border-radius: 20px; margin-right: 1px;" id="home">
      <div>
        <img src="image/bgphoto.jpg" alt="Image 1" width="500" height="300" style="border-radius: 20px;">

      </div>
      <div>
        <img src="image/6.jpg" alt="Image 2" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/8.jpg" alt="Image 3" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/10.jpg" alt="Image 4" width="500" height="300" style="border-radius: 20px;">
      </div>
      Découvrez les fonds marins incroyables et plongez dans un monde sous-marin fascinant.
    </div>
    <div class="slick-carousel" style="max-width: 500px; border-radius: 20px;" id="home">
      <div>
        <img src="image/bgphoto.jpg" alt="Image 1" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/6.jpg" alt="Image 2" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/8.jpg" alt="Image 3" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/10.jpg" alt="Image 4" width="500" height="300" style="border-radius: 20px;">
      </div>
      Parcourez des paysages pittoresques à vélo et imprégnez-vous de la beauté naturelle qui vous entoure.
    </div>
    <div class="slick-carousel" style="max-width:500px; border-radius: 20px;" id="home">
      <div>
        <img src="image/bgphoto.jpg" alt="Image 1" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/6.jpg" alt="Image 2" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/8.jpg" alt="Image 3" width="500" height="300" style="border-radius: 20px;">
      </div>
      <div>
        <img src="image/10.jpg" alt="Image 4" width="500" height="300" style="border-radius: 20px;">
      </div>
      Choisissez AdventureHub, votre compagnon pour toujours
    </div>
  </div>
  </div>

  <!-- Footer -->
  <footer class="w3-center w3-black w3-padding-16">
    <p>AdventureHub - conseils et actualités </p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.slick-carousel').slick({
        autoplay: true, // Défilement automatique
        autoplaySpeed: 2000, // Vitesse de défilement en millisecondes
        arrows: false, // Masquer les flèches de navigation
        dots: true // Afficher les indicateurs de pagination
      });
    });
  </script>
</body>

</html>