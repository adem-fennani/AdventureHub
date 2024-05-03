<?php
require_once '../controller/UsersC.php';
require_once '../model/User.php';
require_once '../config.php';
require_once '../view/functions.php';

if (isset($_GET['id']) && isset($_GET['token'])) {
    $userId = $_GET['id'];
    $token = $_GET['token'];
    $type=$_GET['type'];
$pdo = config::getConnexion();
    if($type==1)
{
    //verifier que l'utilisateur s'est inscrit
    $query = "SELECT * FROM users WHERE id= ? AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE) AND confirmation_at IS NOT NULL";
    $req = $pdo->prepare($query);
    $req->execute([$userId, $token]);
    $user = $req->fetch();

    if ($user) {

        if (!empty($_POST)) {

            if (!empty($_POST['password']) || $_POST['password'] == $_POST['password_confirm']) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $query = "UPDATE users SET password = ?, reset_token = NULL, reset_at = NULL WHERE id = ?";
                $pdo->prepare($query)->execute([$password, $userId]);

                $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
                $_SESSION['auth'] = $user;
                header('Location: ../view/index.php');// on ramène l'utilisateur sur login
                exit();
            }
        }else{
            $_SESSION['flash']['danger'] = "Les deux mots de passe ne correspondent pas";
        }
    } else {
        $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
        header('Location: ../view/login.php');// on ramène l'utilisateur sur login
        exit();
    }
}
if($type==0)
{
//verifier que l'utilisateur s'est inscrit
$query = "SELECT * FROM agence WHERE id= ? AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE) AND confirmation_at IS NOT NULL";
$req = $pdo->prepare($query);
$req->execute([$userId, $token]);
$user = $req->fetch();

if ($user) {

    if (!empty($_POST)) {

        if (!empty($_POST['password']) || $_POST['password'] == $_POST['password_confirm']) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $query = "UPDATE agence SET password = ?, reset_token = NULL, reset_at = NULL WHERE id = ?";
            $pdo->prepare($query)->execute([$password, $userId]);

            $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";
            $_SESSION['auth'] = $user;
            header('Location: ../view/index.php');// on ramène l'utilisateur sur login
            exit();
        }
    }else{
        $_SESSION['flash']['danger'] = "Les deux mots de passe ne correspondent pas";
    }
} else {
    $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
    header('Location: ../view/login.php');// on ramène l'utilisateur sur login
    exit();
}
}
}
else {
    header('Location: ../view/login.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Acceuil</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<style>
    body{
        font-family: "Montserrat", sans-serif;
  font-optical-sizing: auto;
  font-style: normal;
    }
    
</style>
<link rel="icon" href="image/logo.png" type="image/png">


<div class="col-md-8 col-md-offset-2">
    <h1 style="color: #fff;">Réinitialiser votre mot de passe</h1>

    <form action="" method="post">
        <fieldset>
            <div class="from-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="from-group">
                <label for="password">Confirmation du mot de passe</label>
                <input type="password" name="password_confirm" id="password" class="form-control">
            </div>
            <div class="form-group" style="margin-top: 20px;">
                <input class="btn btn-primary" type="submit" value="Réinitialiser votre mot de passe">
            </div>
        </fieldset>
    </form>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>AdventureHub - conseils et actualités </p>
</footer>

</body>
</html>