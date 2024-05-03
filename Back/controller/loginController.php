<?php
session_start();

require_once '../config.php';
require_once '../view/functions.php';
echo "Chemin de l'image actuelle : " . $_SESSION['image'];
    reconnect_auto();
    $pdo = config::getConnexion();
    if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $query = "SELECT * FROM admin WHERE (username = :username OR email = :email) AND confirmation_at IS NOT NULL";
        $req = $pdo->prepare($query);
        //$req->execute(['username' => $_POST['username']]);
        $req->execute([
            'username' => $_POST['username'],
            'email' => $_POST['username']
        ]);
        $user = $req->fetch();

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['success'] = "Connexion effectuée avec succès";

            if (isset($_POST['remember'])) {
                $remember_token = generateToken(100);
                $query = "UPDATE admin SET remember_token = ? WHERE id = ?";
                $pdo->prepare($query)->execute([$remember_token, $user->id]);
                //stocker le jeton dans le cookie
                setcookie("remember", $user->id . "::" . $remember_token . sha1($user->id . "AdventureHub"), time() + 60 * 60 * 24 * 7);
            }
            $_SESSION["userId"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["image"] = $user["image"];
            $_SESSION["password"] = $user["password"];


            header("Location: ../view/index.php");
            exit();
        } else {
            $_SESSION['flash']['danger'] = "Identifiant ou Mot de passe incorrect";
            header("Location: ../view/login.html");
        }
    }
?>