<?php
include '../config.php';
include '../Model/Reclamation.php';

class ReclamationC
{
    function listFeedbacksSortedByOption($sortOption)
    {
    $sql = "SELECT * FROM reclamation";

    switch ($sortOption) {
        case 'publicationDate_DESC':
            $sql .= " ORDER BY publicationDate DESC"; // Tri par date décroissante
            break;
        case 'publicationDate_ASC':
            $sql .= " ORDER BY publicationDate ASC"; // Tri par date croissante
            break;
        // Ajoutez d'autres cas pour les autres options de tri si nécessaire
    }

    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $f) {
        die('Error:' . $f->getMessage());
    }
    }

    public function ListReclamation()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteReclamation($id)
    {
        $sql = "DELETE FROM reclamation WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation  
        VALUES (NULL, :fn,:ln, :em,:dob)";
        $db = config::getConnexion();
        try {
            print_r($reclamation->getDate_rec()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $reclamation->getFirstName(),
                'ln' => $reclamation->getLastName(),
                'em' => $reclamation->getContenu(),
                'dob' => $reclamation->getDate_rec()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateReclamation($reclamation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    firstName = :firstName, 
                    lastName = :lastName, 
                    contenu = :contenu, 
                    Date_rec = :Date_rec,
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'firstName' => $reclamation->getFirstName(),
                'lastName' => $reclamation->getLastName(),
                'contenu' => $reclamation->getContenu(),
                'Date_rec' => $reclamation->getDate_rec()->format('Y/m/d')
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

}