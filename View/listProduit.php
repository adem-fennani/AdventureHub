<?php
include '../Controller/ProduitC.php';

$produitC = new Produit(config::getConnexion());

$list = $produitC->listProduits();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>List of Products</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        d .product-card {
            margin-bottom: 20px;
        }

        .product-card img {
            border-radius: 5px;
            width: 100%;
        }

        body {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        .w3-sidebar {
            width: 300px;
        }

        .container {
            margin-left: 300px;
        }

        @media (max-width: 768px) {

            .container {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="../View/front-office.html" class="w3-bar-item w3-button"><img src="images/logo.png" alt="AdventureHub logo" width="40px">AdventureHub</a>
            <!-- Float links to the right. Hide them on small screens -->

            <div class="w3-right w3-hide-small">
                <a href="../View/boutique-user.php" class="w3-bar-item w3-button">Boutique</a>
                <a href="../View/front-office.html" class="w3-bar-item w3-button">Retour</a>
            </div>
        </div>
    </div>
    <div class="container">
        <br><br><br><br><br>
        <br><br><br>

        <div class="row justify-content-center">
            <?php foreach ($list as $produit) {
                $img = basename($produit['image_produit']);
                $img = 'img/' . $img;
            ?>
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="<?= $produit['image_produit'] ?>" class="card-img-top" alt=<?= $produit['titre_produit']; ?>>
                        <div class="card-body">
                            <h5 class="card-title"><?= $produit['titre_produit']; ?></h5>
                            <p class="card-text"><strong>Prix unitaire:</strong> <?= $produit['prix_unitaire']; ?>.000 DT</p>
                            <p class="card-text"><strong>Quantité:</strong> <?= $produit['quantite_produit']; ?></p>
                            <!-- Use a form to submit the product ID to updateProduit.php -->
                            <form method="POST" action="updateProduit.php">
                                <input type="hidden" value="<?= $produit['id_produit']; ?>" name="id">
                                <input type="submit" class="btn btn-primary" name="update" value="Update">
                            </form>
                            <!-- Alternatively, you can use a link with the ID as a parameter -->
                            <!-- <a href="updateProduit.php?id=<?= $produit['id_produit']; ?>" class="btn btn-primary">Update</a> -->
                            <a href="deleteProduit.php?id=<?= $produit['id_produit']; ?>" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>