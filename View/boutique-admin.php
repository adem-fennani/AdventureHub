<?php
require_once('../config.php');
require_once('../Model/Commande.php');

// Get PDO connection using the config class
$pdo = config::getConnexion();

// Create an instance of the Commande class
$commandeModel = new Commande($pdo);

?>



<!DOCTYPE html>
<html>

<head>
  <title>Boutique back-office</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="script/boutique-admin.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style/boutique-admin.css" />
  <link rel="icon" href="images/logo.png" type="image/png" />

</head>

<body class="w3-light-grey">
  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-large" style="z-index: 4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">
      <i class="fa fa-bars"></i>  Menu
    </button>
    <span class="w3-bar-item w3-right"><img src="images/logo white.png" alt="" width="40px" /></span>
  </div>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index: 3; width: 300px" id="mySidebar">
    <br />
    <div class="w3-container w3-row">
      <div class="w3-col s4">
        <img src="images/logo.png" class="w3-circle w3-margin-right" style="width: 46px" />
      </div>
      <div class="w3-col s8 w3-bar">
        <span>Bienvenue, <strong>Admin</strong></span><br />
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
      </div>
    </div>
    <hr />
    <div class="w3-container">
      <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
      <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i> Close Menu</a>
      <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i> Aperçu</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i> Vues</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i> Geo</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i> Articles</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i> Actualités</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i> Historique</a>
      <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i> Paramètres </a><br /><br />
    </div>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor: pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left: 300px; margin-top: 43px">
    <!-- Header -->
    <header class="w3-container" style="padding-top: 22px">
      <h5>
        <b><i class="fa fa-dashboard"></i> Gestion des commandes</b>
      </h5>
    </header>

    <div class="w3-panel">
      <div class="w3-row-padding" style="margin: 0 -16px">
        <div class="w3-twothird">
          <h5>Dernières commandes</h5>
          <table class="w3-table w3-striped w3-white">
            <thead>
              <tr>
                <th>ID</th>
                <th>Ligne</th>
                <th>Prix</th>
                <th>Statut</th>
                <th>Adresse de livraison</th>
              </tr>
            </thead>
            <tbody>
              <?php $commandeModel->displayCommandeAdmin(); ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
    <hr />
    <div class="w3-container">
      <h5>Statistiques générales</h5>
      <p>Commandes non traités</p>
      <div class="w3-grey">
        <div class="w3-container w3-center w3-padding" style="width: 100%; 
        <?php
        // Count the number of commandes with "Non traité" statut_commande
        $query = "SELECT COUNT(*) as count FROM commande WHERE statut_commande = 'Non traité'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        // Set background color based on the count
        if ($count <= 4) {
          echo "background-color: #8bc34a;";
        } elseif ($count >= 5 && $count <= 9) {
          echo "background-color: orange;";
        } else {
          echo "background-color: red;";
        }
        ?>">
          <?php echo $count; ?>
        </div>
      </div>

      <p>Répartition des commandes</p>
      <div class="w3-container">
        <?php
        // Get the count of each status
        $delivreCount = $commandeModel->getStatutCount("Délivré");
        $enTraitementCount = $commandeModel->getStatutCount("En cours de traitement");
        $nonTraiteCount = $commandeModel->getStatutCount("Non traité");

        // Calculate percentages
        $totalCount = $delivreCount + $enTraitementCount + $nonTraiteCount;
        $delivrePercent = ($delivreCount / $totalCount) * 100;
        $enTraitementPercent = ($enTraitementCount / $totalCount) * 100;
        $nonTraitePercent = ($nonTraiteCount / $totalCount) * 100;
        ?>
        <div class="w3-container" style="background-color: rgba(0, 0, 255, 0.5); width: <?php echo $delivrePercent; ?>%">
          <p>Délivré (<?php echo round($delivrePercent, 2); ?>%)</p>
        </div>
        <div class="w3-container" style="background-color: rgba(0, 255, 255, 0.5); width: <?php echo $enTraitementPercent; ?>%">
          <p>En cours de traitement (<?php echo round($enTraitementPercent, 2); ?>%)</p>
        </div>
        <div class="w3-container" style="background-color: rgba(255, 255, 0, 0.5); width: <?php echo $nonTraitePercent; ?>%">
          <p>Non traité (<?php echo round($nonTraitePercent, 2); ?>%)</p>
        </div>
      </div>



      <div class="w3-container">
        <h5>Produits</h5>
        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
          <tr>
            <td>Sac à dos</td>
            <td>49.000 DT</td>
          </tr>
          <tr>
            <td>Chapeau</td>
            <td>19.000 DT</td>
          </tr>
          <tr>
            <td>Parapluie</td>
            <td>15.000 DT</td>
          </tr>
          <tr>
            <td>Trousse de secours</td>
            <td>7.000 DT</td>
          </tr>
        </table>
        <br />
        <button class="w3-button w3-dark-grey">
          Plus de produits<i class="fa fa-arrow-right"></i>
        </button>
      </div>
      <hr />
      <div class="w3-container">
        <h5>Fournisseurs récents</h5>
        <ul class="w3-ul w3-card-4 w3-white">
          <li class="w3-padding-16">
            <img src="images/mike.jpg" class="w3-left w3-circle w3-margin-right" style="width: 35px" />
            <span class="w3-xlarge">Mike</span><br />
          </li>
          <li class="w3-padding-16">
            <img src="images/jill.jpg" class="w3-left w3-circle w3-margin-right" style="width: 35px" />
            <span class="w3-xlarge">Jill</span><br />
          </li>
          <li class="w3-padding-16">
            <img src="images/jane.jpg" class="w3-left w3-circle w3-margin-right" style="width: 35px" />
            <span class="w3-xlarge">Jane</span><br />
          </li>
        </ul>
      </div>
      <hr />

      <br />

      <!-- Footer -->
      <footer class="w3-container w3-padding-16 w3-light-grey">
        <h4>AdventureHub</h4>
      </footer>

      <!-- End page content -->
    </div>
</body>

</html>