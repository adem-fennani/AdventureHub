<?php

class Produit
{

    private $db;
    private $id_produit;
    private $titre_produit;
    private $prix_unitaire;

    public function __construct($db, $id_produit = null, $titre_produit = null, $prix_unitaire = null)
    {
        $this->db = $db;
        $this->id_produit = $id_produit;
        $this->titre_produit = $titre_produit;
        $this->prix_unitaire = $prix_unitaire;
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

    public function getProduitById($id_produit)
    {
        $query = "SELECT * FROM produit WHERE id_produit = :id_produit";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id_produit", $id_produit);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllProduits()
    {
        $query = "SELECT * FROM produit";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
