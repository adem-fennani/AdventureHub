<?php
require_once('../config.php');
require_once('../Model/Commande.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_commande'])) {
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
}
