<?php
//session_start();
require_once '../view/functions.php';
//is_connect();
require_once '../config.php';

if (isset($_POST['userType']) && $_POST['userType'] === 'user') {

    reconnect_auto_user();
    $pdo = config::getConnexion();
    if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $query = "SELECT * FROM users WHERE email = :email  AND confirmation_at IS NOT NULL";
        $req = $pdo->prepare($query);
        //$req->execute(['username' => $_POST['username']]);

        $req->execute([
            'email' => $_POST['email']

        ]);
        $user = $req->fetch();

        var_dump($user);


        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        if ($user != null && password_verify($_POST['password'], $user['password'])) {

            // Obtenez l'ID de l'utilisateur à partir de la session ou de toute autre source
            $idUtilisateur = $_SESSION["userId"]; // exemple d'accès à l'ID de l'utilisateur depuis la session

            // Préparez votre requête SQL pour insérer l'ID de l'utilisateur dans la table `onligne`
            $query = $pdo->prepare('INSERT INTO onligne (id, time) VALUES (:id, NOW())');

            // Liez la valeur de l'ID de l'utilisateur à la requête préparée
            $query->bindParam(':id', $idUtilisateur);

            // Exécutez la requête
            $query->execute();

            $_SESSION['flash']['success'] = "Connexion effectuée avec succès";
            $_SESSION['auth'] = $user;

            if (isset($_POST['remember'])) {
                $remember_token = generateToken(100);
                $query = "UPDATE users SET remember_token = ? WHERE id = ?";
                $pdo->prepare($query)->execute([$remember_token, $user['id']]);
                //stocker le jeton dans le cookie
                setcookie("remember", $user['id'] . "::" . $remember_token . sha1($user['id'] . "AdventureHub"), time() + 60 * 60 * 24 * 7);
            }
            $_SESSION["userId"] = $user["id"];
            $_SESSION["prenom"] = $user["prenom"];
            $_SESSION["nom"] = $user["nom"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["dob"] = $user["dob"];
            $_SESSION["adresse"] = $user["adresse"];
            $_SESSION["numero"] = $user["numero"];
            $_SESSION["image"] = $user["image"];
            $_SESSION["password"] = $user["password"];
            $_SESSION["type"] = "user";


            header("Location: ../view/index.php");


            exit();
        } else {
            $_SESSION['flash']['danger'] = "Identifiant ou Mot de passe incorrect";
            header("Location: ../view/login.php");
        }
    }
}

if (isset($_POST['userType']) && $_POST['userType'] === 'agence') {
    reconnect_auto_agence();
    $pdo = config::getConnexion();
    if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $query = "SELECT * FROM agence WHERE email = :email AND confirmation_at IS NOT NULL";
        $req = $pdo->prepare($query);
        //$req->execute(['username' => $_POST['username']]);
        $req->execute([
            'email' => $_POST['email']
        ]);
        $user = $req->fetch();

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['flash']['success'] = "Connexion effectuée avec succès";
            $_SESSION['auth'] = $user;

            if (isset($_POST['remember'])) {
                $remember_token = generateToken(100);
                $query = "UPDATE users SET remember_token = ? WHERE id = ?";
                $pdo->prepare($query)->execute([$remember_token, $user->id]);
                //stocker le jeton dans le cookie
                setcookie("remember", $user->id . "::" . $remember_token . sha1($user->id . "AdventureHub"), time() + 60 * 60 * 24 * 7);
            }
            $_SESSION["userId"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["adresse"] = $user["adresse"];
            $_SESSION["numero"] = $user["numero"];
            $_SESSION["image"] = $user["image"];
            $_SESSION["password"] = $user["password"];
            $_SESSION["type"] = "agence";


            header("Location: ../view/index.php");
            exit();
        } else {
            $_SESSION['flash']['danger'] = "Identifiant ou Mot de passe incorrect";
            header("Location: ../view/login.php");
        }
    }
}

?>