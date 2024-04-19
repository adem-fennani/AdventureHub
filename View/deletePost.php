<?php
include '../Controller/PostController.php';
$postC = new PostC();
$postC->deletePost($_GET["id"]);
header('Location:showPost.php');
?>