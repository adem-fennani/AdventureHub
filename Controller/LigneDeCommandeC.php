<?php
require_once('../config.php');
require_once('../Model/LigneDeCommande.php');
require_once('../Model/Produit.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product ID from the form
    $idProduit = $_POST["idProduit"];

    // Retrieve the quantity from the form (considering the form field name)
    $quantity = $_POST["quantity"];  // This will retrieve the value from the specific hidden input field based on the form it belongs to (e.g., quantity-backpack or quantity-fedora)
    echo "Received quantity: " . $quantity;

    // Ensure quantity is a valid number
    if (!is_numeric($quantity) || $quantity <= 0) {
        die("Invalid quantity value.");
    }

    try {
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

        echo " Line added successfully.";
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
