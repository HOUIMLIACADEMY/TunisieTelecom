<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
include('includes/db.php');
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
<main>
    <center>

    
    <h1>Liste des Clients</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Contrat</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>

        <?php
        // Récupérer les clients depuis la base de données
        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Afficher chaque client dans une ligne de tableau
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['contract']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                echo "<td>";
                // Lien pour modifier le client avec l'ID
                echo "<a href='edit_client.php?id=" . $row['id'] . "'>Modifier</a> | ";
                // Lien pour supprimer le client avec confirmation
                echo "<a href='delete_client.php?id=" . $row['id'] . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce client ?\");'>Supprimer</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Aucun client trouvé.</td></tr>";
        }
        ?>

    </table>
</main>
</center>

<?php include('includes/footer.php'); ?>

<?php $conn->close(); ?>
