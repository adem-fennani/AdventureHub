<?php

require_once '../controller/UsersC.php';
require_once '../model/User.php';
require_once '../config.php';
//require_once '../controller/loginController.php';
require_once '../view/functions.php';
session_start();

// Vérifier si la clé 'userId' est définie dans $_SESSION
if(isset($_SESSION['userId'])) {
    $userId = $_SESSION["userId"];
    echo 'User ID: ' . $userId;


            if(isset($_POST['newUsername'])){
                $newUserName = $_POST['newUsername'];
                $userId = $_SESSION['userId'];
            
                $control = new AdminC();
                $control->updateAdminUsername($newUserName,$userId);
                header("location:../controller/profilAdmin.php");
            }
            else if(isset($_POST['newEmail'])){
                $newEmail = $_POST['newEmail'];
                $userId = $_SESSION['userId'];
            
                $control = new AdminC();
                $control->updateAdminEmail($newEmail,$userId);
                header("location:../controller/profilAdmin.php");
            }
            else if(isset($_FILES['newImage'])) {
                $newImage = $_FILES['newImage'];
                $userId = $_SESSION['userId'];
                
                // Assurez-vous que le fichier a été téléchargé avec succès
                if ($newImage['error'] === UPLOAD_ERR_OK) {
                    // Obtenez le chemin temporaire du fichier téléchargé
                    $tempFilePath = $newImage['tmp_name'];
            
                    // Maintenant, vous pouvez déplacer ce fichier téléchargé vers l'emplacement souhaité
                    // Par exemple, si vous voulez le déplacer vers un répertoire d'images spécifique, vous pouvez faire quelque chose comme ça
                    $destination = "image/" . $newImage['name'];
                    move_uploaded_file($tempFilePath, $destination);
                    
                    $control = new AdminC();
                    $control->updateAdminImage($destination, $userId);
                    
                    header("location:../controller/profilAdmin.php");
                } else {
                    // Gérer les erreurs de téléchargement
                    echo "Une erreur s'est produite lors du téléchargement du fichier.";
                }
            }
            
            else if(isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword']) ){
                $oldPassword = $_POST['oldPassword'];
                $newPassword = $_POST['newPassword']; 
                $userId = $_SESSION['userId'];
            
                $admin = checkAdmin($userId);
                if($admin!=NULL){
                    $cryptedPassword = $admin['password'];
                    if(password_verify($oldPassword,$cryptedPassword)==false) {
                        header("Location:../controller/profilAdmin.php?error=3");
                        exit; // Assurez-vous de quitter le script après une redirection
                    } else {
                        $control = new AdminC();
                        $crytedNewPassword = password_hash($newPassword,PASSWORD_DEFAULT);
                        $control->updateAdminPassword($crytedNewPassword,$userId);
                        header("location:../controller/profilAdmin.php");
                        exit; // Assurez-vous de quitter le script après une redirection
                    }
                }
            }

        }else {
            echo 'Session not started or expired'; // Affichez un message si la session n'est pas démarrée ou a expiré
        }
            
?>