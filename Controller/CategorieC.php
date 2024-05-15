<?php
require_once('../config.php');
require_once('../Model/Categorie.php');

// Create an instance of the controller
$Categorie = new Categorie();

// Read Categorie
if (isset($_POST["afficherCategories"])) {
    // Retrieve the list of categories
    $listCategories = $Categorie->listCategories();
    // Redirect to the list-categories.php view with the list of categories
    header('Location:../View/list-categories.php');
    exit(); // Stop further execution
}

$error = "";
$categorie = null;

// Add Categorie
if (isset($_POST["nom"]) && isset($_POST["description"])) {
    if (!empty($_POST['nom']) && !empty($_POST["description"])) {
        // Create a new Categorie object with sanitized input values
        $categorie = new Categorie(
            null,
            $_POST['nom'],
            $_POST['description']
        );
        // Add the new category
        $Categorie->addCategorie($categorie);
        // Redirect back to back-office.html after adding the category
        header('Location:../View/list-categories.php');
        exit(); // Stop further execution
    } else {
        $error = "Missing information";
    }
}


// Delete Categorie
$error = "";
$categorie = new Categorie();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id_categorie'])) {
        $id_categorie = $_POST['id_categorie'];
        $categorie->deleteCategorie($id_categorie);
        header('Location:../View/List-categories.php');
        exit();
    }
}
