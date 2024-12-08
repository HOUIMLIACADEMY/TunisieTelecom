<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>

<?php include('includes/header.php'); ?>
<style>
   
    td{
        text-align:center;

    }
    td a{
        text-decoration:none;
        color:blue;
    }
   
</style>
<main><center>
    <h1>Tableau de Bord</h1></center>
     
    <section class="dashboard">
        <div>
            <font color="blue">
            <h3>Espace Clients </h3></font>
            <table>
                <tr>
                    <td> <font color="gray"><h4>Gestion des clients</h4></td></font>
                </tr>
                <tr>
                    <td>  <a href="add_client.php">Ajouter un client</a> | <a href="view_client.php">Voir tous les clients</a></td>
                </tr>
            </table>

            
           
          
        </div>

        <br>
        <br>


        <div>
        <font color="blue">
        <h3>Espace Clients </h3></font>
            <table>
                <tr>
                    <td>
                    <font color="gray">
                    <h4>Tickets de support</h4> </font>
                    </td>
                </tr>
                <tr>
                    <td>
                    <a href="tickets.php">Voir les tickets</a>
                    </td>
                </tr>
            </table>
            
            
        </div>
    </section>
</main>

<?php include('includes/footer.php'); ?>
