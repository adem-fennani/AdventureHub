<?php

session_start();

require_once '../controller/UsersC.php';
require_once '../model/User.php';
require_once '../config.php';
require_once '../view/functions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../view/phpmailer/src/PHPMailer.php';
require_once '../view/phpmailer/src/SMTP.php';

$pdo = config::getConnexion();
var_dump($_FILES['image']['name']);
if(isset($_POST['userType'])) {
    // Récupérer la valeur de "userType"
    $userType = $_POST['userType'];
var_dump($userType);
}
$controlUser = new UserC();
$controlAgence = new AgenceC();
$errors = []; 
// Validation du champ "prenom"
if ($_POST['userType']=='user' && (empty($_POST['prenom']) || !preg_match("/^[a-zA-Z0-9_]+$/", $_POST['prenom']))) {
    $errors['prenom'] = "Votre prénom n'est pas valide";
} else {
    $query = ''; // Initialisation de la variable $query

    if ($_POST['userType'] === 'user') {
        // Vérification de l'unicité du prénom pour les utilisateurs
        $query = "SELECT * FROM users WHERE prenom = ?";
    } /*else {
        // Type d'utilisateur non reconnu
        $errors['userType'] = "Type d'utilisateur non valide";
    }*/

    if (!empty($query)) { // Vérification si $query n'est pas vide
        $req = $pdo->prepare($query);
        $req->execute([$_POST['prenom']]);
        if ($req->fetch()) {
            $errors['prenom'] = "Ce prénom n'est plus disponible";
        }
    }
}
// Validation du champ "nom"
if ($_POST['userType']=='user' && (empty($_POST['nom']) || !preg_match("/^[a-zA-Z0-9_]+$/", $_POST['nom']))) {
    $errors['nom'] = "Votre nom n'est pas valide";
} else {
    $query = ''; // Initialisation de la variable $query

    if ($_POST['userType'] === 'user') {
        // Vérification de l'unicité du nom pour les utilisateurs
        $query = "SELECT * FROM users WHERE nom = ?";
    }/*else {
        // Type d'utilisateur non reconnu
        $errors['userType'] = "Type d'utilisateur non valide";
    }*/

    if (!empty($query)) { // Vérification si $query n'est pas vide
        $req = $pdo->prepare($query);
        $req->execute([$_POST['nom']]);
        if ($req->fetch()) {
            $errors['nom'] = "Ce nom n'est plus disponible";
        }
    }
}
// Vérification du champ "username"
if (empty($_POST['username']) || !preg_match("#^[a-zA-Z0-9_]+$#", $_POST['username'])) {
    $errors['username'] = "Votre pseudo n'est pas valide";
} else {
    if ($_POST['userType'] === 'user') {
        // Vérification de l'unicité du pseudo pour les utilisateurs
        $query = "SELECT * FROM users WHERE username = ?";
    } elseif ($_POST['userType'] === 'agence') {
        // Vérification de l'unicité du pseudo pour les agences
        $query = "SELECT * FROM agence WHERE username = ?";
    } else {
        // Valeur inattendue pour $_POST['userType']
        $errors['userType'] = "Type d'utilisateur inconnu";
    }

    if (!isset($errors['userType'])) {
        $req = $pdo->prepare($query);
        $req->execute([$_POST['username']]);
        if ($req->fetch()) {
            $errors['username'] = "Ce pseudo n'est plus disponible";
        }
    }
}
// Validation du champ "email"
if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Votre email n'est pas valide";
} else {
    $query = ''; // Initialisation de la variable $query

    if ($_POST['userType'] === 'user') {
        // Vérification de l'unicité de l'adresse e-mail pour les utilisateurs
        $query = "SELECT * FROM users WHERE email = ?";
    } elseif ($_POST['userType'] === 'agence') {
        // Vérification de l'unicité de l'adresse e-mail pour les agences
        $query = "SELECT * FROM agence WHERE email = ?";
    } else {
        // Type d'utilisateur non reconnu
        $errors['userType'] = "Type d'utilisateur non valide";
    }

    if (!empty($query)) { // Vérification si $query n'est pas vide
        $req = $pdo->prepare($query);
        $req->execute([$_POST['email']]);
        if ($req->fetch()) {
            $errors['email'] = "Cette adresse est déjà prise";
        }
    }
}
// Validation du champ "dob"
if($_POST['userType']=='user'){
if ( (empty($_POST['dob']) || !strtotime($_POST['dob']))) {
    $errors['dob'] = "Veuillez saisir une date de naissance valide";
} else {
    $query = ''; // Initialisation de la variable $query

    if ($_POST['userType'] === 'user') {
        // Vérification de l'unicité de la date de naissance pour les utilisateurs
        $query = "SELECT * FROM users WHERE dob = ?";
    } elseif ($_POST['userType'] === 'agence') {
        // Vérification de l'unicité de la date de naissance pour les agences
        $query = "SELECT * FROM agence WHERE dob = ?";
    } else {
        // Type d'utilisateur non reconnu
        $errors['userType'] = "Type d'utilisateur non valide";
    }

    if (!empty($query)) { // Vérification si $query n'est pas vide
        $req = $pdo->prepare($query);
        $req->execute([$_POST['dob']]);
        if ($req->fetch()) {
            $errors['dob'] = "Cette date de naissance n'est plus disponible";
        }
    }
}
}
// Validation du champ "adresse"
if (empty($_POST['adresse']) || !preg_match("/^[a-zA-Z0-9]+$/", $_POST['adresse'])) {
    $errors['adresse'] = "Votre adresse n'est pas valide";
} else {
    if ($_POST['userType'] === 'user') {
        // Vérification de l'unicité de l'adresse pour les utilisateurs
        $query = "SELECT * FROM users WHERE adresse = ?";
    } elseif ($_POST['userType'] === 'agence') {
        // Vérification de l'unicité de l'adresse pour les agences
        $query = "SELECT * FROM agence WHERE adresse = ?";
    }

    if (isset($query)) {
        $req = $pdo->prepare($query);
        $req->execute([$_POST['adresse']]);
        if ($req->fetch()) {
            $errors['adresse'] = "Cette adresse n'est plus disponible";
        }
    }
}
// Validation du champ "numero"
if (empty($_POST['numero']) || !preg_match("/^[0-9]+$/", $_POST['numero'])) {
    $errors['numero'] = "Veuillez saisir un numéro de téléphone valide (chiffres uniquement)";
} else {
    $query = ''; // Initialisation de la variable $query

    if ($_POST['userType'] === 'user') {
        // Vérification de l'unicité du numéro pour les utilisateurs
        $query = "SELECT * FROM users WHERE numero = ?";
    } elseif ($_POST['userType'] === 'agence') {
        // Vérification de l'unicité du numéro pour les agences
        $query = "SELECT * FROM agence WHERE numero = ?";
    } else {
        // Type d'utilisateur non reconnu
        $errors['userType'] = "Type d'utilisateur non valide";
    }

    if (!empty($query)) { // Vérification si $query n'est pas vide
        $req = $pdo->prepare($query);
        $req->execute([$_POST['numero']]);
        if ($req->fetch()) {
            $errors['numero'] = "Ce numéro de téléphone n'est plus disponible";
        }
    }
}
// Validation du champ "image"
if (empty($_FILES['image']['name'])) {
    $errors['image'] = "Veuillez sélectionner une image";
} else {
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    // Vérification de l'extension de l'image
    $allowed_extensions = array('jpg', 'jpeg', 'png');
    if (!in_array($image_extension, $allowed_extensions)) {
        $errors['image'] = "Veuillez sélectionner une image avec une extension valide (jpg, jpeg ou png)";
    } else {
        $query = ''; // Initialisation de la variable $query

        if ($_POST['userType'] === 'user') {
            // Vérification de l'unicité de l'image pour les utilisateurs
            $query = "SELECT * FROM users WHERE image = ?";
        } elseif ($_POST['userType'] === 'agence') {
            // Vérification de l'unicité de l'image pour les agences
            $query = "SELECT * FROM agence WHERE image = ?";
        }

        if ($query !== '') {
            $req = $pdo->prepare($query);
            $req->execute([$image]);
            if ($req->fetch()) {
                $errors['image'] = "Cette image n'est plus disponible";
            }
        } else {
            $errors['image'] = "Erreur: userType non défini";
        }
    }
}


if (empty(($errors))) {
    
    //CRYPTAGE  du mot de passe(hacker)
    //var_dump($_POST['userType']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $token = generateToken(100);
    
   /* if($_POST['userType']=='user')
    $newUser = new User($_POST['prenom'], $_POST['nom'], $_POST['username'], $_POST['email'], $_POST['dob'], $_POST['adresse'], $_POST['numero'], $_FILES['image']['name'], $password, $_POST['userType']);

    $newAgence = new Agence($_POST['username'], $_POST['email'], $_POST['adresse'], $_POST['numero'], $_FILES['image']['name'], $password, $_GET['userType']);
*/
    // ...
    if ($_POST['userType'] === 'user') {
        
        $type = 1; //tous les user sont de type 1
        $newUser = new User($_POST['prenom'], $_POST['nom'], $_POST['username'], $_POST['email'], $_POST['dob'], $_POST['adresse'], $_POST['numero'], $_FILES['image']['name'], $password, $_POST['userType']);
        if (!$controlUser->addUser($newUser)) {
            $_SESSION['flash']['error'] = "Une erreur s'est produite lors de la création de l'utilisateur.";
            //header('Location:../View/login.html');
            header('Location:../View/login.html?userType=' . $_POST['userType']);
            var_dump($_POST['userType']);
        }
    } else if ($_POST['userType'] === 'agence') {
        $type = 0; //tous les agences sont de types 0
        $newAgence = new Agence($_POST['username'], $_POST['email'], $_POST['adresse'], $_POST['numero'], $_FILES['image']['name'], $password, $_POST['userType']);
        if (!$controlAgence->addAgence($newAgence)) {
            $_SESSION['flash']['error'] = "Une erreur s'est produite lors de la création de l'agence.";
            header('Location:../View/login.html?userType=' . $_POST['userType']);
            var_dump($_POST['userType']);
        }
    }

    $userId = $pdo->lastInsertId(); //renvoyer l'identifiant de la dernière qui vient de s'inscrire  
    echo $userId;
    var_dump($userId);

    // ENVOI DU MAIL
    $mail = new PHPMailer(true);
    $mailAddress = $_POST['email'];
    $headers = "From:gnine.diarra@esprit.tn";
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth = true;             //Enable SMTP authentication
    $mail->Username = 'gnine.diarra@esprit.tn';   //SMTP write your email
    $mail->Password = 'fuupeumqyupsmbvd';      //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit SSL encryption
    $mail->Port = 587;
    //Recipients
    $mail->setFrom("gnine.diarra@esprit.tn", "AdventureHub"); // Sender Email and name
    $mail->addAddress($mailAddress);     //Add a recipient email  
    $mail->addReplyTo("gnine.diarra@esprit.tn", "AdventureHub"); // reply to sender email

    $message = "Afin de confirmer votre compte, merci de cliquer sur ce lien\n\n
        http://localhost/gestion_users/Front/view/confirm.php?id=$userId&token=$token&type=$type";

    $subject = "confirmation du compte";
    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = $subject;   // email subject headings
    $mail->Body = $message; //email message

    try {
        $mail->send();
        $_SESSION['flash']['success'] = "Compte créé avec succès ! Veuillez vérifier votre boîte mail afin de confirmer votre compte.";
    } catch (Exception $e) {
        $_SESSION['flash']['error'] = "Une erreur s'est produite lors de l'envoi de l'e-mail de confirmation. Veuillez réessayer plus tard.";
        // Vous pouvez afficher les détails de l'erreur pour le débogage
        echo 'Erreur lors de l\'envoi de l\'e-mail : ', $mail->ErrorInfo;
    }
}else{
    foreach ($errors as $error) {
        echo $error; // Afficher les erreurs à l'utilisateur
    }
}


?>