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
            $commandes = [];
            foreach ($liste as $row) {
                $commande = [
                    'id' => $row['id'],
                    'date' => DateTime::createFromFormat('Y-m-d', $row['date']), // Assuming 'Y-m-d' format (adjust as needed)
                    'prix_total' => $row['prix_total'], // No conversion for prix_total (assuming numerical)
                    'adresse_livraison' => $row['adresse_livraison'], // No conversion for adresse_livraison (assuming string)
                ];
                $commandes[] = $commande;
            }
            return $commandes;
        } catch (Exception $e) {
            // Improved error handling (as suggested previously)
            return "Error: Database query failed - " . $e->getMessage();
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

    function deleteCommande($id)
    {
        $sql = "DELETE FROM commande WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}
