<?php

class Produit
{
    private $db;
    private $id_produit;
    private $titre_produit;
    private $prix_unitaire;
    private $image_produit;
    private $description_produit;
    private $quantite_produit;
    private $id_categorie;

    public function __construct($db, $id_produit = null, $titre_produit = null, $prix_unitaire = null, $image_produit = null, $description_produit = null, $quantite_produit = null, $id_categorie = null)
    {
        $this->db = $db;
        $this->id_produit = $id_produit;
        $this->titre_produit = $titre_produit;
        $this->prix_unitaire = $prix_unitaire;
        $this->image_produit = $image_produit;
        $this->description_produit = $description_produit;
        $this->quantite_produit = $quantite_produit;
        $this->id_categorie = $id_categorie;
    }

    // Getters
    public function getIdProduit()
    {
        return $this->id_produit;
    }

    public function getTitreProduit()
    {
        return $this->titre_produit;
    }

    public function getPrixUnitaire()
    {
        return $this->prix_unitaire;
    }

    public function getImageProduit()
    {
        return $this->image_produit;
    }

    public function getDescriptionProduit()
    {
        return $this->description_produit;
    }

    public function getQuantiteProduit()
    {
        return $this->quantite_produit;
    }

    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    // Setters

    public function setIdProduit($id_produit)
    {
        $this->id_produit = $id_produit;
    }

    public function setTitreProduit($titre_produit)
    {
        $this->titre_produit = $titre_produit;
    }

    public function setPrixUnitaire($prix_unitaire)
    {
        $this->prix_unitaire = $prix_unitaire;
    }

    public function setImageProduit($image_produit)
    {
        $this->image_produit = $image_produit;
    }

    public function setDescriptionProduit($description_produit)
    {
        $this->description_produit = $description_produit;
    }

    public function setQuantiteProduit($quantite_produit)
    {
        $this->quantite_produit = $quantite_produit;
    }

    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    // Other methods

    // Get all produits
    public function getAllProduits()
    {
        $query = "SELECT * FROM produit";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduitById($id)
    {
        $sql = "SELECT * FROM produit WHERE id_produit = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listProduits()
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    // Delete produit by id
    public function deleteProduit($id)
    {
        // If no related records exist, proceed with the deletion
        $sql = "DELETE FROM produit WHERE id_produit = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception('Error deleting product: ' . $e->getMessage());
        }
    }

    public function addProduit($produit)
    {
        $sql = "INSERT INTO produit (titre_produit, prix_unitaire, image_produit, description_produit, quantite_produit, id_categorie) VALUES (:titre, :prix, :image, :description, :quantite, :id_categorie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $produit->getTitreProduit(),
                'prix' => $produit->getPrixUnitaire(),
                'image' => $produit->getImageProduit(),
                'description' => $produit->getDescriptionProduit(),
                'quantite' => $produit->getQuantiteProduit(),
                'id_categorie' => $produit->getIdCategorie()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateProduit($produit, $id)
    {
        try {
            $db = config::getConnexion();

            $query = $db->prepare(
                'UPDATE produit SET
                    prix = :prix, 
                    titre = :titre, 
                    quantite = :quantite, 
                    description = :description, 
                    image = :image
                WHERE id = :id'
            );

            $query->bindParam(':id', $id);
            $query->bindParam(':prix', $produit->getPrixProduit());
            $query->bindParam(':titre', $produit->getTitreProduit());
            $query->bindParam(':quantite', $produit->getQuantiteProduit());
            $query->bindParam(':description', $produit->getDescriptionProduit());
            $query->bindParam(':image', $produit->getImageProduit());

            $query->execute();

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function showProduit($id)
    {
        $sql = "SELECT * from produit where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $produit = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function searchProduits($titre)
    {
        $sql = "SELECT * FROM produit WHERE titre LIKE :titre";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':titre', "%$titre%");
            $query->execute();
            $produit = $query->fetchAll(PDO::FETCH_ASSOC); // Fetch associative array
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
