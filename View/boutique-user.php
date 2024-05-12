<?php
// Include the necessary files and initialize PDO connection
require_once('../config.php');
require_once('../Model/Produit.php');

// Instantiate PDO connection
$pdo = config::getConnexion();

// Instantiate Produit model
$produit = new Produit($pdo);
$products = $produit->getAllProduits();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Boutique front-office</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style/boutique-user.css" />
  <link rel="icon" href="images/logo.png" type="image/png" />
</head>

<body>
  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
      <a href="front-office.html" class="w3-bar-item w3-button"><img src="images/logo.png" alt="AdventureHub logo" width="40px" />
        AdventureHub</a>
      <!-- Float links to the right. Hide them on small screens -->

      <div class="w3-right w3-hide-small">
        <a href="mes-commandes.php" class="w3-bar-item w3-button">Mes Commandes</a>
        <a href="front-office.html" class="w3-bar-item w3-button">Retour</a>
      </div>
    </div>
  </div>

  <!-- Header -->

  <!-- Page content -->
  <div class="w3-content w3-padding" style="max-width: 1564px">
    <!-- Project Section -->

    <!-- Shop Section -->
    <div class="w3-container w3-padding-32" id="conseil">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Produits</h3>
    </div>

    <div class="w3-row-padding w3-grayscale">
      <?php
      // Loop through each product and generate HTML dynamically
      $count = 0;
      foreach ($products as $product) {
      ?>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <img src="<?php echo $product['image_produit']; ?>" alt="<?php echo $product['titre_produit']; ?>" style="width: 100%" />
          <h3><?php echo $product['titre_produit']; ?></h3>
          <p><?php echo $product['prix_unitaire']; ?> DT</p>
          <div class="w3-section">
            <form action="panier.php" method="post">
              <input type="hidden" name="idProduit" value="<?php echo $product['id_produit']; ?>" />
              <div class="w3-bar">
                <div class="w3-bar-item">
                  <button type="button" class="w3-button w3-white w3-border w3-border-grey" onclick="decrementQuantity(this)">-</button>
                </div>
                <div class="w3-bar-item w3-center w3-black">
                  <span id="quantity-<?php echo $product['id_produit']; ?>">1</span>
                </div>
                <div class="w3-bar-item">
                  <button type="button" class="w3-button w3-white w3-border w3-border-grey" onclick="incrementQuantity(this)">+</button>
                </div>
              </div>
              <p>
                <input type="hidden" name="quantity" id="quantity-<?php echo $product['id_produit']; ?>-input" value="1" />
                <button class="w3-button w3-light-grey w3-block" type="submit">Ajouter au panier</button>
              </p>
            </form>
          </div>
        </div>

      <?php
        $count++;
        // Start a new row after every fourth product for large screens
        if ($count % 4 === 0) {
          echo '</div><div class="w3-row-padding w3-grayscale">';
        }
      }
      ?>
    </div>

    <!-- Contact Section -->

    <!-- Image of location/map -->
    <div class="w3-container">
      <img src="images/5.jpg" class="w3-image" style="width: 100%" />
    </div>

    <!-- End page content -->
  </div>

  <!-- Footer -->
  <footer class="w3-center w3-black w3-padding-16">
    <p>AdventureHub - conseils et actualités</p>
  </footer>
  <script src="script/boutique-user.js"></script>
</body>

</html>