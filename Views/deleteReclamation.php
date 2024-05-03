<?php
include '../Controller/ReclamationC.php';
$reclamationC = new ReclamationC();
$reclamationC->deleteReclamation($_GET["id"]);
header('Location:ListReclamation.php');
?>