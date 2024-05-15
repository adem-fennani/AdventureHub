<?php

include '../../Controller/FeedbackC.php';

$error = "";

// Create feed
$feedback = null;

// Create an instance of the controller
$feedbackC = new FeedbackC();
if (
    
    isset($_POST["ide"]) &&
    isset($_POST["idu"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["publicationDate"]) 
) {
    if (
        
        !empty($_POST["ide"]) &&
        !empty($_POST["idu"]) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["publicationDate"])
    ) {
        $feedback = new Feedback(
            null,
            
            $_POST['ide'],
            $_POST['idu'],
            $_POST['contenu'],
            new DateTime($_POST['publicationDate'])
           
        );
        $feedbackC->addFeedback($feedback);
        header('Location: ../backoffice/ListFeedbacks.php');
    } else {
        $error = "Missing information";
    }
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>AdventureHub</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
            margin: 0;
            padding: 0;
        }

        /* Center the content horizontally and vertically */
        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Adjust the width of the content */
        .content {
            width: 90%; /* Adjust this value as needed */
            max-width: 600px; /* Set a maximum width for better readability */
        }

        /* Style the select element */
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #888;
            background-color: #fff;
            margin-bottom: 10px;
        }

        /* Style the form elements */
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #888;
            background-color: #fff;
            margin-bottom: 10px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>

    <script>
        resizeWindow()
        function resizeWindow() {
            // Redimensionner la fenêtre à une largeur de 800px et une hauteur de 600px
            window.resizeTo(400, 200);
        }
    </script>

    <link rel="icon" href="../../img/logo.png" type="image/png">
</head>
<body>
<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="#home" class="w3-bar-item w3-button"><img src="../../img/logo.png" alt="AdventureHub logo" width="40px"> EventHub</a>
        <div class="w3-right w3-hide-small">
            <a href="#home" class="w3-bar-item w3-button">Acceuil</a>
            <a href="#shop" class="w3-bar-item w3-button">Boutique</a>
            <a href="#Agency" class="w3-bar-item w3-button">Agences</a>
        </div>
    </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="../../img/bgphoto.jpg" alt="Architecture" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
        <h1 class="w3-xxlarge w3-text-white"><img src="../../img/logo white.png" alt="logo white" width="80px"> EventHub</h1>
    </div>
</header>
<br>
<!-- Add feed Section -->
<div class="content-wrapper">
    <div class="content">
        <h4>Ajouter un Feedback</h4>
        <form action="../../mailing.php" method="post">
            <!-- Replace the select dropdown with a normal input field -->
            <input type="text" class="w3-input w3-section w3-border" name="ide" id="ide" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" required>
            <!-- End of replacement -->

            <tr>
                <input class="w3-input w3-section w3-border" type="text" placeholder="ID utilisateur"  name="idu" id="idu">
                <td><div id="erreurIdu" class="error-message"></div></td>
            </tr>
            <tr>
                <textarea placeholder="Contenu" id="contenu" name="contenu" rows="10" cols="50" ></textarea>
                <td><div id="erreurContenu" class="error-message"></div></td>
            </tr>
            <tr>
                <input class="w3-input w3-section w3-border" type="date" placeholder="Date de publication"  name="publicationDate" id="publicationDate">
                <td><div id="erreurPublicationDate" class="error-message"></div></td>
            </tr>
            <button class="w3-button w3-black w3-section" type="submit">
                <i class="fa fa-paper-plane"></i> Confirmer
            </button>
        </form>
    </div>
</div>


</body>
<script src="feedback.js"></script>
</html>
