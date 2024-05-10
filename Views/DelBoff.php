<?php
include '../Controller/PackC.php';
include '../Controller/ReclamationC.php';
$reclamationC = new ReclamationC();
$reclamationC->deleteReclamation($_GET["id"]);
header('Location:backoffice.php');
$packC = new PackC();
$packC->deletePack($_GET["id"]);
header('Location:backoffice.php');

?>