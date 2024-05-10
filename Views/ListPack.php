<?php
include '../Controller/PackC.php';
$packC = new PackC();
$list = $packC->listPack();
?>
<!DOCTYPE html>
<html>
<head>
  <title>News and Tips - Backoffice</title>
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
  <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16">List of Packs</h1>
  <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">
    <button class="w3-button w3-black w3-section" type="submit">
      <a href="addPack.php" class="fa fa-paper-plane" style="text-decoration: none;">Add Pack</a>
    </button>
  </h2>
  <table class="w3-table-all">
    <tr>
      <th>Id Pack</th>
      <th>Description</th>
      <th>Date Depart</th>
      <th>Date Arrivee</th>
      <th>Hotel Name</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
    <?php foreach ($list as $pack) { ?>
      <tr>
        <td><?= $pack['id']; ?></td>
        <td><?= $pack['description']; ?></td>
        <td><?= $pack['date_dep']; ?></td>
        <td><?= $pack['date_arri']; ?></td>
        <td><?= $pack['hotel_name']; ?></td>
        <td align="center">
          <form method="POST" action="updatePack.php">
            <input type="submit" class="w3-button w3-blue" name="update" value="Update">
            <input type="hidden" value="<?= $pack['id']; ?>" name="id">
          </form>
        </td>
        <td>
          <a href="deletePack.php?id=<?= $pack['id']; ?>" class="w3-button w3-red">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>
