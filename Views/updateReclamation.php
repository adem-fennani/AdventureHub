<?php

include '../Controller/ReclamationC.php';

$error = "";

// create employe
$reclamation = null;

// create an instance of the controller
$reclamationC = new ReclamationC();
if (
    isset($_POST["id"]) &&
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["date_rec"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["date_rec"])
    ) {
        $reclamation = new Reclamation(
            $_POST['id'],
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['contenu'],
            new DateTime($_POST['date_rec'])
        );
        $reclamationC->updateReclamation($reclamation, $_POST["id"]);
        header('Location:ListReclamation.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show Recalamation</title>
</head>

<body>
    <button><a href="ListReclamation.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $reclamation = $reclamationC->ListReclamation($_POST['id']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id Reclamation:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $reclamation['id']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="firstName">First Name:
                        </label>
                    </td>
                    <td><input type="text" name="firstName" id="firstName" value="<?php echo $reclamation['firstName']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lastName">Last Name:
                        </label>
                    </td>
                    <td><input type="text" name="lastName" id="lastName" value="<?php echo $reclamation['lastName']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="contenu">Contenu:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="contenu" value="<?php echo $reclamation['contenu']; ?>" id="contenu">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Date_rec">Date de reclamation:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="Date_rec" id="Date_rec" value="<?php echo date('Y-m-d', strtotime($reclamation['Date_rec'])); ?>">
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