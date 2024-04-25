<?php
include '../Controller/CommandeC.php';

$error = "";
$commande = null;
$idToFind = "";  // Variable to store entered ID

// Create an instance of the controller
$commandeC = new CommandeC();

// Handle POST request for finding a commande by ID (first step)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_to_find"])) {
    if (isset($_POST["id_to_find"]) && !empty($_POST["id_to_find"])) {
        $idToFind = $_POST["id_to_find"];
        $commande = $commandeC->getCommandeById($idToFind);
        if (!$commande) {
            $error = "Commande not found.";
        }
    } else {
        $error = "Please enter an ID to find.";
    }
}

// Handle POST request for updating a commande (second step) - if update button clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_commande"])) {
    // Retrieve data from the form
    $id = $_POST["id"];
    $prixTotal = $_POST["prix_total"];
    $adresseLivraison = $_POST["adresse_livraison"];

    if (
        isset($id) &&
        isset($prixTotal) &&
        isset($adresseLivraison) &&
        !empty($id) &&
        !empty($prixTotal) &&
        !empty($adresseLivraison)
    ) {
        $commande = [
            'id' => $id,
            'prix_total' => $prixTotal,
            'adresse_livraison' => $adresseLivraison,
        ];
        $commandeC->updateCommande($commande, $id);
        header('Location: boutique.php');  // Redirect to list page on successful update
    } else {
        $error = "Missing information";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Commande (<?php echo $idToFind ? $idToFind : ""; ?>)</title>
</head>

<body>
    <button><a href="list.php">Back to List</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php if ($commande) { ?>
        <form action="" method="POST"> <input type="hidden" name="id" value="<?php echo $commande['id']; ?>">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="prix_total">Prix Total:</label>
                    </td>
                    <td><input type="number" name="prix_total" id="prix_total" value="<?php echo $commande['prix_total']; ?>" required></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse_livraison">Adresse de Livraison:</label>
                    </td>
                    <td><input type="text" name="adresse_livraison" id="adresse_livraison" value="<?php echo $commande['adresse_livraison']; ?>" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="update_commande" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php } else { ?>
        <p>No commande found for ID: <?php echo $idToFind; ?></p>
    <?php } ?>

</body>

</html>