<?php

require_once "../config.php";
require_once "../model/User.php";

class UserC{
    function addUser($newUser){
        $db = config::getConnexion();

        try {
            
            $query = $db->prepare(
                'INSERT INTO users (/*id,*/prenom,nom,username,email,dob,adresse,numero,image,password) 
                    VALUES (/*:id,*/:prenom,:nom,:username,:email,:dob,:adresse,:numero,:image,:password)'
            );
            $query->execute([
                //'id' => $newUser->getId(),
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
    public function countUsers() {
        $db = config::getConnexion();
        try {
            $query = $db->prepare('SELECT COUNT(*) FROM users');
            $query->execute();
            $result = $query->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            echo "Erreur lors du comptage des utilisateurs : " . $e->getMessage();
        }
        return 0;
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
    function countAgences() {
        $db = config::getConnexion();
        try {
            $query = $db->prepare('SELECT COUNT(*) FROM agence');
            $query->execute();
            $result = $query->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            echo "Erreur lors du comptage des agences : " . $e->getMessage();
        }
        return 0;
    }
}

class NotificationC{


    function addNotification($newNotif){
        $db = config::getConnexion();

        try {
            
            $query = $db->prepare(
                'INSERT INTO notification (type,userId,message,dateReceived,status) 
                    VALUES (:type,:userId,:message,:dateReceived,:status)'
            );
            $query->execute([
                //'id' => $newAgence->getId(),

               
                'type' => $newNotif->getType(),
                'userId'=> $newNotif->getUserId(),
                'message' => $newNotif->getMessage(),
                'dateReceived' => $newNotif->getDateReceived(),
                'status' => $newNotif->getStatus(),

            ]);
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
        }
    }


    function getMessage($idUser) {
        $db = config::getConnexion();
        $users = [];
        try {
            $query = $db->prepare('SELECT * FROM notification where userId= :idUser');
            $query->execute(['idUser'=>$idUser]);
            $result=$query->fetchAll();
            return $result;
            
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des agences : " . $e->getMessage();
        }
        return $users;
    }
    // Fonction pour compter le nombre de notifications lues
function countReadNotifications() {
    try {
        $pdo = config::getConnexion();
        $query = "SELECT COUNT(*) FROM notification WHERE status = 'read'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $count_read = $stmt->fetchColumn();
        return $count_read;
    } catch (PDOException $e) {
        // En cas d'erreur lors de la récupération des statistiques, affichez un message d'erreur ou redirigez vers une page d'erreur
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

// Fonction pour compter le nombre de notifications non lues
function countUnreadNotifications() {
    try {
        $pdo = config::getConnexion();
        $query = "SELECT COUNT(*) FROM notification WHERE status = 'unread'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $count_unread = $stmt->fetchColumn();
        return $count_unread;
    } catch (PDOException $e) {
        // En cas d'erreur lors de la récupération des statistiques, affichez un message d'erreur ou redirigez vers une page d'erreur
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

}
class OnligneC{
      function countLoggedInUsers() {
        // Connexion à la base de données
        $pdo = config::getConnexion();
        
        // Préparer la requête pour compter tous les utilisateurs connectés
        $query = "SELECT COUNT(*) FROM onligne";
        $stmt = $pdo->query($query);
        
        // Récupérer le nombre d'utilisateurs connectés
        $loggedInUsersCount = $stmt->fetchColumn();
        
        return $loggedInUsersCount;
    }
    
}
?>