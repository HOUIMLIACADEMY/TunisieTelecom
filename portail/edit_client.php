<?php
include('includes/db.php');  // Inclure le fichier de connexion à la base de données

// Vérifier si l'ID du client est passé dans l'URL
if (isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Récupérer les informations du client à partir de la base de données
    $sql = $conn->prepare("SELECT * FROM clients WHERE id = ?");
    $sql->bind_param("i", $client_id);
    $sql->execute();
    $result = $sql->get_result();
    $client = $result->fetch_assoc();
    if (!$client) {
        echo "Client introuvable.";
        exit();
    }

    $sql->close();
} else {
    echo "Aucun client spécifié.";
    exit();
}

// Traiter le formulaire de mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contract = $_POST['contract'];
    $phone = $_POST['phone'];

    // Vérifier que les champs ne sont pas vides
    if (!empty($name) && !empty($contract) && !empty($phone)) {
        // Requête de mise à jour
        $update_sql = $conn->prepare("UPDATE clients SET name = ?, contract = ?, phone = ? WHERE id = ?");
        $update_sql->bind_param("sssi", $name, $contract, $phone, $client_id);

        if ($update_sql->execute()) {
            // Rediriger après la mise à jour réussie
            header("Location: view_client.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour du client : " . $conn->error;
        }

        $update_sql->close();
    } else {
        echo "Tous les champs sont requis.";
    }
}

$conn->close();
?>

<?php include('includes/header.php'); ?>
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

main{
    margin-top:120px ;
    margin-bottom:200px;
}
#ins{
    text-decoration:none;
    margin-top:10px;
    background:green;
    box-shadow:6px 6px 30px green;
    border-radius:5px;
    padding:10px 15px;
    color:black;
    
}
</style>
<center>
<main>
    <h1>Modifier le Client</h1>
    <form method="POST" action="">
        <label for="name">Nom du Client :</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($client['name']); ?>" required>

        <label for="contract">Numéro du Contrat :</label>
        <input type="text" id="contract" name="contract" value="<?php echo htmlspecialchars($client['contract']); ?>" required>

        <label for="phone">Numéro de Téléphone :</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($client['phone']); ?>" required>

        <button type="submit">Mettre à jour</button>
    </form>
</main>
</center>
<?php include('includes/footer.php'); ?>
