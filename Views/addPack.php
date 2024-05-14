<?php

include '../Controller/PackC.php';

$error = "";

// create employe
$pack = null;

// create an instance of the controller
$packC = new PackC();
if (
    isset($_POST["id_reclamation"]) &&
    isset($_POST["description"]) &&
    isset($_POST["date_dep"]) &&
    isset($_POST["date_arri"]) &&
    isset($_POST["hotel_name"])
) {
    if (
        !empty($_POST['id_reclamation']) &&
        !empty($_POST['description']) &&
        !empty($_POST['date_dep']) &&
        !empty($_POST['date_arri']) &&
        !empty($_POST["hotel_name"])
    ) {
        $pack = new Pack(
            null,
            $_POST['id_reclamation'],
            $_POST['description'],
            new DateTime($_POST['date_dep']),
            new DateTime($_POST['date_arri']),
            $_POST['hotel_name'],
        );
        $packC->addPack($pack);
        header('Location:ListPack.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Add Pack - Frontoffice</title>
    <style>
        /* Existing CSS */

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        select {
            /* Add style for select element */
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 48%;
            padding: 10px;
            margin: 10px 1% 0 0;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
    <link rel="icon" href="logo.png" type="image/png">
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="#home" class="w3-bar-item w3-button"><img src="logo.png" alt="AdventureHub logo" width="40px"> </a>
        </div>
        <div class="container">
            <h1>Add Pack</h1>

            <form action="" method="POST" id="form" name="form">
                <label for="id_reclamation">id_reclamation:</label>
                <!--<input type="number" name="id_reclamation" id="id_reclamation">-->
                <!-- Inside the select element, remove the static options and use PHP to populate dynamic options -->
                <select name="reclamationId" id="reclamationId">
                    <?php
                    // Establish database connection
                    $db = config::getConnexion();

                    // SQL query to select IDs from the reclamation table
                    $sql = "SELECT id FROM reclamation";

                    // Execute the query
                    $liste = $db->query($sql);

                    // Check if the query executed successfully
                    if ($liste) {
                        // Iterate over the result set and generate options
                        while ($row = $liste->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
                        }
                    } else {
                        // Handle the case where the query fails
                        echo '<option value="">No IDs available</option>';
                    }
                    ?>
                </select>


                <span class="error" id="error_id_reclamation"></span>

                <label for="description">Description:</label>
                <input type="text" name="description" id="description">
                <span class="error" id="error_description"></span>

                <label for="date_dep">Date de départ:</label>
                <input type="date" name="date_dep" id="date_dep">
                <span class="error" id="error_date_dep"></span>

                <label for="date_arri">Date d'arrivée:</label>
                <input type="date" name="date_arri" id="date_arri">
                <span class="error" id="error_date_arri"></span>

                <label for="hotel_name">Hotel Name:</label>
                <input type="text" name="hotel_name" id="hotel_name" maxlength="20">
                <span class="error" id="error_hotel_name"></span>

                <input type="submit" value="Save">
                <input type="reset" value="Reset">
            </form>
        </div>
        <!--<script src="addpack.js">-->

        </script>

</body>

</html>