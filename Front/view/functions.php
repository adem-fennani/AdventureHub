<?php
include_once "../config.php";
$pdo = config::getConnexion();
function generateToken($length)
{
    $alphanum = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    //var_dump(strstr(str_shuffle(str_repeat($alphanum, 100)),0,100));
    return substr(str_shuffle(str_repeat($alphanum, $length)), 0, $length);

}

function is_connect()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['auth'])) {
        $_SESSION['flash']['danger'] = "Vous ne pouvez pas accéder à cette page";
        header("Location: ../view/login.php");
        exit();
    }
}

function reconnect_auto_user()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_COOKIE['remember']) && !isset($_SESSION['auth'])) {
        require_once '../config.php';
        if (!isset($pdo)) {
            global $pdo;
        }
        $remember_token = $_COOKIE['remember'];
        $parts = explode("::", $remember_token);
        $userId = $parts[0];
        $req = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $req->execute([$userId]);
        $user = $req->fetch();

        if ($user) {
            $expected = $userId . "::" . $user->remember_token . sha1($user->id . "AdventureHub");
            if ($expected == $_COOKIE['remember']) {
                $_SESSION["auth"] = $user;
                $_SESSION['flash']['success'] = "Connexion effectuée avec succès";

                setcookie("remember", $remember_token, time() + 60 * 60 * 24 * 7);
                header("Location: index.php");
                exit();
            } else {
                setcookie("remember", "", -1);
            }
        } else {
            setcookie("remember", "", -1);
        }
    }
}

function reconnect_auto_agence()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_COOKIE['remember']) && !isset($_SESSION['auth'])) {
        require_once '../config.php';
        if (!isset($pdo)) {
            global $pdo;
        }
        $remember_token = $_COOKIE['remember'];
        $parts = explode("::", $remember_token);
        $userId = $parts[0];
        $req = $pdo->prepare("SELECT * FROM agence WHERE id = ?");
        $req->execute([$userId]);
        $agence = $req->fetch();

        if ($agence) {
            $expected = $userId . "::" . $agence->remember_token . sha1($agence->id . "AdventureHub");
            if ($expected == $_COOKIE['remember']) {
                $_SESSION["auth"] = $agence;
                $_SESSION['flash']['success'] = "Connexion effectuée avec succès";

                setcookie("remember", $remember_token, time() + 60 * 60 * 24 * 7);
                header("Location: index.php");
                exit();
            } else {
                setcookie("remember", "", -1);
            }
        } else {
            setcookie("remember", "", -1);
        }
    }
}

function checkUser($userId){

    $db = config::getConnexion();
    try {
        $query = $db->prepare(
            'SELECT * FROM users WHERE id = :id'
        );
        $query->execute([
            'id' => $userId
        ]);
        return $query->fetch();
    } catch (PDOException $e) {
        error_log('Erreur lors de laffichage de l\'utilisateur: ' . $e->getMessage());
        echo 'Erreur lors de laffichage de l\'utilisateur.';
    }
}

function checkAgence($userId){
    $db = config::getConnexion();
    try {
        $query = $db->prepare(
            'SELECT * FROM agence WHERE id = :id'
        );
        $query->execute([
            'id' => $userId
        ]);
        return $query->fetch(); // Retourne le résultat de la requête
    } catch (PDOException $e) {
        error_log('Erreur lors de laffichage de lagence: ' . $e->getMessage());
        echo 'Erreur lors de laffichage de lagence.';
    }
}
