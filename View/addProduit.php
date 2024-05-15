<?php
include '../config.php';
include '../Model/Produit.php';
include '../Model/Categorie.php';

$error = "";
$produit = null;

// Create an instance of the controller with the database connection as an argument
$produitC = new Produit(config::getConnexion());
$categorieC = new Categorie(null, null, null);

$categories = $categorieC->getAllCategories(); // Call the getAllCategories() method

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $prix = $_POST["prix"];
    $titre = $_POST["titre"];
    $quantite = $_POST["quantite"];
    $description = $_POST["description"];
    $id_categorie = $_POST["categorie"];
    $image_name = $_POST["image"]; // Assuming the filename is submitted in the form

    // Create a new instance of Produit with the retrieved data
    $newProduit = new Produit(null, null, $titre, $prix, $image_name, $description, $quantite, $id_categorie);

    // Add the product to the database
    $produitC->addProduit($newProduit);

    // Redirect to the listProduit.php page after adding the product
    header("Location: listProduit.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style/addProduit.css" />
</head>

<body>
    <div class="container">
        <h3>Add Product</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="prix" placeholder="Price" required>
            <input type="text" name="titre" placeholder="Title" required>
            <input type="number" name="quantite" placeholder="Quantity" required>
            <textarea name="description" placeholder="Description" rows="4" cols="50" required></textarea>
            <label for="categories">Category:</label>
            <select name="categorie">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['id_categorie']; ?>"><?php echo $category['nom']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="image" placeholder="Image filename" required>
            <!-- Remove the file input field -->
            <!-- <input type="file" name="image" accept="image/*" required> -->
            <button type="submit">Add Product</button>
        </form>
    </div>
    <script src="script/addProduit.js"></script>
</body>

</html>