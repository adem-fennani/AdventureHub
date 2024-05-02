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
}
