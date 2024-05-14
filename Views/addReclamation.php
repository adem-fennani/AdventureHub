<?php

include_once '../Controller/ReclamationC.php';

$error = "";

// create employe
$reclamation = null;

// create an instance of the controller
$reclamationC = new ReclamationC();
if (
    isset($_POST["id_user"]) &&
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["Date_rec"])
) {
    if (
        !empty($_POST['id_user']) &&
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["Date_rec"])
    ) {
        $reclamation = new Reclamation(
            null,
            $_POST['id_user'],
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['contenu'],
            new DateTime($_POST['Date_rec'])
        );
        $reclamationC->addReclamation($reclamation);
        header('Location:ListReclamation.php');
    } else
        $error = "Missing information";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Complaint - Frontoffice</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
            <h1>Add Complaint</h1>

            <form action="" method="POST" id="form" name="form">
                <label for="id_user">id_user:</label>
                <input type="text" name="id_user" id="id_user">
                <span class="error" id="error_id_user"></span>

                <label for="firstName">firstName:</label>
                <input type="text" name="firstName" id="firstName">
                <span class="error" id="error_firstName"></span>

                <label for="lastName">lastName:</label>
                <input type="text" name="lastName" id="lastName">
                <span class="error" id="error_lastName"></span>

                <label for="contenu">Contenu:</label>
                <input type="text" name="contenu" id="contenu">
                <span class="error" id="error_contenu"></span>

                <label for="Date_rec">Hotel Name:</label>
                <input type="date" name="Date_rec" id="Date_rec" maxlength="20">
                <span class="error" id="error_Date_rec"></span>

                <input type="submit" value="Save">
                <input type="reset" value="Reset">
            </form>
        </div>
        <script src="addreclamation.js">

        </script>

</body>

</html>