<?php

include '../Controller/CommandeC.php';

$commandeC = new CommandeC();

$commandes = $commandeC->listCommandes();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Commandes</title>
    <link rel="stylesheet" href="style/list.css">
</head>

<body>
    <h2>Liste des Commandes</h2>

    <?php if (isset($commandes) && !empty($commandes)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date de Commande</th>
                    <th>Prix Total</th>
                    <th>Adresse de Livraison</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande) : ?>
                    <tr>
                        <td><?php echo $commande['id']; ?></td>
                        <td><?php echo $commande['date']->format('Y-m-d'); ?> </td>
                        <td><?php echo $commande['prix_total']; ?></td>
                        <td><?php echo $commande['adresse_livraison']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucune commande trouvée.</p>
    <?php endif; ?>
</body>

</html>