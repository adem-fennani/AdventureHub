<?php

include '../config.php';
include '../Model/Commande.php';
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
                    'date' => DateTime::createFromFormat('Y-m-d', $row['date']),
                    'prix_total' => $row['prix_total'],
                    'adresse_livraison' => $row['adresse_livraison'],
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
                ':id' => $commande->getId(),
                ':date' => $commande->getDate()->format('Y-m-d'),
                ':prix_total' => $commande->getPrixTotal(),
                ':adresse_livraison' => $commande->getAdresseLivraison(),
            ]);


            header('Location: add.php');
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

    public function updateCommande($commande, $id)
    {
        // Database connection (replace with your connection details)
        $conn = new PDO("mysql:host=localhost;dbname=adventurehub", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            // Prepare SQL statement with placeholders for security
            $sql = "UPDATE commande SET prix_total = ?, adresse_livraison = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);

            // Bind values to placeholders
            $stmt->bindValue(1, $commande['prix_total'], PDO::PARAM_INT);
            $stmt->bindValue(2, $commande['adresse_livraison'], PDO::PARAM_STR);
            $stmt->bindValue(3, $id, PDO::PARAM_INT);

            // Execute the update query
            $stmt->execute();

            echo "Commande updated successfully!";
        } catch (PDOException $e) {
            echo "Error updating commande: " . $e->getMessage();
        }

        $conn = null; // Close connection
    }


    public function getCommandeById($id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare('SELECT * FROM commande WHERE id = :id');
            $query->execute(['id' => $id]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;  
        }
    }
}
