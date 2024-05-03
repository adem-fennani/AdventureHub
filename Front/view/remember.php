<?php
session_start();
require_once '../controller/UsersC.php';
require_once '../model/User.php';
require_once '../config.php';
require_once '../view/functions.php';
//require_once '../view/login.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../view/phpmailer/src/PHPMailer.php';
require_once '../view/phpmailer/src/SMTP.php';
if (isset($_GET['userType'])) {
    // Utilisez $_GET['userType'] en toute sécurité ici
    $userType = $_GET['userType'];
    echo "La valeur de userType est : $userType";
if ($userType === 'user') {
    //$id = $_GET['id'];

    reconnect_auto_user();
    $pdo = config::getConnexion();
   //echo 'La valeur de userType est : ' . $_SESSION['userType'];
if (!empty($_POST) && !empty($_POST['email'])) {
    $query = "SELECT * FROM users WHERE email =? AND confirmation_at IS NOT NULL";
    $req = $pdo->prepare($query);
    $req->execute([$_POST['email']]);

    $user = $req->fetch();

    if ($user) {
        //session_start();
        $reset_token = generateToken(100);
        $query = "UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id =?";
        $req = $pdo->prepare($query);
        $req->execute([$reset_token, $user['id']]);
        $type=1;
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

$message = "Afin de reinitialiser votre password, merci de cliquer sur ce lien\n\n
http://localhost/gestion_users/Front/view/reset.php?id={$user['id']}&token=$reset_token&type=$type";


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
}
}
}
if ($userType === 'agence') {
    //$id = $_GET['id'];

    reconnect_auto_user();
    $pdo = config::getConnexion();
   //echo 'La valeur de userType est : ' . $_SESSION['userType'];
if (!empty($_POST) && !empty($_POST['email'])) {
    $query = "SELECT * FROM agence WHERE email =? AND confirmation_at IS NOT NULL";
    $req = $pdo->prepare($query);
    $req->execute([$_POST['email']]);

    $user = $req->fetch();

    if ($user) {
        //session_start();
        $reset_token = generateToken(100);
        $query = "UPDATE agence SET reset_token = ?, reset_at = NOW() WHERE id =?";
        $req = $pdo->prepare($query);
        $req->execute([$reset_token, $user['id']]);
        $type = 0;
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

$message = "Afin de reinitialiser votre password, merci de cliquer sur ce lien\n\n
http://localhost/gestion_users/Front/view/reset.php?id={$user['id']}&token=$reset_token&type=$type";


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
}
}
}
} else {
    echo "La clé 'userType' n'est pas définie dans l'URL.";
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

</head>
<body>
<div class="col-md-8 col-md-offset-2">
    <h1 style="color: black;">Rappel de mot de passe</h1>

    <form action="http://localhost/gestion_users/Front/view/remember.php?userType=<?php echo isset($_GET['userType']) ? $_GET['userType'] : ''; ?>" method="post"> 
 
        <fieldset>
            <div class="from-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group" style="margin-top: 20px;">
                <input class="btn btn-primary" type="submit" value="soumettre">
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