<?php
session_start();

require_once '../config.php';
require_once '../view/functions.php';

if($_SESSION['type']=='user')
{
    header("Location: ../View/profil_user.php");
}
else
{
    header("Location: ../View/profil_agence.php");
}