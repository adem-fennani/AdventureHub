<?php
session_start();
setcookie("remember", "", -1);
unset($_SESSION['auth']);//detruire la session
$_SESSION['flash']['success'] = "Vous etes deconnecte avec success";

header("Location: login.php");