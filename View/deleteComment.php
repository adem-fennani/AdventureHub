<?php
include '../Controller/CommentController.php';
$commentC = new CommentC();
$commentC->deleteComment($_GET["id"]);
header('Location:showPost.php');
?>