<!DOCTYPE html>
<html>
<head>
<title>AdventureHub</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="icon" href="image/logo.png" type="image/png">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<style>
body{
    font-family: "Montserrat", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
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
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Post</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Boutiques</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Commandes</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Produits </a><br><br>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Dashboard</b></h5>
  </header>

  <!-- User List -->
  <div class="w3-container">
      <?php
      session_start();
      require_once '../config.php';
      require_once '../model/User.php';
      require_once '../controller/UsersC.php';
      $userController = new UserC();
      $users = $userController->getUsers();
      //var_dump($users);
      //die;
      
      if ($users) {
            echo "<h2>Liste des utilisateurs :</h2>";
            echo "<table class='w3-table w3-striped'>";
            echo "<tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Username</th>
            <th>Email</th>
            <th>Date de naissance</th>
            <th>Adresse</th>
            <th>Numéro de téléphone</th>
            <th>Image</th>
            </tr>";
          foreach ($users as $user) {
            echo "<form action ='user_choice.php' method='POST'>";
            echo "<tr>";
            echo "<td>" . $user["id"] . "</td>";
            echo "<td>" . $user["prenom"] . "</td>";
            echo "<td>" . $user["nom"] . "</td>";
            echo "<td>" . $user["username"] . "</td>";
            echo "<td>" . $user["email"] . "</td>";
            echo "<td>" . $user["dob"] . "</td>";
            echo "<td>" . $user["adresse"] . "</td>";
            echo "<td>" . $user["numero"] . "</td>";
            echo "<td><img src='image/" . $user["image"] . "' class='w3-circle w3-margin-right' style='width:46px'></td>";
            echo "<td><button type='submit' name='userId' value='".$user["id"]."'>Contacter</button></td>";
            //$userType = "user";
            echo "</tr>";
            echo "</form>";

        }
        echo "</table>";
        
      } else {
          echo "<p>Aucun utilisateur trouvé.</p>";
      }
      ?>
      <?php
      require_once '../config.php';
      require_once '../model/User.php';
      require_once '../controller/UsersC.php';
      $agenceController = new AgenceC();
      $agences = $agenceController->getAgence();
      if ($agences) {
        echo "<h2>Liste des Agences :</h2>";
        echo "<table class='w3-table w3-striped'>";
        echo "<tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Adresse</th>
        <th>Numéro de téléphone</th>
        <th>Image</th>
        </tr>";
        foreach ($agences as $agence) {
          echo "<form action ='user_choice.php' method='POST'>";
            echo "<tr>";
            echo "<td>" . $agence["id"] . "</td>";
            echo "<td>" . $agence["username"] . "</td>";
            echo "<td>" . $agence["email"] . "</td>";
            echo "<td>" . $agence["adresse"] . "</td>";
            echo "<td>" . $agence["numero"] . "</td>";
            echo "<td><img src='image/" . $agence["image"] . "' class='w3-circle w3-margin-right' style='width:46px'></td>";
            //echo "<td><button onclick='showContactInfo(\"agenceDetails_" . $agence["id"] . "\")'>Contacter</button></td>";
            echo "<td><button type='submit' name='userId' value='". $agence["id"] ."'>Contacter</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucune agence trouvée.</p>";
    }
    
      ?>
  </div>

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

/*function showContactInfo() {
  //var selectedOption = document.getElementById("userType").value;
  $userType = "user";
if ($userType === "user") {
    window.location.href = "user_choice.html?user=" + $userType;
} /*else if (selectedOption === "agence") {
    window.location.href = "Agences.html?userType=" + encodeURIComponent(selectedOption);
}
}*/
</script>

</body>
</html>
