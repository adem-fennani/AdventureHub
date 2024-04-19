<?php

require_once "../config.php";
require_once "../model/User.php";

/*function notifyAdministrator($type,$userName,$userId,$userType){
    $db = config::getConnexion();
    $date = date('y-m-d-H-i-s');
    
    if($type=='registration')
        $message = "New User Registration. ";
    else if($type=='delatedAccount')
        $message = "User Account Delated. ";
    
    $message.=" ".$userType.", ".$userName." with User Id: ".$userId;
    if($type=='registration')
        $message .= " has registered to EduEasy.";
    else if($type=='delatedAccount')
        $message .= " has deleted his EduEasy Account.";
        
        try {
            $query = $db->prepare(
                'INSERT INTO notification (number,type,message,dateReceived) 
                    VALUES (:number,:type,:message,:dateReceived) '
            );
            $query->execute([
                'number' => 0,
                'type' => $type,
                'message' => $message,
                'dateReceived' => $date
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
}*/

class UserC{


    function addUser($newUser){
        $db = config::getConnexion();

        try {
            
            $query = $db->prepare(
                'INSERT INTO users (id,prenom,nom,username,email,dob,adresse,numero,image,password) 
                    VALUES (:id,:prenom,:nom,:username,:email,:dob,:adresse,:numero,:image,:password)'
            );
            $query->execute([
                'id' => $newUser->getId(),
                'prenom' => $newUser->getPrenom(),
                'nom' => $newUser->getNom(),
                'username' => $newUser->getUsername(),
                'email' => $newUser->getEmail(),
                'dob' => $newUser->getDob(),
                'adresse' => $newUser->getAdresse(),
                'numero' => $newUser->getNumero(),
                'image' => $newUser->getImage(),
                'password' => $newUser->getPassword()
                /*'confirmation_token' => $newUser->getConfirmation_token(),
                'confirmation_at' => $newUser->getConfirmation_at(),
                'reset_token' => $newUser->getReset_token(),
                'reset_at' => $newUser->getReset_at(),
                'remember_at' => $newUser->getRemember_at()*/
            ]);
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
        }
    }

    function updateUserPrenom($newPrenom,$userId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE users SET prenom= :prenom where id = :id'
            );
            $query = $query->execute([
                'prenom' => $newPrenom,
                'id' => $userId
            ]);
            $_SESSION['username'] = $newPrenom;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    function updateUserNom($newNom,$userId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE users SET nom= :nom where id = :id'
            );
            $query = $query->execute([
                'nom' => $newNom,
                'id' => $userId
            ]);
            $_SESSION['nom'] = $newNom;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    function updateUserUsername($newUsername,$userId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE users SET username= :username where id = :id'
            );
            $query = $query->execute([
                'username' => $newUsername,
                'id' => $userId
            ]);
            $_SESSION['username'] = $newUsername;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function updateUserEmail($newEmail,$userId){
        
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE users SET email= :email where id = :id'
            );
            $query = $query->execute([
                'email' => $newEmail,
                'id' => $userId
            ]);
            $_SESSION['email'] = $newEmail;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    function updateUserDob($newDob,$userId){
        
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE users SET dob= :dob where id = :id'
            );
            $query = $query->execute([
                'dob' => $newDob,
                'id' => $userId
            ]);
            $_SESSION['dob'] = $newDob;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    function updateUserAdresse($newAdresse,$userId){
        
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE users SET adresse= :adresse where id = :id'
            );
            $query = $query->execute([
                'adresse' => $newAdresse,
                'id' => $userId
            ]);
            $_SESSION['adresse'] = $newAdresse;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    function updateUserNumero($newNumero,$userId){
        
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE users SET numero= :numero where id = :id'
            );
            $query = $query->execute([
                'numero' => $newNumero,
                'id' => $userId
            ]);
            $_SESSION['numero'] = $newNumero;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    function updateUserImage($newImage,$userId){
        
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE users SET image= :image where id = :id'
            );
            $query = $query->execute([
                'image' => $newImage,
                'id' => $userId
            ]);
            $_SESSION['image'] = $newImage;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function updateUserPassword($newPassword,$userId){
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE users SET password= :password where id = :id'
            );
            $query = $query->execute([
                'password' => $newPassword,
                'id' => $userId
            ]);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    function deleteUser($userId){

        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM users WHERE id = :id'
            );
            $query->execute([
                'id' => $userId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}


class AgenceC{


    function addAgence($newAgence){
        $db = config::getConnexion();

        try {
            
            $query = $db->prepare(
                'INSERT INTO agence (username,email,adresse,numero,image,password) 
                    VALUES (:username,:email,:adresse,:numero,:image,:password)'
            );
            $query->execute([
                //'id' => $newAgence->getId(),
                'username' => $newAgence->getUsername(),
                'email' => $newAgence->getEmail(),
                'adresse' => $newAgence->getAdresse(),
                'numero' => $newAgence->getNumero(),
                'image' => $newAgence->getImage(),
                'password' => $newAgence->getPassword()
            ]);
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
        }
    }

    function updateAgenceUsername($newName,$agenceId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE agence SET username= :username where id = :id'
            );
            $query = $query->execute([
                'username' => $newName,
                'id' => $agenceId
            ]);
            $_SESSION['username'] = $newName;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    function updateAgenceImage($newImage,$agenceId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE agence SET image= :image where id = :id'
            );
            $query = $query->execute([
                'image' => $newImage,
                'id' => $agenceId
            ]);
            $_SESSION['image'] = $newImage;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function updateAgenceAdresse($newAdresse,$agenceId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE agence SET adresse= :adresse where id = :id'
            );
            $query = $query->execute([
                'adresse' => $newAdresse,
                'id' => $agenceId
            ]);
            $_SESSION['adresse'] = $newAdresse;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function updateAgenceNumero($newNumero,$agenceId){

        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE agence SET numero= :numero where id = :id'
            );
            $query = $query->execute([
                'numero' => $newNumero,
                'id' => $agenceId
            ]);
            $_SESSION['numero'] = $newNumero;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    function updateAgenceEmail($newEmail,$agenceId){
        
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE agence SET email= :email where id = :id'
            );
            $query = $query->execute([
                'email' => $newEmail,
                'id' => $agenceId
            ]);
            $_SESSION['email'] = $newEmail;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    function updateAgencePassword($newPassword,$agenceId){
        $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE agence SET password= :password where id = :id'
            );
            $query = $query->execute([
                'password' => $newPassword,
                'id' => $agenceId
            ]);
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    function deleteAgence($agenceId){

        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM agence WHERE id = :id'
            );
            $query->execute([
                'id' => $agenceId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

?>