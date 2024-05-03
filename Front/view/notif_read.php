<?php
session_start();

// Vérifiez si l'ID de la notification est présent dans les paramètres de la requête
if (isset($_POST['notification_id'])) {
    // Récupérez l'ID de la notification à marquer comme lue
    $notification_id = $_POST['notification_id'];

    require_once '../config.php'; // Inclure votre fichier de configuration de la base de données

    try {
        $pdo = config::getConnexion();

        // Récupérez le type de destinataire de la notification (par exemple, 'user' ou 'agency')
        $query = "SELECT type FROM notification WHERE userId = :notification_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':notification_id', $notification_id, PDO::PARAM_INT);
        $stmt->execute();
        $recipient_type = $stmt->fetchColumn();
 
        // Préparez la requête SQL pour mettre à jour la notification comme lue
        $query = "UPDATE notification SET status = 'read' WHERE userId = :notification_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':notification_id', $notification_id, PDO::PARAM_INT);

        // Exécutez la requête
        $stmt->execute();
        var_dump($recipient_type);
        // Redirigez l'utilisateur vers la page appropriée en fonction du type de destinataire
        if ($recipient_type === 'user') {
            header("Location: profil_user.php");
        } elseif ($recipient_type === 'agency') {
            header("Location: profil_agence.php");
        } else {
            // Gérez d'autres types de destinataires ici
            // Redirigez vers une page d'erreur par défaut si le type de destinataire n'est pas reconnu
            header("Location: error.php");
            var_dump("error de type");
        }
        exit();
    } catch (PDOException $e) {
        // En cas d'erreur lors de la mise à jour de la notification, affichez un message d'erreur ou redirigez vers une page d'erreur
        echo "Erreur : " . $e->getMessage();
        exit();
    }
} else {
    // Si l'ID de la notification n'est pas présent dans les paramètres de la requête, redirigez vers une page d'erreur ou affichez un message d'erreur
    header("Location: error.php");
    var_dump("error de page");
    exit();
    
}
 ?>