<?php
session_start();

require_once '../view/functions.php';
is_connect();
include_once "../config.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Acceuil</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<style>
    body{
        font-family: "Montserrat", sans-serif;
  font-optical-sizing: auto;
  font-style: normal;
    }
    
</style>
<link rel="icon" href="image/logo.png" type="image/png">

</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button"><img src="image/logo.png" alt="AdventureHub logo" width="40px"> AdventureHub</a>
    <!-- Float links to the right. Hide them on small screens -->

    <div class="w3-right w3-hide-small">
      <a href="http://localhost/gestion_users/Front/view/index.php" class="w3-bar-item w3-button">Acceuil</a>
      <a href="#shop" class="w3-bar-item w3-button">Boutique</a>
      <a href="#Agency" class="w3-bar-item w3-button">Agences</a>
      <a href="http://localhost/gestion_users/Front/view/logout.php" class="w3-bar-item w3-button">Se deconnecter</a>
      <a href="http://localhost/gestion_users/Front/controller/profilController.php" class="w3-bar-item w3-button">profil</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="image/bgphoto.jpg" alt="Architecture" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><img src="image/logo white.png" alt="logo white" width="80px"> Accueil</h1>
  </div>
</header>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>AdventureHub - conseils et actualités </p>
</footer>

</body>
</html>
