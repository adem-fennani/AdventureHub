<?php
require_once('../config.php');
require_once('../Model/Commande.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $idLigne = $_POST["idLigne"];
    $prixLigne = $_POST["prixLigne"];
    $adresseLivraison = $_POST["adresse_livraison"];

    // Calculate prix_commande (assuming it's the same as prix_ligne for now)
    $prixCommande = $prixLigne;

    // Initialize statut_commande to "Non traité"
    $statutCommande = "Non traité";

    // Get PDO connection
    $pdo = config::getConnexion();

    // Instantiate Commande model
    $commande = new Commande($pdo);

    // Add the command to the database
    $commande->addCommande($idLigne, $prixCommande, $statutCommande, $adresseLivraison);

    // Redirect to a confirmation page or back to the boutique-user.html page
    header("Location: ../View/boutique-user.html");
    exit();
}
