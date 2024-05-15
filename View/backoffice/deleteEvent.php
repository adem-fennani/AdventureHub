<?php
include '../../Controller/EventC.php';
$eventC = new EventC();
$eventC->deleteEvent($_GET["ide"]);
header('Location:ListEvents.php');
