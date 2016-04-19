<!DOCTYPE html>
<html>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="styles/style.css"/>    


		    <nav id="menu">
        	<h3>Navigation</h3>         
            <li><a href="../index.php">Acceuil</a></li>
            <li><a href="index.php">Administration</a></li> 
            <?php
            if(isset($_SESSION['ndc']))
            {
               ?>
        	   <li><a href="includes/deconnexion.php">Deconnexion</a></li>
               <?php 
            } 
            ?>
    		</nav>   
</html>