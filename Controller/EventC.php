<?php
include '../config.php';
include '../Model/event.php';

class EventC
{
    public function listEvents()
    {
        $sql = "SELECT * FROM event";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteEvent($id)
    {
        $sql = "DELETE FROM event WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addEvent($event)
    {
        $sql = "INSERT INTO event  
        VALUES (NULL, :n, :h, :des, :l, :d,:s)";
        $db = config::getConnexion();
        try {
            print_r($event->getDate()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $event->getNom(),
                'h' => $event->getHost(),
                'des' => $event->getDescription(),
                'l' => $event->getLocation(),
                'd' => $event->getDate()->format('Y/m/d'),
                's' => $event->getStatus()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateEvent($event, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE event SET 
                    nom = :nom, 
                    host = :host, 
                    description = :description, 
                    location = :location,
                    date = :date,
                    status = :status,

                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'nom' => $event->getNom(),
                'host' => $event->getHost(),
                'description' => $event->getDescription(),
                'location' => $event->getLocation(),
                'date' => $event->getDate()->format('Y/m/d'),
                'status' => $event->getStatus(),

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showEvent($id)
    {
        $sql = "SELECT * from event where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
