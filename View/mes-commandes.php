<!DOCTYPE html>
<html>

<head>
    <title>Mes commandes</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style/boutique-user.css" />
    <link rel="icon" href="images/logo.png" type="image/png" />
</head>

<body class="w3-light-grey">
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="#home" class="w3-bar-item w3-button"><img src="images/logo.png" alt="AdventureHub logo" width="40px" />
                AdventureHub</a>
            <!-- Float links to the right. Hide them on small screens -->

            <div class="w3-right w3-hide-small">
                <a href="boutique-user.html" class="w3-bar-item w3-button">Retour</a>
            </div>
        </div>
    </div>

    <!-- Display user's commandes here -->
    <div class="w3-container">
        <h5>Mes commandes</h5>
        <div class="w3-panel">
            <div class="w3-row-padding" style="margin: 0 -16px">
                <div class="w3-twothird">
                    <table class="w3-table w3-striped w3-white">
                        <tbody>
                            <?php
                            require_once('../config.php');
                            require_once('../Model/Commande.php');

                            // Get PDO connection using the config class
                            $pdo = config::getConnexion();

                            // Create an instance of the Commande class
                            $commandeModel = new Commande($pdo);

                            // Display commandes for the user
                            $commandeModel->displayCommandeUser();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>