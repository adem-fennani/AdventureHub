<?php
include '../Controller/EmployeC.php';

if (isset($_POST['add_employees'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    // Assuming you have a database connection named $db
    try {
        $db = config::getConnexion();
        $sql = "INSERT INTO employee (firstName, lastName, email, dob) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$firstName, $lastName, $email, $dob]);
        // Redirect to a page after successful insertion
        header("Location: showEmploye.php");
        exit();
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}
?>