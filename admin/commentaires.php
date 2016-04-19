<?php 
session_start();
include ('../includes/bdd.php');
if(isset($_SESSION['ndc']))
{
	$reponse = $bdd->query('SELECT id, auteur, date_at, news, email_atr, valide FROM commentaires ORDER BY date_at DESC');
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../styles/style.css"/>
		<title>Commentaires</title>        
		<?php 
		include ('../includes/header.php');
		include ('includes/ad_menus.php'); 
		?>
	</head>
<body>
	<div class="body">
  		<center>
  		<?php
  			////////////////////////////////////////////////////
			//////////////////Liste des Commen//////////////////
			////////////////////////////////////////////////////
  		?>
	  		<h1>Affichage des commentaires</h1>
	  		<table>
	     		<tr>
	    		    <th>ID</th>
			        <th>Billet</th>
			        <th>Auteur</th>
			        <th>Email</th>
			        <th>Date</th>
			        <th>Action</th>
			        <th>Validé ?</th>
	     		</tr>
	  			<?php
	  			while ($cmts = $reponse->fetch()) 
	  			{
	  				$id = htmlspecialchars($cmts['id']);
	  				$auteur = htmlspecialchars($cmts['auteur']);
	    			$date = date_create(htmlspecialchars($cmts['date_at']));
	    			$date_f = date_format($date, 'd/m/Y à H:i');
	    			$valide = htmlspecialchars($cmts['valide']);
	    			$news_id = htmlspecialchars($cmts['news']);
	    			$email = htmlspecialchars($cmts['email_atr']);
	    			?>
	    			<tr>
	        			<td><?php echo $id; ?></td>
	        			<td><?php echo $news_id; ?></td>
	        			<td><?php echo $auteur; ?></td>
	        			<td><?php echo $email; ?></td>
	        			<td><?php echo $date_f;?></td>
	        			<td><a href="action_cmts.php?action=1&cmts=<?php echo $id; ?>"> <input type="button" value="Voir"></a>   <a href="action_cmts.php?action=2&cmts=<?php echo $id; ?>"> <input type="button" value="Modifier"></a>   <a href="action_cmts.php?action=3&cmts=<?php echo $id; ?>"><input type="button" value="Supprimer"></a></td>
	         			<td><?php if($valide == 0) {?> <a href="action_cmts.php?action=4&cmts=<?php echo $id; ?>"> <input type="button" value="Valider"></a> <?php } else { echo "Oui"; } ?> </td>
	     			</tr>
	     			<?php
	  			}
	 			?>
	  		</table>
 		</center>
 		<?php		
		//////////////////////////////////////////////////////
		//////////////////Validation des Com//////////////////
		//////////////////////////////////////////////////////	
		if (isset($_GET['erreur']) AND $_GET['erreur'] == 1)
		{
			echo "Le commentaire n'existe pas";
		}
		$time_actuel = time();
		$login = $_SESSION['ndc'];
		$token = sha1($time_actuel.$login.$time_actuel);
		$_SESSION['token'] = $token;
		$_SESSION['tokentime'] = time();	
		$req = $bdd->query('SELECT prevalidation FROM admin');
		$cmts_val = $req->fetch();
		$valide = htmlspecialchars($cmts_val['prevalidation']);
		$req->closeCursor();
		?>
		<center>
			<h1>Options</h1>
			<form action="includes/formulaires_post.php?formulaire=4" method="post">
				Mise en ligne des commentaires ?
				<input type="radio" name="cmts_validation" value="1" id="valide" <?php if($valide == '1'){?> checked="checked" <?php } ?> /> <label for="oui">Automatique</label>
				<input type="radio" name="cmts_validation" value="0" id="prevalide" <?php if($valide == '0'){?>checked="checked" <?php } ?> /> <label for="non">Validation</label><br>
				<input type="hidden" name="token" value="<?php echo $token;?>" />
				<input type="submit" value="Valider" />
			</form>
		</center>
	</div>
</body>


<?php
$reponse->closeCursor();
}

else 
{ 
	header('Location: ../admin');
}
?>

</html>