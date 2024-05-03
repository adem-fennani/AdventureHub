<?php

include '../Controller/ReclamationC.php';

$error = "";

// create employe
$reclamation = null;

// create an instance of the controller
$reclamationC = new ReclamationC();
if (
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["Date_rec"])
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["Date_rec"])
    ) {
        $reclamation = new Reclamation(
            null,
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

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
<center style="padding-top: 4rem;">
        <h1 class="w3-border-bottom w3-border-light-grey w3-padding-16">Add Complaint</h1>
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">
            <button class="w3-button w3-black w3-section" type="submit">

                <a href="ListReclamation.php" class="fa fa-paper-plane" style="text-decoration: none;">Back to list</a>
            </button>
        </h2>
    </center>

    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="firstName">First Name:
                    </label>
                </td>
                <td><input type="text" name="firstName" id="firstName" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="lastName">Last Name:
                    </label>
                </td>
                <td><input type="text" name="lastName" id="lastName" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="contenu">Contenu:
                    </label>
                </td>
                <td>
                    <input type="text" name="contenu" id="contenu">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Date_rec">Date de recalamation:
                    </label>
                </td>
                <td>
                    <input type="date" name="Date_rec" id="Date_rec">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>