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

    function deleteEvent($ide)
    {
        $sql = "DELETE FROM event WHERE ide = :ide";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':ide', $ide);

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

    function updateEvent($event, $ide)
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
                    status = :status

                WHERE ide= :ide'
            );
            $query->execute([
                'ide' => $ide,
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

    function showEvent($ide)
    {
        $sql = "SELECT * from event where ide = $ide";
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

    public function getEventById($eventId) {
        $sql = "SELECT * FROM event WHERE ide = :id";
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':id' => $eventId));
            
            // Fetch event details
            $event = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Return the event details
            return $event;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getEventStatusCount()
    {
        $sql = "SELECT status, COUNT(*) as count FROM event GROUP BY status";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $statuses = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $statuses[$row['status']] = $row['count'];
            }
            return $statuses;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
}
