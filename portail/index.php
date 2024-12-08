<?php
session_start();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier les informations d'authentification
    $sql = "SELECT * FROM agents WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            header("Location: dashboard.php");
        } else {
            $error = "Identifiants incorrects";
        }
    } else {
        $error = "Identifiants incorrects";
    }
}
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

      <center> <font color="blue"><h1 >Connexion Agent</h1></font>
   
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Email" required>
        
        <input type="password" name="password" placeholder="Mot de passe" required>
       
        <button type="submit">Se connecter</button>
        
       
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    </form>
    <p><a href="register.php" id=ins>Inscrivez-vous ici</a></p>
    </center>
</main>

<?php include('includes/footer.php'); ?>
