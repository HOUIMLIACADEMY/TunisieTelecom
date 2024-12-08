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
    <h1>Ajouter un Client</h1>
    <form method="POST" action="save_client.php">
        <label for="name">Nom du Client :</label>
        <input type="text" id="name" name="name" required>
        
        <label for="contract">Numéro du Contrat :</label>
        <input type="text" id="contract" name="contract" required>
        
        <label for="phone">Numéro de Téléphone :</label>
        <input type="text" id="phone" name="phone" required>

        <button type="submit">Ajouter</button>
    </form>
</main>
</center>
<?php include('includes/footer.php'); ?>
