<?php
include 'config.php';

try {
    $db = config::getConnexion();

    // SQL query for joining pack and reclamation tables based on id_reclamation
    $sql = "SELECT pack.*, reclamation.*
            FROM pack
            INNER JOIN reclamation ON pack.id_reclamation = reclamation.id_reclamation";

    // Prepare and execute the query
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check row count
    $rowCount = count($results);
    if ($rowCount > 0) {
        echo "Join successful. Total rows: $rowCount <br>";

        // Output the results
        foreach ($results as $row) {
            echo "Pack ID: " . $row['pack_id'] . "<br>";
            echo "Pack Description: " . $row['description'] . "<br>";
            // Output other pack columns...

            echo "Reclamation ID: " . $row['reclamation_id'] . "<br>";
            echo "Reclamation Content: " . $row['contenu'] . "<br>";
            // Output other reclamation columns...

            echo "<br>";
        }
    } else {
        echo "No matching records found.<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
