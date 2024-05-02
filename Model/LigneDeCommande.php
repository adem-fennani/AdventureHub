<?php

class LigneDeCommande
{
    private $db;
    private $id_ligne;
    private $id_produit;
    private $quantite;
    private $prix_ligne;

    public function __construct($db, $id_ligne = null, $id_produit = null, $quantite = null, $prix_ligne = null)
    {
        $this->db = $db;
        $this->id_ligne = $id_ligne;
        $this->id_produit = $id_produit;
        $this->quantite = $quantite;
        $this->prix_ligne = $prix_ligne;
    }

    // Getters
    public function getIdLigne()
    {
        return $this->id_ligne;
    }

    public function getIdProduit()
    {
        return $this->id_produit;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function getPrixLigne()
    {
        return $this->prix_ligne;
    }

    // Setters
    public function setIdLigne($id_ligne)
    {
        $this->id_ligne = $id_ligne;
    }

    public function setIdProduit($id_produit)
    {
        $this->id_produit = $id_produit;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    public function setPrixLigne($prix_ligne)
    {
        $this->prix_ligne = $prix_ligne;
    }

    public function addLine($id_produit, $quantite, $prix_ligne)
    {
        $query = "INSERT INTO ligne_de_commande (id_produit, quantite, prix_ligne) VALUES (:id_produit, :quantite, :prix_ligne)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id_produit", $id_produit);
        $stmt->bindParam(":quantite", $quantite);
        $stmt->bindParam(":prix_ligne", $prix_ligne);
        $stmt->execute();
    }
}
