<?php
session_start();

require_once '../config.php';

$userId = $_GET['id'];


var_dump($userId);
$token = $_GET['token'];
$type=$_GET['type'];
$pdo = config::getConnexion();
//verifier que l'utilisateur s'est inscrit

if($type==1)
{
$query = "SELECT * FROM users WHERE id= ?";
$req = $pdo->prepare($query);
$req->execute([$userId]);
$user = $req->fetch();
if ($user /*&& $token == $user->confirmation_token*/) {
      $query = "UPDATE users SET confirmation_token = NULL, confirmation_at = NOW() WHERE id= ?";
      $req = $pdo->prepare($query);
      $req->execute([$userId]);
      $_SESSION['flash']['success'] = "Votre compte a bien été validé";
      $_SESSION['auth'] = $user;

    //  header('Location: login.html');
} else {
      $_SESSION['flash']['danger'] = "Ce compte n'existe pas";
     // header('Location: register.html');// on ramène l'utilisateur sur register
}
}
else
{
      $query = "SELECT * FROM agence WHERE id= ?";
      $req = $pdo->prepare($query);
      $req->execute([$userId]);
      $agence = $req->fetch();   
      if ($agence /*&& $token == $user->confirmation_token*/) {
            $query = "UPDATE agence SET confirmation_token = NULL, confirmation_at = NOW() WHERE id= ?";
            $req = $pdo->prepare($query);
            $req->execute([$userId]);
            $_SESSION['flash']['success'] = "Votre compte a bien été validé";
            $_SESSION['auth'] = $agence;
      
           // header('Location: login.html');
      } else {
            $_SESSION['flash']['danger'] = "Ce compte n'existe pas";
           // header('Location: register.html');// on ramène l'utilisateur sur register
      }
}