<?php
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
        header("Location: login.php");
        exit();
    }
}
function reconnect_auto()
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
        $req = $pdo->prepare("SELECT * FROM admin WHERE id = ?");
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
function checkAdmin($userId){

    $db = config::getConnexion();
    try {
        $query = $db->prepare(
            'SELECT * FROM admin WHERE id = :id'
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

