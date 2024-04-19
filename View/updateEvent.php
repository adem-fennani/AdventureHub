<?php

include '../Controller/EventC.php';

$error = "";

// create event
$event = null;

// create an instance of the controller
$eventC = new EventC();
if (
    isset($_POST["id"]) &&
    isset($_POST["host"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["location"]) &&
    isset($_POST["date"]) &&
    isset($_POST["status"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["host"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["location"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["status"])
    ) {
        $event = new Event(
            $_POST['id'],
            $_POST['host'],
            $_POST['nom'],
            $_POST['description'],
            $_POST['location'],
            new DateTime($_POST['date']),
            $_POST['status']
            
        );
        $eventC->updateEvent($event, $_POST["id"]);
        header('Location:ListEvents.php');
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
    <button><a href="ListEvents.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $event = $eventC->showEvent($_POST['id']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id :
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $event['id']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="host">host:
                        </label>
                    </td>
                    <td><input type="text" name="host" id="firstName" value="<?php echo $event['firstName']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="lastName" value="<?php echo $event['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                <td>
                    <label for="description">description:
                    </label>
                </td>
                <td><input type="text" name="description" id="description" ></td>
            </tr>
            <tr>
                <td>
                    <label for="location">location:
                    </label>
                </td>
                <td>
                    <input type="text" name="location" id="location">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date">Date :
                    </label>
                </td>
                <td>
                    <input type="date" name="date" id="date">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="status">status:
                    </label>
                </td>
                <td><input type="text" name="status" id="status" maxlength="20"></td>
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