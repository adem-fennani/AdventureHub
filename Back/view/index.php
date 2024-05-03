<?php
session_start();

require_once '../controller/UsersC.php';
require_once '../model/User.php';
require_once '../config.php';
require_once '../view/functions.php';

$userController = new UserC();
$agenceController = new AgenceC();
$onligneController = new OnligneC();
$notifController = new NotificationC();

$nombreUtilisateurs = $userController->countUsers();
$nombreAgences = $agenceController->countAgences();
$agenceStatisticsByCountry = $agenceController->getAgenceStatisticsByCountry();
$userStatisticsByCountry = $userController->getUserStatisticsByCountry();
$nonLus = $notifController->countUnreadNotifications();
$Lus = $notifController->countReadNotifications();

?>
<!DOCTYPE html>
<html>

<head>
  <title>AdventureHub</title>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link rel="icon" href="image/logo.png" type="image/png">
  <style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
      font-family: "Raleway", sans-serif
    }
  </style>

</head>

<body class="w3-light-grey">
  <style>
    body {
      font-family: "Montserrat", sans-serif;
      font-optical-sizing: auto;
      font-style: normal;
    }
  </style>
  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i
        class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right"><img src="image/logo white.png" alt="" width="40px"></span>
  </div>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
      <div class="w3-col s4">
        <img src="image/Kyoto.jpg" class="w3-circle w3-margin-right" style="width:46px">
      </div>
      <div class="w3-col s8 w3-bar">
        <span>Bienvenue, <strong>Admin</strong></span><br>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
      </div>
    </div>
    <hr>
    <div class="w3-container">
      <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="http://localhost/gestion_users/Back/controller/profilAdmin.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-profil fa-fw"></i>  Profil</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Aperçu</a>
    <a href="http://localhost/gestion_users/Back/view/ReadUsers.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Voir les Utilisateurs</a>
    <a href="http://localhost/gestion_users/Back/view/user_choice.html" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Contacter un Utilisateur</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Articles</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Actualités</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Historique</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Paramètres </a><br><br>
  </div>
  </nav>


  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
    title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
      <h5><b><i class="fa fa-dashboard"></i> Dashboard</b></h5>
    </header>

    <!-- Statistiques -->
    <div class="w3-row-padding w3-margin-bottom">
      <div class="w3-quarter">
        <div class="w3-container w3-red w3-padding-16">
          <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3><?php echo $nombreUtilisateurs; ?></h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Utilisateurs</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-blue w3-padding-16">
          <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3><?php echo $nombreAgences; ?></h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Agences</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-teal w3-padding-16">
          <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3><?php echo $onligneController->countLoggedInUsers(); ?></h3>
          </div>
          <div class="w3-clear"></div>
          <h4>utilisateurs connectés</h4>
        </div>
      </div>
    </div>
    <div class="w3-container">
  <h5>Statistiques par pays pour les utilisateurs :</h5>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <?php foreach ($userStatisticsByCountry as $country => $percentage): ?>
      <tr>
        <td><?php echo $country; ?></td>
        <td><?php echo $percentage . '%'; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<div class="w3-container">
  <h5>Statistiques par pays pour les agences :</h5>
  <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
    <?php foreach ($agenceStatisticsByCountry as $country => $percentage): ?>
      <tr>
        <td><?php echo $country; ?></td>
        <td><?php echo $percentage . '%'; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>


    <hr>
    <div class="w3-container">
      <h5> NOTIFICATIONS </h5>
      <ul class="w3-ul w3-card-4 w3-white">
        <li class="w3-padding-16">
          <img src="image/oui.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
          <div class="w3-right">
            <h3><?php echo $Lus; ?></h3>
          </div>
          <span class="w3-xlarge">Messages Lus</span><br>
          
        </li>
        <li class="w3-padding-16">
          <img src="image/non.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
          <div class="w3-right">
            <h3><?php echo $nonLus; ?></h3>
          </div>
          <span class="w3-xlarge">Messages Non Lus</span><br>
        </li>
      </ul>
    </div>
    <hr>


    <br>

    <!-- Footer -->
    <footer class="w3-container w3-padding-16 w3-light-grey">
      <h4>AdventureHub</h4>
    </footer>

    <!-- End page content -->
  </div>

  <script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
      } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
      }
    }

    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
      overlayBg.style.display = "none";
    }
  </script>

</body>

</html>