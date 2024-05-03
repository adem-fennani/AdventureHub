<?php
// Vérifiez si l'ID de la notification est présent dans les paramètres de la requête
if (isset($_GET['notification_id'])) {
    // Récupérez l'ID de la notification à marquer comme lue
    $notification_id = $_GET['notification_id'];

    // Effectuez les opérations de mise à jour dans votre base de données pour marquer la notification comme lue
    // Par exemple, si vous utilisez PDO :
    require_once 'config.php'; // Inclure votre fichier de configuration de la base de données

    try {
        $pdo = config::getConnexion();

        // Préparez la requête SQL pour mettre à jour la notification comme lue
        $query = "UPDATE notification SET status = 'read' WHERE id = :notification_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':notification_id', $notification_id, PDO::PARAM_INT);

        // Exécutez la requête
        $stmt->execute();

        // Redirigez l'utilisateur vers la page où il peut voir ses notifications mises à jour
        header("Location: notifications.php");
        exit();
    } catch (PDOException $e) {
        // En cas d'erreur lors de la mise à jour de la notification, affichez un message d'erreur ou redirigez vers une page d'erreur
        echo "Erreur : " . $e->getMessage();
        exit();
    }
} else {
    // Si l'ID de la notification n'est pas présent dans les paramètres de la requête, redirigez vers une page d'erreur ou affichez un message d'erreur
    header("Location: error.php");
    exit();
}
?>
