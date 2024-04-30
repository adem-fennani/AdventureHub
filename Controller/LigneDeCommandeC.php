<?php

class LigneDeCommandeController
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Replace existing implementation (ensure it returns an array of line items)
    public function getAllLigneDeCommandes(): array
    {
        $lignes = [];  // Initialize an empty array to store line items

        try {
            $sql = "SELECT * FROM ligne_de_commande";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $lignes = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch all results as associative arrays
        } catch (PDOException $e) {
            error_log("Error fetching ligne_de_commandes: " . $e->getMessage());
            // Handle error (e.g., return an empty array or throw an exception)
        }

        return $lignes;
    }

    public function getLigneDeCommandeById(int $id): array
    {
        try {
            $sql = "SELECT * FROM ligne_de_commande WHERE id_ligne = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $ligne = $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch single result as associative array

            if ($ligne === false) {
                return [];  // Return empty array if no line item found
            }

            return $ligne;
        } catch (PDOException $e) {
            error_log("Error fetching ligne_de_commande by ID: " . $e->getMessage());
            // Handle error (e.g., return an empty array or throw an exception)
        }

        return [];  // Default return an empty array for clarity
    }

    // ... other methods (create, update, delete) ...

    public function createLigneDeCommande(int $idProduit, int $quantite, float $prixLigne): bool
    {
        $ligne = new LigneDeCommande(null, $idProduit, $quantite, $prixLigne, $this->pdo);
        return $ligne->save();
    }

    public function updateLigneDeCommande(int $idLigne, int $idProduit, int $quantite, float $prixLigne): bool
    {
        $ligne = new LigneDeCommande($idLigne, $idProduit, $quantite, $prixLigne, $this->pdo);
        return $ligne->save();  // Can be used for both update and create (if ID is null)
    }

    public function deleteLigneDeCommande(int $idLigne, int $idProduit, int $quantite, float $prixLigne): bool
    {
        $ligne = new LigneDeCommande($idLigne, $idProduit, $quantite, $prixLigne);
        $ligne->setPDO($this->pdo);
        return $ligne->delete();
    }
}
