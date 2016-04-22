<?php 
session_start();
include ('../includes/bdd.php');
if(isset($_SESSION['ndc']))
{
	$reponse = $bdd->query('SELECT id, titre, auteur, date_at FROM billets ORDER BY date_at DESC');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../styles/style.css"/>
		<title>Liste des Billets</title>
		<?php 
		include ('includes/ad_header.php');
		include ('includes/ad_menus.php'); 
		?>
	</head>        

<body>
	<div class="body">
		<center>
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
							echo 'Billet ajouté avec succès !';
							break;
						
						case '2':
							echo 'Billet modifié avec succès !';
							break;
						
						case '3':
							echo 'Billet supprimé avec succès !';
							break;
						
						case '4':
							echo 'Le Billet n\'existe pas';
							break;
						
						case '5':
							echo 'Mauvais token !';
							break;
						
						case '6':
							echo 'Problèmes aux niveaux des paramètres GET';
							break;
						
						case '7':
							echo 'Merci de remplir tout les champs';
							break;
					}					
					?>
				</div>	
				<?php 
			}  
			////////////////////////////////////////////////////
			//////////////////Liste des Billet//////////////////
			////////////////////////////////////////////////////
			?>
  			<h1>Affichage des billets</h1>
  			<table>
     			<tr>
         			<th>ID</th>
         			<th>Titre</th>
         			<th>Date</th>
         			<th>Action</th>
     			</tr>
  				<?php
  				while ($news = $reponse->fetch()) 
  				{
  					$id = htmlspecialchars($news['id']);
  					$titre = htmlspecialchars($news['titre']);
  					$auteur = htmlspecialchars($news['auteur']);
    				$date = date_create(htmlspecialchars($news['date_at']));
    				$date_f = date_format($date, 'd/m/Y à H:i');
    				?>
    				<tr>
         				<td><?php echo $id; ?></td>
         				<td><?php echo $titre; ?></td>
        				<td><?php echo $date_f;?></td>
         				<td><a href="action_billets.php?action=1&billet=<?php echo $id; ?>"> <input type="button" value="Voir"></a>   <a href="action_billets.php?action=2&billet=<?php echo $id; ?>"> <input type="button" value="Modifier"></a>   <a href="action_billets.php?action=3&billet=<?php echo $id; ?>"><input type="button" value="Supprimer"></a></td>
    				</tr>
    				<?php
  				}
  				?>
  			</table>	
  			<?php
			//////////////////////////////////////////////////////
			//////////////////Creation de Billet//////////////////
			//////////////////////////////////////////////////////		
			$time_actuel = time();
			$login = $_SESSION['ndc'];
			$token = sha1($time_actuel.$login.$time_actuel);
			$_SESSION['token'] = $token;
			$_SESSION['tokentime'] = time();
			?>
			<h1>Création de billet</h1>
			<div class="formulaire">
				<form method="post" action="includes/formulaires_post.php?formulaire=1">
					<label>Titre :</label>
					<input type="text" name="titre"/>
					<label>Auteur :</label>
					<input type="text" name="auteur" value="Admin"/><br /><br /><br />
					<label>Ecrire le nouveau Billet :</label><br />
					<textarea name="billet_ecris" rows="20" cols="180"></textarea><br>
					<input type="hidden" name="token" value ="<?php echo $token;?>"/>
					<input type='submit' value="Valider"> 
				</form>
			</div>
		</center>
	</div>
</body>
<?php
$reponse->closeCursor();
}
else 
{
	header('Location: index.php?mess=2');
}
?>

</html>