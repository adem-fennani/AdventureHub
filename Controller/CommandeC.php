<?php

include '../config.php';
include '../Model/Commande.php'; // Assuming your model class is named Commande.php

class CommandeC
{

  public function listCommandes()
  {
    $sql = "SELECT * FROM commande";
    $db = config::getConnexion();
    try {
      $liste = $db->query($sql);
      return $liste;
    } catch (Exception $e) {
      // Improve error handling (e.g., return specific error message)
      die('Error:' . $e->getMessage());
    }
  }

  public function addCommande(Commande $commande)
  {
    // Update SQL query to match your table schema
    $sql = "INSERT INTO commande (id, date, prix_total, adresse_livraison)
            VALUES (:id, :date, :prix_total, :adresse_livraison)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);

      // Remove unnecessary bindings
      $query->execute([
        ':id' => $commande->getId(), // Assuming you have an 'id' getter in Commande.php
        ':date' => $commande->getDate()->format('Y-m-d'), // Assuming 'date' getter
        ':prix_total' => $commande->getPrixTotal(), // Assuming 'prix_total' getter
        ':adresse_livraison' => $commande->getAdresseLivraison(), // Assuming 'adresseLivraison' getter (adjusted casing)
      ]);

      // Redirect to success page or display confirmation message (optional)
      header('Location: add.php'); // Assuming success page
    } catch (Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
  }

  // Additional methods for deleteCommande and updateCommande (optional)
  // ... (implement similar logic as in EmployeC.php for deleting and updating commandes)
}
