<?php
session_start();  // Démarrer la session

// Vérifier si une session est active
if (isset($_SESSION['loggedin'])) {
    // Détruire toutes les variables de session
    $_SESSION = array();

    // Si un cookie de session est utilisé, le supprimer
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Détruire la session
    session_destroy();
}

// Rediriger vers la page de connexion (index.php)
header("Location: index.php");
exit;
?>
