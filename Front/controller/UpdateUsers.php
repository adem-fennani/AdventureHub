<?php

require_once '../controller/UsersC.php';
require_once '../model/User.php';
require_once '../config.php';
require_once '../controller/loginController.php';
require_once '../view/functions.php';
//session_start();

// Vérifier si la clé 'userId' est définie dans $_SESSION
if (isset($_SESSION["type"])) {
    $userId = $_SESSION["userId"];
    echo 'User ID: ' . $userId;
    //$control = new UserC();
    //$control->deleteUser($userId);
    $searchUser = "user";
    $searchAgence = "agence";
    $searchADM = "ADM";

    if ($_SESSION["type"]===$searchUser) {
        if(isset($_POST['newPrenom'])){
            $newPrenom = $_POST['newPrenom'];
            $userId = $_SESSION['userId'];
        
            $control = new UserC();
            $control->updateUserPrenom($newPrenom,$userId);
            header("location:../view/profil_user.php");
        }
        else if(isset($_POST['newNom'])){
            $newNom = $_POST['newNom'];
            $userId = $_SESSION['userId'];
        
            $control = new UserC();
            $control->updateUserNom($newNom,$userId);
            header("location:../view/profil_user.php");
        }
        else if(isset($_POST['newUsername'])){
            $newUserName = $_POST['newUsername'];
            $userId = $_SESSION['userId'];
        
            $control = new UserC();
            $control->updateUserUsername($newUserName,$userId);
            header("location:../view/profil_user.php");
        }
        else if(isset($_POST['newEmail'])){
            $newEmail = $_POST['newEmail'];
            $userId = $_SESSION['userId'];
        
            $control = new UserC();
            $control->updateUserEmail($newEmail,$userId);
            header("location:../view/profil_user.php");
        }
        
        else if(isset($_POST['newDob'])){
            $newDob = $_POST['newDob'];
            $userId = $_SESSION['userId'];
        
            $control = new UserC();
            $control->updateUserDob($newDob,$userId);
            header("location:../view/profil_user.php");
        }
        else if(isset($_POST['newAdresse'])){
            $newAdresse = $_POST['newAdresse'];
            $userId = $_SESSION['userId'];
        
            $control = new UserC();
            $control->updateUserAdresse($newAdresse,$userId);
            header("location:../view/profil_user.php");
        }
        else if(isset($_POST['newNumero'])){
            $newNumero = $_POST['newNumero'];
            $userId = $_SESSION['userId'];
        
            $control = new UserC();
            $control->updateUserNumero($newNumero,$userId);
            header("location:../view/profil_user.php");
        }
        else if (isset($_FILES['newImage']) && $_FILES['newImage']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "uploads/"; // Changez ce chemin selon vos besoins
            $fileName = basename($_FILES["newImage"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $check = getimagesize($_FILES["newImage"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["newImage"]["tmp_name"], $targetFilePath)) {
                    $control = new UserC();
                    $control->updateUserImage($targetFilePath, $userId);
                    header("location:../view/profil_user.php");
                } else {
                    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                }
            } else {
                echo "Le fichier n'est pas une image.";
            }
        }

        else if(isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword']) ){
            $oldPassword = $_POST['oldPassword'];
            $newPassword = $_POST['newPassword'];
            $userId = $_SESSION['userId'];
        
            
            $user = checkUser($userId);
            if($user!=NULL){
                
                $cryptedPassword = $user['password'];
            if(password_verify($oldPassword,$cryptedPassword)==false)
                header("Location:../view/profil_user.php?error=3");
            else {
                $control = new UserC();
                $crytedNewPassword = password_hash($newPassword,PASSWORD_DEFAULT);
                $control->updateUserPassword($crytedNewPassword,$userId);
                //$_SESSION['loggedIn'] = true;
                header("location:../view/profil_user.php");
            }
            }
        }
    }

    //else if (preg_match("/{$searchAgence}/i", $userId)) {
        else if ($_SESSION["type"]===$searchAgence) {
            if(isset($_POST['newUsername'])){
                $newUserName = $_POST['newUsername'];
                $userId = $_SESSION['userId'];
            
                $control = new AgenceC();
                $control->updateAgenceUsername($newUserName,$userId);
                header("location:../view/profil_agence.php");
            }
            else if(isset($_POST['newEmail'])){
                $newEmail = $_POST['newEmail'];
                $userId = $_SESSION['userId'];
            
                $control = new AgenceC();
                $control->updateAgenceEmail($newEmail,$userId);
                header("location:../view/profil_agence.php");
            }
            else if(isset($_POST['newAdresse'])){
                $newAdresse = $_POST['newAdresse'];
                $userId = $_SESSION['userId'];
            
                $control = new AgenceC();
                $control->updateAgenceAdresse($newAdresse,$userId);
                header("location:../view/profil_agence.php");
            }
            else if(isset($_POST['newNumero'])){
                $newNumero = $_POST['newNumero'];
                $userId = $_SESSION['userId'];
            
                $control = new AgenceC();
                $control->updateAgenceNumero($newNumero,$userId);
                header("location:../view/profil_agence.php");
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
                    $destination = "../image/" . $newImage['name'];
                    move_uploaded_file($tempFilePath, $destination);
            
                    // Assurez-vous de traiter correctement le fichier téléchargé
                    // Vous pouvez également ajouter des vérifications supplémentaires, telles que la taille ou le type de fichier
                    // Ensuite, vous pouvez effectuer d'autres actions, comme mettre à jour la base de données, etc.
                    
                    $control = new AgenceC();
                    $control->updateAgenceImage($destination, $userId);
                    
                    header("location:../view/profil_agence.php");
                } else {
                    // Gérer les erreurs de téléchargement
                    echo "Une erreur s'est produite lors du téléchargement du fichier.";
                }
            }
            
            else if(isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword']) ){
                $oldPassword = $_POST['oldPassword'];
                $newPassword = $_POST['newPassword']; 
                $userId = $_SESSION['userId'];
            
                $agence = checkAgence($userId);
                if($agence!=NULL){
                    $cryptedPassword = $agence['password'];
                    if(password_verify($oldPassword,$cryptedPassword)==false) {
                        header("Location:../view/profil_agence.php?error=3");
                        exit; // Assurez-vous de quitter le script après une redirection
                    } else {
                        $control = new AgenceC();
                        $crytedNewPassword = password_hash($newPassword,PASSWORD_DEFAULT);
                        $control->updateAgencePassword($crytedNewPassword,$userId);
                        header("location:../view/profil_agence.php");
                        exit; // Assurez-vous de quitter le script après une redirection
                    }
                }
            }
            
    }
    
} else {
    // La clé 'userId' n'est pas définie dans $_SESSION
    // Gérer l'erreur ou rediriger l'utilisateur vers une autre page
    var_dump("non la cle n'est pas defini dans session");
}
?>