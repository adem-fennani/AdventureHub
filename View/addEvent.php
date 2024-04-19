<?php

include '../Controller/EventC.php';

$error = "";

// create event
$event = null;

// create an instance of the controller
$eventC = new EventC();
if (
    isset($_POST["host"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["location"]) &&
    isset($_POST["date"]) &&
    isset($_POST["status"])
) {
    if (
        
        !empty($_POST["host"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["location"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["status"])
    ) {
        $event = new event(
            null,
            $_POST['host'],
            $_POST['nom'],
            $_POST['description'],
            $_POST['location'],
            new DateTime($_POST['date']),
            $_POST['status']
        );
        $eventC->addevent($event);
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
    <a href="ListEvents.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="host">host:
                    </label>
                </td>
                <td><input type="text" name="host" id="host" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="nom">nom:
                    </label>
                </td>
                <td><input type="text" name="nom" id="nom" maxlength="20"></td>
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