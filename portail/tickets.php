<?php include('includes/header.php'); ?>
<?php include('includes/db.php'); ?>

<style>
    main{
    margin-top:120px ;
    margin-bottom:200px;
}
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 18px;
        text-align: left;
    }
    th, td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
    a {
        color: blue;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>

<main>
    <center>
    <h1>Tickets de Support</h1></center>
    <table>
        <tr>
            <th>ID</th>
            <th>Client</th>
            <th>Problème</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>

        <?php
        // Récupérer les tickets depuis la base de données
        $sql = "SELECT * FROM tickets";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['client_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['problem']) . "</td>";
                echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                echo "<td>";
                if ($row['status'] != 'Résolu') {
                    echo "<a href='resolve_ticket.php?id=" . $row['id'] . "'>Résoudre</a>";
                } else {
                    echo "Résolu";
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Aucun ticket trouvé.</td></tr>";
        }
        ?>
    </table>
</main>

<?php include('includes/footer.php'); ?>
