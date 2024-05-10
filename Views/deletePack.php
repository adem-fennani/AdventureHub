<?php
include '../Controller/PackC.php';
$packC = new PackC();
$packC->deletePack($_GET["id"]);
header('Location:ListPack.php');
