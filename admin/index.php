<?php include ('../includes/session.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../styles/style.css"/>
        <title>Administration</title>
        <?php 
        include ('../includes/header.php');
        include ('includes/ad_menus.php'); 
        ?>
    </head>
<body>
    <div class="body">

    <?php 
    if(!isset($_SESSION['ndc']))
    {
        ?>
        <html>
            <h1>Interface de Connexion</h1>
            <form action='includes/connexion.php' method='post'>
                <input type='text' name='ndc'/>         Votre Nom de Compte <br>
                <input type='password' name='mdp'/>     Votre Mot de passe <br>
                <br><input type='submit' value="Connexion">
            </form>
        </html>
        <?php
        if(isset($_GET['erreur']) AND $_GET['erreur'] = 1)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        if(isset($_GET['erreur']) AND $_GET['erreur'] = 2)
        {
            echo 'Merci de vous connecter';
        }
    }
    else
    { 
    ?>
        <center>
            <h1>Interface d'Administration</h1>
            <nav id="menu_admin">
                <li><a href="billets.php">Billets</a></li>
                <li><a href="commentaires.php">Commentaires</a></li>
            </nav> 
        </center> 
        <?php
        if(isset($_GET['erreur']) AND $_GET['erreur'] = 3)
        {
            echo 'Erreur dans le formulaire !';
        }
        if(isset($_GET['erreur']) AND $_GET['erreur'] = 4)
        {
            echo 'Token expiré !';
        }
    }
    ?>

    </div>
</body>
</html>