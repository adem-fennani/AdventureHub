<?php
include '../Controller/EventC.php';
$eventC = new EventC();
$eventC->deleteEvent($_GET["id"]);
header('Location:ListEvents.php');
