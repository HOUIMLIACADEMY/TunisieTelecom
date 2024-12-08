<?php
// Inclure le fichier de connexion à la base de données
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $contract = $_POST['contract'];
    $phone = $_POST['phone'];

    // Vérifier si les champs sont remplis
    if (!empty($name) && !empty($contract) && !empty($phone)) {
        // Préparer et exécuter la requête SQL pour insérer les données
        $sql = $conn->prepare("INSERT INTO clients (name, contract, phone) VALUES (?, ?, ?)");
        if ($sql === false) {
            die('Erreur de préparation de la requête : ' . $conn->error);
        }

        $sql->bind_param("sss", $name, $contract, $phone);

        if ($sql->execute()) {
            // Rediriger vers la page qui affiche les clients après le succès
            header("Location: view_client.php");
            exit();
        } else {
            echo "Erreur lors de l'insertion du client : " . $conn->error;
        }

        $sql->close();  // Fermer la requête
    } else {
        echo "Tous les champs sont requis.";
    }
}

$conn->close();  // Fermer la connexion à la base de données
?>
