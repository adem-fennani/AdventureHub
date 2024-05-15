<?php

include '../../Controller/EventC.php';

$error = "";

// create event
$event = null;

// create an instance of the controller
$eventC = new EventC();
if (
    isset($_POST["ide"]) &&
    isset($_POST["host"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["location"]) &&
    isset($_POST["date"]) &&
    isset($_POST["status"])
 ) {
    if (
        !empty($_POST["ide"]) &&
        !empty($_POST["host"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["location"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["status"])
    ) {
        $event = new Event(
            $_POST['ide'],
            $_POST['host'],
            $_POST['nom'],
            $_POST['description'],
            $_POST['location'],
            new DateTime($_POST['date']),
            $_POST['status']
            
        );
        $eventC->updateEvent($event, $_POST["ide"]);
        header('Location:../backoffice/ListEvents.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User Display</title>
    <link rel="icon" href="../../img/logo.png" type="image/png">
</head>

<body>
    <button><a href="../backoffice/ListEvents.php">Back to list</a></button>
     <!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
      <a href="#home" class="w3-bar-item w3-button"><img src="../../img/logo.png" alt="AdventureHub logo" width="40px"> EventHub</a>
      <!-- Float links to the right. Hide them on small screens -->
  
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
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['ide'])) {
        $event = $eventC->showEvent($_POST['ide']);

    ?>

        <form action="" method="POST" id="form">
            <table  align="center">
                <tr>
                    <td>
                        <label for="ide">Id :
                        </label>
                    </td>
                    <td><input type="text" name="ide" id="ide" value="<?php echo $event['ide']; ?>" maxlength="20"></td>
                    
                </tr>
                <tr>
                    <td>
                        <label for="host">host:
                        </label>
                    </td>
                    <td><input type="text" name="host" id="host" value="<?php echo $event['host']; ?>" maxlength="20"></td>
                    <td> <span id="erreurHost" style='color:red' ></span></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $event['nom']; ?>" maxlength="20"></td>
                    <td> <span id="erreurNom" style='color:red' ></span></td>
                </tr>
                <tr>
                <td>
                    <label for="description">description:
                    </label>
                </td>
                <td><input type="text" name="description" id="description" value="<?php echo $event['description']; ?>" ></td>
            </tr>
            <tr>
                <td>
                    <label for="location">location:
                    </label>
                </td>
                <td>
                    <input type="text" name="location" id="location" value="<?php echo $event['location']; ?>" maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date">Date :
                    </label>
                </td>
                <td>
                <input type="date" name="date" id="date" value="<?php echo date('Y-m-d', strtotime($event['date'])); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status">status:
                    </label>
                </td>
                <td><input type="text" name="status" id="status" value="<?php echo $event['status']; ?>" maxlength="20"></td>
            </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
 <!--script src="event.js" ></script-->   
</body>

</html>