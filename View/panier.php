<?php
// Retrieve and display the added line from the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../config.php');
    require_once('../Model/LigneDeCommande.php');
    require_once('../Model/Produit.php');

    // Retrieve product ID and quantity from the form
    $idProduit = $_POST["idProduit"];
    $quantity = $_POST["quantity"];

    // Get PDO connection
    $pdo = config::getConnexion();

    // Instantiate Produit model
    $produit = new Produit($pdo);

    // Retrieve product details
    $product = $produit->getProduitById($idProduit);

    // Calculate line price
    $prixLigne = $product['prix_unitaire'] * $quantity;

    // Instantiate LigneDeCommande model
    $ligneDeCommande = new LigneDeCommande($pdo);

    // Add the line to the database
    $ligneDeCommande->addLine($idProduit, $quantity, $prixLigne);
    // Initialize variables
    $adresseLivraison = $adresseLivraisonErr = "";
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Panier</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" />
        <link rel="stylesheet" href="style/boutique-user.css" />
        <link rel="icon" href="images/logo.png" type="image/png" />
    </head>

    <body>

        <!-- Navbar (sit on top) -->
        <div class="w3-top">
            <div class="w3-bar w3-white w3-wide w3-padding w3-card">
                <a href="#home" class="w3-bar-item w3-button">
                    <img src="images/logo.png" alt="AdventureHub logo" width="40px" />
                    AdventureHub
                </a>
                <!-- Float links to the right. Hide them on small screens -->
                <div class="w3-right w3-hide-small">
                    <a href="boutique-user.html" class="w3-bar-item w3-button">Retour</a>
                </div>
            </div>
        </div>

        <h2 class='w3-center'>Panier</h2>

        <div class='w3-container'>
            <table class='w3-table-all'>
                <thead>
                    <tr class='w3-blue'>
                        <th class='w3-center'>Produit</th>
                        <th class='w3-center'>Quantité</th>
                        <th class='w3-center'>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='w3-center'><?php echo $product['titre_produit']; ?></td>
                        <td class='w3-center'><?php echo $quantity; ?></td>
                        <td class='w3-center'><?php echo $prixLigne . ".000 DT"; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Text input for adresse_livraison -->
        <div class="w3-container" style="margin-top: 20px;">
            <form id="commandeForm" action="../Controller/CommandeC.php" method="post" onsubmit="return validateForm()">
                <label for="adresse_livraison" style="display: block;">Adresse de livraison:</label>
                <input type="text" id="adresse_livraison" name="adresse_livraison" value="<?php echo $adresseLivraison; ?>">
                <span id="adresse_livraison_error" style="color: red;"></span>
                <input type="hidden" name="idLigne" value="<?php echo $ligneDeCommande->getLastInsertId(); ?>">
                <input type="hidden" name="prixLigne" value="<?php echo $prixLigne; ?>">
                <button type="submit" class="w3-button w3-light-grey">Commander</button>
            </form>
        </div>


        <div style="text-align: center; margin-top: 50px;">
            <img src="images/cart.png" alt="Shopping Cart Image" width="100" height="80" />
        </div>
        <script src="script/panier.js"></script>
    </body>

    </html>

<?php
}
?>