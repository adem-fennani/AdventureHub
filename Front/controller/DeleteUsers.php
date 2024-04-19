<?php

require_once '../controller/UsersC.php';
require_once '../model/User.php';
require_once '../config.php';
//include_once "../Controller/loginControl.php";

session_start();

// Vérifier si la clé 'userId' est définie dans $_SESSION
if (isset($_SESSION["type"])) {
    $userId = $_SESSION["userId"];
    echo 'User ID: ' . $userId;
    //$control = new UserC();
    //$control->deleteUser($userId);
    $searchUser = "user";
    $searchAgence = "agence";
    $searchADM = "ADM";

    if ($_SESSION["type"]===$searchUser) {
    //if (preg_match("/{$searchUser}/i", $userId)) {
        $control = new UserC();
        echo 'User ID: ' . $userId;
        //notifyAdministrator('delatedAccount',$_SESSION['userName'],$_SESSION['userId'],'student');
        $control->deleteUser($userId);

        $_SESSION['userId'] = "";
        $_SESSION["prenom"] = "";
        $_SESSION["nom"] = "";
        $_SESSION['username'] = "";
        $_SESSION["email"] = "";
        $_SESSION["dob"] = "";
        $_SESSION["adresse"] = "";
        $_SESSION["numero"] = "";
        $_SESSION["image"] = "";
        $_SESSION["password"] = "";
        $_SESSION['type'] = "";
        $_SESSION = null;
        session_destroy();
        header("location:../View/index.html");
    }

    //else if (preg_match("/{$searchAgence}/i", $userId)) {
        else if ($_SESSION["type"]===$searchAgence) {
        $control = new AgenceC();
        echo 'User ID: ' . $userId;
        //notifyAdministrator('delatedAccount',$_SESSION['userName'],$_SESSION['userId'],'teacher');
        $control->deleteAgence($userId);
        //$_SESSION['loggedIn'] = false;
        $_SESSION['userId'] = "";
        $_SESSION['username'] = "";
        $_SESSION["email"] = "";
        $_SESSION["adresse"] = "";
        $_SESSION["numero"] = "";
        $_SESSION["image"] = "";
        $_SESSION["password"] = "";
        $_SESSION['type'] = "";
        $_SESSION = null;
        session_destroy();
        header("location:../View/index.html");
    }
    //==================== DELETING TEACHER PART ENDS =============================
} else {
    // La clé 'userId' n'est pas définie dans $_SESSION
    // Gérer l'erreur ou rediriger l'utilisateur vers une autre page
    var_dump("non la cle n'est pas defini dans session");
}
?>