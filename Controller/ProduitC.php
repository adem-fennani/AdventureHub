<?php
include '../config.php';
include '../Model/Produit.php'; // Include the Produit class definition

$error = "";
$produitC = new Produit(config::getConnexion());
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["prix"]) && isset($_POST["titre"]) && isset($_POST["quantite"]) && isset($_POST["description"]) && isset($_FILES["image"]) && isset($_POST["categorie"])) {
        var_dump($_FILES["image"]["name"]);
        if (!empty($_POST['prix']) && !empty($_POST["titre"]) && !empty($_POST["quantite"]) && !empty($_POST["description"]) && !empty($_FILES["image"]["name"]) && !empty($_POST["categorie"])) {
            
            /*
            // Handle image upload
            $image_name = $_FILES["image"]["name"];
            $image_tmp_name = $_FILES["image"]["tmp_name"];
            $image_dir = $_SERVER['DOCUMENT_ROOT'] . '/View/images';
            $image_path = $image_dir . $image_name;
            move_uploaded_file($image_tmp_name, $image_path);
            */

            $produitC->addProduit(
                null, // id_produit (set to null since it's auto-incremented)
                $_POST['titre'], 
                $_POST['prix'], 
                $_FILES["image"]["name"], 
                $_POST['description'], 
                $_POST['quantite'], 
                $_POST['categorie']
            );
            
            header('Location: ../View/front-office.html');
            exit();
        } else {
            $error = "Missing information";
        }
    }
}
?>
