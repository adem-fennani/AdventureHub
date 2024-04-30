<?php

class LigneDeCommande
{

  // Define private properties for your ligne_de_commande data
  private ?int $idLigne = null;
  private int $idProduit;
  private int $quantite;
  private float $prixLigne;
  private ?PDO $pdo = null;  // Optional PDO dependency for future use

  // Constructor to initialize the object (optional)
  public function __construct(
    ?int $idLigne = null,
    int $idProduit,
    int $quantite,
    float $prixLigne,
    ?PDO $pdo = null
  ) {
    $this->idLigne = $idLigne;
    $this->idProduit = $idProduit;
    $this->quantite = $quantite;
    $this->prixLigne = $prixLigne;
    $this->pdo = $pdo;  // Optional PDO injection
  }

  // Getter methods to access private properties
  public function getIdLigne(): ?int
  {
    return $this->idLigne;
  }

  public function getIdProduit(): int
  {
    return $this->idProduit;
  }

  public function getQuantite(): int
  {
    return $this->quantite;
  }

  public function getPrixLigne(): float
  {
    return $this->prixLigne;
  }

  // Setter methods to modify private properties (optional)
  public function setIdProduit(int $idProduit)
  {
    $this->idProduit = $idProduit;
  }

  public function setQuantite(int $quantite)
  {
    $this->quantite = $quantite;
  }

  public function setPrixLigne(float $prixLigne)
  {
    $this->prixLigne = $prixLigne;
  }

  // Method to inject PDO dependency (optional)
  public function setPDO(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function save(): bool
  {
    try {
      $sql = "INSERT INTO ligne_de_commande (id_produit, quantite, prix_ligne) VALUES (:id_produit, :quantite, :prix_ligne)";
      if ($this->idLigne !== null) {
        $sql = "UPDATE ligne_de_commande SET id_produit = :id_produit, quantite = :quantite, prix_ligne = :prix_ligne WHERE id_ligne = :id_ligne";
      }

      $stmt = $this->pdo->prepare($sql);

      $stmt->bindParam(':id_produit', $this->idProduit, PDO::PARAM_INT);
      $stmt->bindParam(':quantite', $this->quantite, PDO::PARAM_INT);
      $stmt->bindParam(':prix_ligne', $this->prixLigne, PDO::PARAM_STR);

      if ($this->idLigne !== null) {
        $stmt->bindParam(':id_ligne', $this->idLigne, PDO::PARAM_INT);
      }

      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      error_log("Error saving ligne_de_commande: "  . $e->getMessage());
      throw new Exception("Failed to save ligne_de_commande: " . $e->getMessage());
    }

    return false;
  }

  public function delete(): bool
  {
    try {
      if ($this->idLigne === null) {
        throw new Exception("Ligne de commande ID not available for deletion");
      }

      $sql = "DELETE FROM ligne_de_commande WHERE id_ligne = :id_ligne";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindParam(':id_ligne', $this->idLigne, PDO::PARAM_INT);

      $stmt->execute();

      return true;
    } catch (PDOException $e) {
      error_log("Error deleting ligne_de_commande: " . $e->getMessage());
      throw new Exception("Failed to delete ligne_de_commande: " . $e->getMessage());
    }

    return false;
  }

  public static function getLigneDeCommandeById(PDO $pdo, int $id): array
  {
    try {
      $sql = "SELECT * FROM ligne_de_commande WHERE id_ligne = :id";
      $stmt = $pdo->prepare($sql);

      $stmt->bindParam(':id', $id, PDO::PARAM_INT);

      $stmt->execute();

      $ligne = $stmt->fetch(PDO::FETCH_ASSOC);

      return $ligne;
    } catch (PDOException $e) {
      error_log("Error fetching ligne_de_commande by ID: " . $e->getMessage());
      throw new Exception("Failed to fetch ligne_de_commande by ID: " . $e->getMessage());
    }

    return [];
  }
}
