<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique - Gestion des Commandes</title>
  <link rel="stylesheet" href="style/boutique.css">
</head>

<body>
  <h2>Gestion des Commandes</h2>
  <div>
    <a href="add.php" class="btn">Ajouter</a>
    <a href="list.php" class="btn">Afficher</a>
    <a href="delete.php" class="btn">Supprimer</a>
    <a href="update.php" class="btn">Modifier</a>
  </div>

  <?php include 'list.php'; // Include the code for displaying the list of commands 
  ?>


</body>

</html>