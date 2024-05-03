<?php
include '../Controller/ReclamationC.php';


  // Créer une instance de la classe FeedbackC
  $reclamationC = new ReclamationC();

  // Vérifier si l'option de tri a été sélectionnée dans le formulaire
  if (isset($_GET['sortOption'])) {
    // Récupérer la valeur de l'option de tri depuis le formulaire
    $sortOption = $_GET['sortOption'];

    // Appeler la fonction pour récupérer les retours triés en fonction de l'option sélectionnée
    $list = $reclamationC->listFeedbacksSortedByOption($sortOption);
  } else {
    // Si aucune option de tri n'est sélectionnée, afficher les retours sans tri
    $list = $reclamationC->ListReclamation();
  }
  ?>
<html>

<head></head>

<body>

    <center>
    <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16">List of Complaint</h1>
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">
            <button class="w3-button w3-black w3-section" type="submit">

                <a href="addReclamation.php" class="fa fa-paper-plane" style="text-decoration: none;">Add Complaint</a>
            </button>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Reclamation</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contenu</th>
            <th>Date de reclamation</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $reclamation) {
        ?>
            <tr>
                <td><?= $reclamation['id']; ?></td>
                <td><?= $reclamation['firstName']; ?></td>
                <td><?= $reclamation['lastName']; ?></td>
                <td><?= $reclamation['contenu']; ?></td>
                <td><?= $reclamation['Date_rec']; ?></td>
                <td align="center">
                    <form method="POST" action="updateReclamation.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $reclamation['id']; ?> name="id">
                    </form>
                </td>
                <td>
                    <a href="deleteReclamation.php?id=<?php echo $reclamation['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>