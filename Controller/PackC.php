<?php
include '../config.php';
include '../Model/Pack.php';

class PackC
{
    public function listPack()
    {
        $sql = "SELECT * FROM pack";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletePack($id)
    {
        $sql = "DELETE FROM pack WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addPack($pack)
    {
        $sql = "INSERT INTO pack  
        VALUES (NULL,:r, :fn,:ln, :em,:dob)";
        $db = config::getConnexion();
        try {
            print_r($pack->getdate_dep()->format('Y-m-d'));
            print_r($pack->getdate_arri()->format('Y-m-d'));

            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $pack->getdescription(),
                'r' => $pack->getid_reclamation(),
                'ln' => $pack->getdate_dep()->format('Y/m/d'),
                'em' => $pack->getdate_arri()->format('Y/m/d'),
                'dob' => $pack->gethotel_name(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatePack($pack, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE pack SET 
                id_reclamation = :id_reclamation,
                description = :description, 
                date_dep = :date_dep, 
                date_arri = :date_arri, 
                hotel_name = :hotel_name
            WHERE id = :id'
        );
        $query->execute([
            'id' => $id,
            'id_reclamation' => $pack->getid_reclamation(),
            'description' => $pack->getdescription(),
            'date_dep' => $pack->getdate_dep()->format('Y/m/d'),
            'date_arri' => $pack->getdate_arri()->format('Y/m/d'),
            'hotel_name' => $pack->gethotel_name(),
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

    function showPack($id)
    {
        $sql = "SELECT * from Pack where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $pack = $query->fetch();
            return $pack;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
