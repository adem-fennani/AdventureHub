<?php
include '../Controller/CategorieC.php'; // Include the controller file
$categorieC = new Categorie(); // Create an instance of the Categorie controller
$list = $categorieC->listCategories(); // Retrieve the list of categories

?>

<!-- Your HTML code to display the list of categories goes here -->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="aaa.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="logo.png" type="image/png">
    <title>List of Products</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <span class="w3-bar-item w3-right"><img src="logo white.png" alt="" width="40px"></span>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <span>Bienvenue, <strong>Admin</strong></span><br>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Aperçu</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Vues</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
            <a href="../View/ListProduits.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Produits</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Categories</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Historique</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Paramètres </a><br><br>
        </div>
    </nav>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="#home" class="w3-bar-item w3-button"><img src="aaa.png" alt="AdventureHub logo" width="40px"> Conseils & actualités</a>
            <!-- Float links to the right. Hide them on small screens -->

            <div class="w3-right w3-hide-small">
                <a href="#home" class="w3-bar-item w3-button">Acceuil</a>
                <a href="../View/ListProduits.php" class="w3-bar-item w3-button">Boutique</a>
                <a href="#Agency" class="w3-bar-item w3-button">Agences</a>
            </div>
        </div>
    </div>
    <div class="container">
        <br><br><br><br><br>

        <center>
            <h1>List of Categories</h1>
            <h2>
                <a href="addCategorie1.php">Add Categorie</a>
            </h2>
        </center>
        <table border="1" align="center" width="70%">
            <tr>
                <th>Id Categorie</th>
                <th>Name</th>
                <th>Description</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($list as $categorie) { ?>
                <tr>
                    <td><?= $categorie['id_categorie']; ?></td>
                    <td><?= $categorie['nom_categorie']; ?></td>
                    <td><?= $categorie['description_categorie']; ?></td>
                    <td>
                        <form method="POST" action="../Controller/CategorieC.php">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id_categorie" value="<?= $categorie['id_categorie']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            } ?>
        </table>
</body>

</html>