<?php
class Categorie
{
    private ?int $id_categorie = null;
    private ?string $nom = null;
    private ?string $description = null;

    public function __construct(?int $id_categorie = null, ?string $nom = null, ?string $description = null)
    {
        $this->id_categorie = $id_categorie;
        $this->nom = $nom;
        $this->description = $description;
    }

    public function getIdCategorie(): ?int
    {
        return $this->id_categorie;
    }

    public function setIdCategorie(?int $id_categorie): self
    {
        $this->id_categorie = $id_categorie;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    // CRUD

    public function addCategorie($categorie)
    {
        $sql = "INSERT INTO categorie VALUES (null, :nom, :description)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $categorie->getNom(),
                'description' => $categorie->getDescription(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listCategories()
    {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteCategorie($id_categorie)
    {
        $sql = "DELETE FROM categorie WHERE id_categorie = :id_categorie";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_categorie', $id_categorie);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    /* 
    public function updateCategorie($categorie)
    {
        $sql = "UPDATE categorie SET nom = :nom, description = :description WHERE id_categorie = :id_categorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_categorie' => $categorie->getIdCategorie(),
                'nom' => $categorie->getNom(),
                'description' => $categorie->getDescription(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    */

    public function getAllCategories()
    {
        $sql = "SELECT id_categorie, nom_categorie AS nom FROM categorie";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    public function getCategorieDetails($id_categorie)
    {
        $sql = "SELECT * FROM categorie WHERE id_categorie = :id_categorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id_categorie', $id_categorie);
            $query->execute();
            return $query->fetch(); // Return category details as an associative array
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }
}
