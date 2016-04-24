<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../styles/style.css"/>
        <title>Administration</title>
        <?php 
        include ('includes/ad_header.php');
        include ('includes/ad_menus.php'); 
        ?>
    </head>
    <body>
        <center>
            <div class="body">
                <?php 
                if(isset($_GET['mess']))
                {
                    ?>
                    <div class="message">
                        <?php 
                        $mess = $_GET['mess'];
                        switch ($mess)
                        {
                            case '1':
                                echo 'Mauvais identifiant ou mot de passe !';
                                break;
                            
                            case '2':
                               echo 'Merci de vous connecter';
                                break;
                            
                            case '3':
                                echo 'Erreur dans le formulaire !';
                                break;
                            
                            case '4':
                                echo 'Token expiré !';
                                break;
                            
                            case '5':
                                echo 'Vous êtes connecté !';
                                break;
                            
                            case '6':
                                echo 'Vous êtes déjà connecté !';
                                break;
                            
                            case '7':
                                echo 'Vous êtes déconnecté !';
                                break;
                        }                   
                        ?>
                    </div>  
                    <?php 
                }    
                if(!isset($_SESSION['ndc']))
                {
                    ?>
                    <html>
                        <h1>Interface de Connexion</h1>
                        <form action='includes/connexion.php' method='post'>
                            Votre Nom de Compte : <br>
                            <input type='text' name='ndc' required/><br>
                            Votre Mot de passe : <br>
                            <input type='password' name='mdp' required/><br>
                            <input type='submit' value="Connexion">
                        </form>
                    </html>
                    <?php
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
                }
                ?>
            </div>
        </center>
    </body>
</html>