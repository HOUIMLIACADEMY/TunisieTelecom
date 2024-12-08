<?php
include('includes/db.php');  // Inclure la connexion à la base de données

// Vérifier si l'ID du ticket est passé dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $ticket_id = intval($_GET['id']);  // S'assurer que l'ID est un entier

    // Mettre à jour l'état du ticket à "Résolu"
    $sql = $conn->prepare("UPDATE tickets SET status = 'Résolu' WHERE id = ?");
    $sql->bind_param("i", $ticket_id);

    if ($sql->execute()) {
        // Rediriger vers la page des tickets après la mise à jour
        header("Location: tickets.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour du ticket : " . $conn->error;
    }

    $sql->close();
} else {
    echo "Aucun ticket spécifié.";
    exit();
}

$conn->close();
?>
