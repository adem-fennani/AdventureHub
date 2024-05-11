<?php
require_once('../config.php');
require_once('../Model/Commande.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update
    if (isset($_POST["update"])) {
        // Retrieve data from the form
        $id_commande = $_POST["id_commande"];

        // Get PDO connection
        $pdo = config::getConnexion();

        // Instantiate Commande model
        $commande = new Commande($pdo);

        // Get the current statut_commande
        $current_statut = $commande->getCommandeStatut($id_commande);

        // Update the statut_commande based on the current value
        $new_statut = $commande->updateCommandeStatut($current_statut);

        // Update the commande in the database
        $commande->updateCommandeAdmin($id_commande, $new_statut);

        // Redirect back to the page
        header("Location: ../View/boutique-admin.php");
        exit();
    }

    // Delete Commande (front-office)
    if (isset($_POST['delete_commande_user'])) {
        $id_commande = $_POST['id_commande'];

        // Get PDO connection
        $pdo = config::getConnexion();

        // Instantiate Commande model
        $commande = new Commande($pdo);

        // Delete the commande
        $commande->deleteCommande($id_commande);

        // Redirect to a confirmation page or back to the boutique-admin.php page
        header("Location: ../View/mes-commandes.php");
        exit();
    }

    // Delete commande (back-office)
    if (isset($_POST['delete_commande_admin'])) {
        $id_commande = $_POST['id_commande'];

        // Get PDO connection
        $pdo = config::getConnexion();

        // Instantiate Commande model
        $commande = new Commande($pdo);

        // Delete the commande
        $commande->deleteCommande($id_commande);

        // Redirect to a confirmation page or back to the boutique-admin.php page
        header("Location: ../View/boutique-admin.php");
        exit();
    }

    // Add commande
    if (isset($_POST["idLigne"]) && isset($_POST["prixLigne"]) && isset($_POST["adresse_livraison"])) {
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
}
