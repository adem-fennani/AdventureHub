<?php

class Commande
{

    // Define private properties for your commande data
    private ?int $id = null;
    private ?DateTime $date = null;
    private ?float $prixTotal = null;
    private ?string $adresseLivraison = null;

    // Constructor to initialize the object (optional)
    public function __construct(
        ?int $id = null,
        ?DateTime $date = null,
        ?float $prixTotal = null,
        ?string $adresseLivraison = null
    ) {
        $this->id = $id;
        $this->date = $date;
        $this->prixTotal = $prixTotal;
        $this->adresseLivraison = $adresseLivraison;
    }

    // Getter methods to access private properties
    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    public function getAdresseLivraison()
    {
        return $this->adresseLivraison;
    }

    // Setter methods to modify private properties (optional)
    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }

    public function setPrixTotal(float $prixTotal)
    {
        $this->prixTotal = $prixTotal;
    }

    public function setAdresseLivraison(string $adresseLivraison)
    {
        $this->adresseLivraison = $adresseLivraison;
    }
}
