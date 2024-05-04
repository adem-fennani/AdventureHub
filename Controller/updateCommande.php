<?php
require_once('../config.php');
require_once('../Model/Commande.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}
