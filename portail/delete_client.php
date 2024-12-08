<?php
include('includes/db.php');  // Inclure le fichier de connexion à la base de données

// Vérifier si l'ID du client est passé dans l'URL
if (isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Supprimer le client de la base de données
    $sql = $conn->prepare("DELETE FROM clients WHERE id = ?");
    $sql->bind_param("i", $client_id);

    if ($sql->execute()) {
        // Rediriger vers la liste des clients après la suppression
        header("Location: view_client.php");
        exit();
    } else {
        echo "Erreur lors de la suppression du client : " . $conn->error;
    }

    $sql->close();
} else {
    echo "Aucun client spécifié.";
    exit();
}

$conn->close();
?>
