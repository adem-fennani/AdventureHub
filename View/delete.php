<?php
include '../Controller/CommandeC.php';

$commandeC = new CommandeC();

// Check if a POST request with "id" is set (assuming deletion form submission)
if (isset($_POST["id"])) {
  // Call deleteCommande function (assuming it exists)
  $commandeC->deleteCommande($_POST["id"]);
  // Optional: Redirect after deletion (adjust URL as needed)
  header('Location: delete.php');
  exit();
}

// Call the listCommandes function to retrieve all commandes
$commandes = $commandeC->listCommandes();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Commandes</title>
  <link rel="stylesheet" href="style/delete.css">
</head>

<body>
  <h1>Liste des Commandes</h1>

  <form method="post" action="">  <label for="id">ID de la commande à supprimer:</label>
    <input type="number" name="id" id="id" required> <button type="submit">Supprimer</button>
  </form>

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
