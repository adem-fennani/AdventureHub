<?php
include '../config.php';
include '../Model/Reclamation.php';

class ReclamationC
{
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
                Date_rec = :Date_rec
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
        echo'Error' . $e->getMessage();
    }
}

    function showReclamation($id)
    {
        $sql = "SELECT * from Reclamation where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function exportReclamationToCSV()
    {
        // Fetch reclamation data
        $reclamations = $this->listReclamation()->fetchAll(PDO::FETCH_ASSOC);

        // Define CSV file path
        $csvFilePath = 'reclamations.csv';

        // Open file for writing
        $file = fopen($csvFilePath, 'w');

        // Write CSV headers
        fputcsv($file, array_keys($reclamations[0]));

        // Write reclamation data to CSV
        foreach ($reclamations as $reclamation) {
            fputcsv($file, $reclamation);
        }

        // Close the file
        fclose($file);

        // Return CSV file path
        return $csvFilePath;
    }
    
   /* public function calculateStatistics() {
        // Retrieve reclamations from the database
        $stmt = $this->ListReclamation();
        $reclamations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Initialize statistics array
        $statistics = array(
            'totalReclamations' => count($reclamations),
            'totalViews' => 0,
            'totalComments' => 0,
            'totalContributors' => 0
        );
    
        // Calculate total views, comments, and contributors
        foreach ($reclamations as $reclamation) {
            $statistics['totalViews'] += $reclamation['views'];
            $statistics['totalComments'] += $reclamation['comments'];
            $statistics['totalContributors'] += $reclamation['contributors'];
        }
    
        return $statistics;*/
    }
    
    
    



