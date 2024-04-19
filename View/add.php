<?php

include '../Controller/CommandeC.php';

$error = "";

$commandeC = new CommandeC();

if (isset($_POST)) {
    // Extract form data based on your table columns
    $dateCommande = isset($_POST['dateCommande']) ? new DateTime($_POST['dateCommande']) : null;
    $prix_total = isset($_POST['prix_total']) ? floatval($_POST['prix_total']) : null; // Assuming numerical value for prix_total
    $adresse_livraison = isset($_POST['adresse_livraison']) ? $_POST['adresse_livraison'] : '';

    // Basic validation (assuming all fields are required)
    if (!$dateCommande || empty($prix_total) || empty($adresse_livraison)) {
        $error = "Please fill out all required fields (date, price, and address).";
    } else {
        // Create a Commande object
        $commande = new Commande(
            null, // Assuming id is auto-generated
            $dateCommande,
            $prix_total,
            $adresse_livraison
        );

        // Call addCommande function from CommandeC
        $commandeC->addCommande($commande);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Commande</title>
    <style>
        table {
            border-collapse: collapse;
            /* Remove borders between table cells */
        }

        td {
            padding: 5px;
            /* Add some padding for better spacing */
        }

        label {
            display: block;
            /* Make labels appear on separate lines */
        }
    </style>
</head>

<body>
    <h2>Add Commande</h2>

    <?php if (isset($error)) : ?>
        <div id="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="dateCommande">Date de Commande:</label></td>
                <td><input type="date" name="dateCommande" id="dateCommande" required></td>
            </tr>
            <tr>
                <td><label for="prix_total">Prix Total:</label></td>
                <td><input type="number" step="0.01" name="prix_total" id="prix_total" placeholder="Enter Price" required></td>
            </tr>
            <tr>
                <td><label for="adresse_livraison">Adresse de Livraison:</label></td>
                <td><input type="text" name="adresse_livraison" id="adresse_livraison" placeholder="Enter Delivery Address" required></td>
            </tr>
        </table>
        <button type="submit">Save Commande</button>
    </form>

</body>

</html>