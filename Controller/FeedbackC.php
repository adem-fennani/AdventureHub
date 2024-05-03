<?php
include '../config.php';
include '../Model/feedback.php';

class FeedbackC
{
    public function listFeedbacks()
    {
        $sql = "SELECT * FROM feedback ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $f) {
            die('Error:' . $f->getMessage());
        }
    }

    function deleteFeedback($id)
    {
        $sql = "DELETE FROM feedback WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $f) {
            die('Error:' . $f->getMessage());
        }
    }

    function addFeedback($feedback)
    {
        $sql = "INSERT INTO feedback  
        VALUES (NULL, :ide, :idu, :c, :dp)";
        $db = config::getConnexion();
        try {
            print_r($feedback->getpublicationDate()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
            'ide' => $feedback->getIde(),
            'idu' => $feedback->getIdu(),
            'c' => $feedback->getContenu(),
            'dp' =>$feedback ->getpublicationDate()->format('Y/m/d')
            
            ]);
        } catch (Exception $f) {
            echo 'Error: ' . $f->getMessage();
        }
    }
    function updateFeedback($feedback, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE feedback SET 
                ide = :ide,
                idu = :idu,
                contenu = :contenu,
                publicationDate = :publicationDate

                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'ide' => $feedback->getIde(),
                'idu' => $feedback->getIdu(),
                'contenu' => $feedback->getContenu(),
                'publicationDate' => $feedback ->getpublicationDate()->format('Y/m/d'),

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $f) {
            $f->getMessage();
            
        }
    }

    function showFeedback($id)
    {
        $sql = "SELECT * from feedback where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $feedback = $query->fetch();
            return $feedback;
        } catch (Exception $f) {
            die('Error: ' . $f->getMessage());
        }
    }
    function listFeedbacksSortedByOption($sortOption)
    {
    $sql = "SELECT * FROM feedback";

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

    //recherche
    function getFeedbackById($id)
    {
        $sql = "SELECT * FROM feedback WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();

            $feedback = $query->fetch();
            return $feedback;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
