<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('includes/db.php');  // Inclure le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];  // Récupérer le mot de passe du formulaire

    if (!empty($email) && !empty($password)) {
        // Vérifier si l'email existe déjà
        $check_email_sql = $conn->prepare("SELECT id FROM agents WHERE email = ?");
        $check_email_sql->bind_param("s", $email);
        $check_email_sql->execute();
        $check_email_sql->store_result();

        if ($check_email_sql->num_rows > 0) {
            echo "Cet email est déjà utilisé. Veuillez en choisir un autre.";
        } else {
            // Hachage du mot de passe pour la sécurité
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Préparer la requête SQL pour insérer les données
            $sql = $conn->prepare("INSERT INTO agents (email, password) VALUES (?, ?)");
            if ($sql === false) {
                die('Erreur de préparation de la requête : ' . $conn->error);
            }

            $sql->bind_param("ss", $email, $hashed_password);

            // Exécuter la requête
            if ($sql->execute()) {
                // Redirection vers la page de connexion après succès
                header("Location: index.php");
                exit();  // S'assurer que le script s'arrête après la redirection
            } else {
                echo "Erreur lors de l'insertion : " . $conn->error;
            }
            
            $sql->close();  // Fermer la requête
        }

        $check_email_sql->close();  // Fermer la requête de vérification
    } else {
        echo "Tous les champs sont requis.";
    }
}

$conn->close();  // Fermer la connexion à la base de données
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <style>
        input{
    display:block;
    margin-bottom:20px;
    width: 50%;
    text-align:center;
    padding:5px 10px;
    border-radius:5px;
    
}
button{
    padding:10px 15px;
    background-color:blue;
    border:none;
    box-shadow:6px 6px 30px blue;
    border-radius:5px;
    margin-bottom:5px;
   

}

center{
    margin-top:120px ;
    margin-bottom:200px;
}

    </style>
    <?php include('includes/header.php'); ?>  <!-- Inclure le fichier header.php après les traitements PHP -->
     <center>
     <font color="blue"><h1>Inscription Agent</h1></font>
    <form method="POST" action="register.php">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">S'inscrire</button>
    </form></center>
    
    <?php include('includes/footer.php'); ?>  <!-- Inclure le footer -->
</body>
</html>
