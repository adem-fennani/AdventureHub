<?php
include '../Controller/ReclamationC.php';

if (isset($_POST['addReclamation'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $contenu = $_POST['contenu'];
    $Date_rec = $_POST['Date_rec'];

    // Assuming you have a database connection named $project_web
    try {
        $project_web = config::getConnexion();
        $sql = "INSERT INTO reclamation (firstName, lastName, contenu, Date_rec) VALUES (?, ?, ?, ?)";
        $stmt = $project_web->prepare($sql);
        $stmt->execute([$firstName, $lastName, $contenu, $Date_rec]);
        // Redirect to a page after successful insertion
        header("Location: ListReclamation.php");
        exit();
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}
?>