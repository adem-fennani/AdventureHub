<?php

require_once '../controller/UsersC.php';
require_once '../model/User.php';
require_once '../config.php';
//include_once "../Controller/loginControl.php";

session_start();

// Vérifier si la clé 'userId' est définie dans $_SESSION
    $userId = $_SESSION["userId"];
    echo 'User ID: ' . $userId;

        $control = new AdminC();
        echo 'User ID: ' . $userId;
        //notifyAdministrator('delatedAccount',$_SESSION['userName'],$_SESSION['userId'],'student');
        $control->deleteAdmin($userId);

        $_SESSION['userId'] = "";
        $_SESSION['username'] = "";
        $_SESSION["email"] = "";
        $_SESSION["image"] = "";
        $_SESSION["password"] = "";
        $_SESSION = null;
        session_destroy();
        header("location:../View/index.html");

?>