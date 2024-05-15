<?php

include '../../Controller/FeedbackC.php';

$error = "";

// create feed
$feedback = null;

// create an instance of the controller
$feedbackC = new FeedbackC();
if (
    isset($_POST["id"]) &&
    isset($_POST["ide"]) &&
    isset($_POST["idu"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["publicationDate"]) 

 ) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["ide"]) &&
        !empty($_POST["idu"]) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["publicationDate"])
    ) {
        $feedback = new Feedback(
            $_POST['id'],
            $_POST['ide'],
            $_POST['idu'],
            $_POST['contenu'],
            new DateTime($_POST['publicationDate'])
      
        );
        $feedbackC->updateFeedback($feedback, $_POST["id"]);
        header('Location:../backoffice/ListFeedbacks.php');
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
    <button><a href="../backoffice/ListFeedbacks.php">Back to list</a></button>
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
    if (isset($_POST['id'])) {
        $feedback = $feedbackC->showFeedback($_POST['id']);

    ?>

        <form action="" method="POST" id="form">
            <table  align="center">
                <tr>
                    <td>
                        <label for="id">Id :
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $feedback['id']; ?>" maxlength="20"></td>
                    
                </tr>
                <tr>
                    <td>
                        <label for="ide"> id evenement:
                        </label>
                    </td>
                    <td><input type="text" name="ide" id="ide" value="<?php echo $feedback['ide']; ?>" maxlength="20"></td>
                    <td> <span id="erreur id evenement" style='color:red' ></span></td>
                </tr>
                <tr>
                    <td>
                        <label for="idu">id utilisateur:
                        </label>
                    </td>
                    <td><input type="text" name="idu" id="idu" value="<?php echo $feedback['idu']; ?>" maxlength="20"></td>
                    <td> <span id="erreurNom" style='color:red' ></span></td>
                </tr>
                <tr>
                <td>
                    <label for="contenu">contenu:
                    </label>
                </td>
                <td><input type="text" name="contenu" id="contenu" value="<?php echo $feedback['contenu']; ?>" ></td>
            </tr>
            
            <tr>
                <td>
                    <label for="publicationDate">Date de publication :
                    </label>
                </td>
                <td>
                <input type="date" name="publicationDate" id="publicationDate" value="<?php echo date('Y-m-d', strtotime($feedback['publicationDate'])); ?>">
                </td>
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
    
</body>

</html>