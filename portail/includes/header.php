<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail Client</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <style>
        .c1{
            display: flex;
            align-items:center;
            justify-content:space-between;
            width: 70%;

        }
        h1{
            display: inline;
           
        }
        img{
            width: 120px;
            height:80px;
        }
        header{
            background:linear-gradient(90deg,#689dec,#011b41);
            margin-bottom:20px;
        }
    </style>

<header>
    <div class="c1">
        <img src="images/logo.png">

    <h1>Portail de Gestion des Clients</h1>
    </div>
    
    <nav>
        <ul>
            <li><a href="dashboard.php">Tableau de bord</a></li>
            <li><a href="view_client.php">Clients</a></li>
            <li><a href="tickets.php">Tickets de support</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>
</header>
