<!DOCTYPE html>
<lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update Commande</title>
  <link rel="stylesheet" href="style/update.css">
</head>

<body>
  <form action="update2.php" method="POST">
    <label for="id_to_find">Enter Commande ID to Update:</label>
    <input type="number" name="id_to_find" id="id_to_find" required />
    <button type="submit">Find Commande</button>
  </form>
  <hr />

  <h1>Liste des Commandes</h1>

  <?php // Include the necessary file for database interaction ?>
  <?php include '../Controller/CommandeC.php'; ?>

  <?php
  // Create an instance of the CommandeC class (assuming it handles commande operations)
  $commandeC = new CommandeC();

  // Call the listCommandes() method to retrieve all commandes
  $commandes = $commandeC->listCommandes();
  ?>

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
            <td><?php echo $commande['date']->format('Y-m-d'); ?></td>
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
