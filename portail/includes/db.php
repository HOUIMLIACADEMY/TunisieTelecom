<?php
$servername = "localhost";  // L'adresse du serveur
$username = "root";         // Nom d'utilisateur pour la connexion à MySQL
$password = "";             // Mot de passe pour la connexion à MySQL (typiquement vide pour XAMPP)
$dbname = "client_portal";  // Le nom de la base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
