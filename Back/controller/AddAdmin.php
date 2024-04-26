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

$controlAdmin = new AdminC();
$errors = []; 

// Vérification du champ "username"
if (empty($_POST['username']) || !preg_match("#^[a-zA-Z0-9_]+$#", $_POST['username'])) {
    $errors['username'] = "Votre pseudo n'est pas valide";
} else {
        $query = "SELECT * FROM admin WHERE username = ?";
    
        $req = $pdo->prepare($query);
        $req->execute([$_POST['username']]);
        if ($req->fetch()) {
            $errors['username'] = "Ce pseudo n'est plus disponible";
        }
}
// Validation du champ "email"
if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Votre email n'est pas valide";
} else {
        $query = "SELECT * FROM admin WHERE email = ?";

        $req = $pdo->prepare($query);
        $req->execute([$_POST['email']]);
        if ($req->fetch()) {
            $errors['email'] = "Cette adresse est déjà prise";
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
            $query = "SELECT * FROM admin WHERE image = ?";

            $req = $pdo->prepare($query);
            $req->execute([$image]);
            if ($req->fetch()) {
                $errors['image'] = "Cette image n'est plus disponible";
            }
        } 
}


if (empty(($errors))) {
    
    //CRYPTAGE  du mot de passe(hacker)
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $token = generateToken(100);

        $newAdmin = new Admin($_POST['username'], $_POST['email'], $_FILES['image']['name'], $password);
        if (!$controlAdmin->addAdmin($newAdmin)) {
            $_SESSION['flash']['error'] = "Une erreur s'est produite lors de la création de l'agence.";
            header('Location:../view/login.html');
        }

    $userId = $pdo->lastInsertId(); //renvoyer l'identifiant de la dernière qui vient de s'inscrire  
    echo $userId;
    var_dump($userId);

    // Enregistrement du token dans la base de données
    $query = $pdo->prepare('UPDATE admin SET confirmation_token = :token WHERE id = :userId');
    $query->bindParam(':token', $token);
    $query->bindParam(':userId', $userId);
    $query->execute();

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
        http://localhost/gestion_users/Back/view/confirm.php?id=$userId&token=$token";

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