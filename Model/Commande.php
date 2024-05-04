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
        // Check if a status filter is set
        $filter = isset($_POST['status_filter']) ? $_POST['status_filter'] : '';

        // Form for selecting status filter
        echo "<form method='POST' action='#'>";
        echo "<input type='radio' id='tous' name='status_filter' value='tous' ";
        if ($filter == 'tous') echo "checked";
        echo "><label for='tous'>Tous</label>";
        echo "<input type='radio' id='non_traite' name='status_filter' value='Non traité' ";
        if ($filter == 'Non traité') echo "checked";
        echo "><label for='non_traite'>Non traité</label>";
        echo "<input type='radio' id='en_traitement' name='status_filter' value='En cours de traitement' ";
        if ($filter == 'En cours de traitement') echo "checked";
        echo "><label for='en_traitement'>En cours de traitement</label>";
        echo "<input type='radio' id='delivre' name='status_filter' value='Délivré' ";
        if ($filter == 'Délivré') echo "checked";
        echo "><label for='delivre'>Délivré</label>";
        echo "<button type='submit'>Filter</button>";
        echo "</form>";

        // Adjust the SQL query based on the selected filter
        $query = "SELECT * FROM commande";
        if (!empty($filter) && $filter != 'tous') {
            $query .= " WHERE statut_commande = :statut_commande";
        }

        $stmt = $this->db->prepare($query);
        if (!empty($filter) && $filter != 'tous') {
            $stmt->bindParam(":statut_commande", $filter);
        }
        $stmt->execute();
        $commandes = $stmt->fetchAll();

        // Display commandes
        foreach ($commandes as $commande) {
            echo "<tr>";
            echo "<td>" . $commande['id_commande'] . "</td>";
            echo "<td>" . $commande['id_ligne'] . "</td>";
            echo "<td>" . $commande['prix_commande'] . "</td>";
            echo "<td>" . $commande['statut_commande'] . "</td>";
            echo "<td>" . $commande['adresse_livraison'] . "</td>";
            echo "<td>
            <form method='POST' action='../Controller/deleteCommandeAdmin.php'>
                <input type='hidden' name='id_commande' value='" . $commande['id_commande'] . "'>
                <button type='submit' name='delete_commande'>Delete</button>
            </form>
          </td>";
            echo "<td>
            <form method='POST' action='../Controller/updateCommande.php'>
                <input type='hidden' name='id_commande' value='" . $commande['id_commande'] . "'>
                <button type='submit' name='update'>Update</button>
            </form>
          </td>";
            echo "</tr>";
        }
    }

    public function displayCommandeUser()
    {
        // Adjust the SQL query to fetch only commandes with "statut_commande" equals to "Non traité"
        $query = "SELECT * FROM commande WHERE statut_commande = 'Non traité'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $commandes = $stmt->fetchAll();

        // Display commandes for the user
        foreach ($commandes as $commande) {
            echo "<div class='w3-panel'>";
            echo "<div class='w3-row-padding' style='margin: 0 -16px'>";
            echo "<div class='w3-twothird'>";
            echo "<table class='w3-table w3-striped w3-white'>";
            echo "<thead>";
            echo "<tr class='w3-blue'>";
            echo "<th>ID</th>";
            echo "<th>Prix</th>";
            echo "<th>Statut</th>";
            echo "<th>Adresse de livraison</th>";
            echo "<th></th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td>" . $commande['id_commande'] . "</td>";
            echo "<td>" . $commande['prix_commande'] . ".000 DT</td>";
            echo "<td>" . $commande['statut_commande'] . "</td>";
            echo "<td>" . $commande['adresse_livraison'] . "</td>";
            echo "<td>
            <form method='POST' action='../Controller/deleteCommandeUser.php'>
                <input type='hidden' name='id_commande' value='" . $commande['id_commande'] . "'>
                <button type='submit' name='delete_commande'>Delete</button>
            </form>
            </td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }



    public function deleteCommande($id_commande)
    {
        $query = "DELETE FROM commande WHERE id_commande = :id_commande";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id_commande", $id_commande);
        $stmt->execute();
    }

    public function updateCommandeAdmin($id_commande, $new_statut)
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
