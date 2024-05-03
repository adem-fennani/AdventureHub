<?php
// CommandeModel.php

class Commande
{
    private $db;
    private $id_commande;
    private $id_ligne;
    private $prix_commande;
    private $statut_commande;

    public function __construct($db, $id_commande = null, $id_ligne = null, $prix_commande = null, $statut_commande = null)
    {
        $this->db = $db;
        $this->id_commande = $id_commande;
        $this->id_ligne = $id_ligne;
        $this->prix_commande = $prix_commande;
        $this->statut_commande = $statut_commande;
    }

    // Getters
    public function getIdCommande()
    {
        return $this->id_commande;
    }

    public function getIdLigne()
    {
        return $this->id_ligne;
    }

    public function getPrixCommande()
    {
        return $this->prix_commande;
    }

    public function getStatutCommande()
    {
        return $this->statut_commande;
    }

    // Setters
    public function setIdCommande($id_commande)
    {
        $this->id_commande = $id_commande;
    }

    public function setIdLigne($id_ligne)
    {
        $this->id_ligne = $id_ligne;
    }

    public function setPrixCommande($prix_commande)
    {
        $this->prix_commande = $prix_commande;
    }

    public function setStatutCommande($statut_commande)
    {
        $this->statut_commande = $statut_commande;
    }

    // Method to add a commande to the database
    public function addCommande($idLigne, $prixCommande, $statutCommande, $adresseLivraison)
    {
        $query = "INSERT INTO commande (id_ligne, prix_commande, statut_commande, adresse_livraison) 
                  VALUES (:id_ligne, :prix_commande, :statut_commande, :adresse_livraison)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id_ligne", $idLigne);
        $stmt->bindParam(":prix_commande", $prixCommande);
        $stmt->bindParam(":statut_commande", $statutCommande);
        $stmt->bindParam(":adresse_livraison", $adresseLivraison);
        $stmt->execute();
    }
    // Method to display all commandes from the database
    public function displayCommandeAdmin()
    {
        $query = "SELECT * FROM commande";
        $stmt = $this->db->query($query);
        $commandes = $stmt->fetchAll();
        foreach ($commandes as $commande) {
            echo "<tr>";
            echo "<td>" . $commande['id_commande'] . "</td>";
            echo "<td>" . $commande['id_ligne'] . "</td>";
            echo "<td>" . $commande['prix_commande'] . "</td>";
            echo "<td>" . $commande['statut_commande'] . "</td>";
            echo "<td>" . $commande['adresse_livraison'] . "</td>";
            echo "<td><button type='submit' name='delete' value='" . $commande['id_commande'] . "'>Delete</button></td>";
            echo "<td>
                    <form method='POST' action='../Controller/updateCommande.php'>
                        <input type='hidden' name='id_commande' value='" . $commande['id_commande'] . "'>
                        <button type='submit' name='update'>Update</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
    }


    public function deleteCommande($id_commande)
    {
        $query = "DELETE FROM commande WHERE id_commande = :id_commande";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id_commande", $id_commande);
        $stmt->execute();
    }

    public function updateCommande($id_commande, $new_statut)
    {
        // Prepare the update query
        $query = "UPDATE commande SET statut_commande = :new_statut WHERE id_commande = :id_commande";

        // Prepare the statement
        $stmt = $this->db->prepare($query);

        // Bind parameters
        $stmt->bindParam(':new_statut', $new_statut, PDO::PARAM_STR);
        $stmt->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);

        // Execute the statement
        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }

    public function getCommandeStatut($id_commande)
    {
        $query = "SELECT statut_commande FROM commande WHERE id_commande = :id_commande";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id_commande' => $id_commande]);
        $result = $stmt->fetch();
        return $result['statut_commande'];
    }

    public function updateCommandeStatut($current_statut)
    {
        switch ($current_statut) {
            case 'Non traité':
                return 'En cours de traitement';
                break;
            case 'En cours de traitement':
                return 'Délivré';
                break;
            case 'Délivré':
                return 'Non traité';
                break;
            default:
                return 'Non traité'; // Default to "Non traité" if the current status is invalid
                break;
        }
    }
}
