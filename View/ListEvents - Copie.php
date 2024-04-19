<?php
include '../Controller/EventC.php';
$eventC = new EventC();
$list = $eventC->listEvents();
?>
<html>

<head></head>

<body>

    <center>
        <h1>List of events</h1>
        <h2>
            <a href="addEvent.php">Add Event</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Event</th>
            <th>Nom</th>
            <th>Host</th>
            <th>Description</th>
            <th>Location</th>
            <th>date</th>
            <th>status</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $event) {
        ?>
            <tr>
                <td><?= $event['id']; ?></td>
                <td><?= $event['nom']; ?></td>
                <td><?= $event['host']; ?></td>
                <td><?= $event['description']; ?></td>
                <td><?= $event['location']; ?></td>
                <td><?= $event['date']; ?></td>
                <td><?= $event['status']; ?></td>
                <td align="center">
                    <form method="POST" action="updateEvent.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $event['id']; ?> name="id">
                    </form>
                </td>
                <td>
                    <a href="deleteEvent.php?id=<?php echo $event['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>