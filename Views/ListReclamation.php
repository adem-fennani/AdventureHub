<?php
include '../Controller/ReclamationC.php';
$reclamationC = new ReclamationC();

// Fetch the list of complaints
$result = $reclamationC->ListReclamation();

if ($result) {
    // Convert the result to an array of associative arrays
    $list = $result->fetchAll(PDO::FETCH_ASSOC);

    // Get the sorting option from the form
    $sortOption = isset($_GET['sortOption']) ? $_GET['sortOption'] : 'Date_rec_DESC';

    // Sort the data based on the selected option
    switch ($sortOption) {
        case 'Date_rec_ASC':
            usort($list, function($a, $b) {
                return strtotime($a['Date_rec']) - strtotime($b['Date_rec']);
            });
            break;
        case 'Date_rec_DESC':
            usort($list, function($a, $b) {
                return strtotime($b['Date_rec']) - strtotime($a['Date_rec']);
            });
            break;
    }
} else {
    // Handle the case where the query fails or returns null
    $list = array(); // Initialize an empty array
}
?>

<html>

<head><title>News and Tips - Backoffice</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <style>
    /* CSS for list of complaints */
    .w3-container {
      margin: 20px auto;
      max-width: 800px;
    }

    .w3-container h1 {
      font-size: 24px;
      border-bottom: 2px solid #ccc;
      padding-bottom: 8px;
    }

    .w3-container .w3-button {
      text-decoration: none;
      display: inline-block;
      padding: 10px 20px;
      margin-top: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .w3-container .w3-button:hover {
      background-color: #45a049;
    }

    .w3-table-all {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    .w3-table-all th, .w3-table-all td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    .w3-table-all th {
      background-color: #4CAF50;
      color: white;
    }

    .w3-table-all tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .w3-table-all tr:hover {
      background-color: #ddd;
    }

    .w3-table-all td a {
      text-decoration: none;
      padding: 6px 10px;
      border-radius: 4px;
    }

    .w3-table-all td a.w3-button {
      background-color: #f44336;
    }

    .w3-table-all td a.w3-button:hover {
      background-color: #cc0000;
    }
  </style>
  <link rel="icon" href="logo.png" type="image/png">
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <!-- Navbar content -->
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <!-- Header content -->
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">
  <!-- Project Section -->
  <!-- Project content -->
</div>

<!-- About Section -->
<!-- About content -->

<!-- Contact Section -->
<!-- Contact content -->

<!-- Image of location/map -->
<!-- Location content -->

<!-- Complaint button -->
<!-- Complaint content -->

<!-- Footer -->
<!-- Footer content -->

<!-- List of complaints -->
<div class="w3-container">
  <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16">List of Complaint</h1>
  <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">
    <button class="w3-button w3-black w3-section" type="submit">
      <a href="addReclamation.php" class="fa fa-paper-plane" style="text-decoration: none;">Add Complaint</a>
    </button>
  </h2>
  <!-- Sorting form -->
  <form id="sortForm" action="" method="GET">
            <label for="sortOption">Trier par :</label>
            <select name="sortOption" id="sortOption">
                <option value="Date_rec_ASC">Date (plus ancienne d'abord)</option>
                <option value="Date_rec_DESC">Date (plus récente d'abord)</option>
                <!-- Add other sorting options as needed -->
            </select>
            <input type="submit" value="Appliquer">
        </form>
    

  <table class="w3-table-all">
    <tr>
      <th>Id Reclamation</th>
      <th>Id User</th>
      <th>firstName</th>
      <th>lastName</th>
      <th>contenu</th>
      <th>Date reclamation</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
    <?php foreach ($list as $reclamation) { ?>
      <tr>
        <td><?= $reclamation['id']; ?></td>
        <td><?= $reclamation['id_user']; ?></td>
        <td><?= $reclamation['firstName']; ?></td>
        <td><?= $reclamation['lastName']; ?></td>
        <td><?= $reclamation['contenu']; ?></td>
        <td><?= $reclamation['Date_rec']; ?></td>
        <td align="center">
          <form method="POST" action="updateReclamation.php">
            <input type="submit" class="w3-button w3-blue" name="update" value="Update">
            <input type="hidden" value="<?= $reclamation['id']; ?>" name="id">
          </form>
        </td>
        <td>
          <a href="deleteReclamation.php?id=<?= $reclamation['id']; ?>" class="w3-button w3-red">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>
