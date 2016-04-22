<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../styles/style.css"/>
<title>Billets</title>    

<?php 
include ('includes/ad_header.php');
include ('includes/ad_menus.php'); 
?>
</head>


<div class="body">

<?php
include ('../includes/bdd.php');
if(isset($_SESSION['ndc']))
{
	if(isset($_GET['action']) AND !empty($_GET['action']) AND $_GET['action'] > 0 AND $_GET['action'] <= 4 AND isset($_GET['billet']) AND $_GET['billet'] > 0 AND !empty($_GET['billet']))	
	{
		$billet = $_GET['billet'];
		/////////////////////////////////////////
		//////////////Voir Billet////////////////
		/////////////////////////////////////////
		if($_GET['action'] == 1)
		{
			$reponse = $bdd->prepare("SELECT id, titre, auteur, message, date_at FROM billets WHERE id = :id");
			$reponse->bindParam('id',$billet,PDO::PARAM_INT);
			$reponse->execute();
			$billet_affi = $reponse->fetch();
			if($billet_affi)
			{
				$id = htmlspecialchars($billet_affi['id']);
				$titre = htmlspecialchars($billet_affi['titre']);
				$auteur = htmlspecialchars($billet_affi['auteur']);
				$message = htmlspecialchars($billet_affi['message']);
				$af_message = nl2br($message);
    			$date = date_create(htmlspecialchars($billet_affi['date_at']));
    			$date_f = date_format($date, 'd/m/Y à H:i');
				?>
				<div class="news_contenu">
					<h1>
						<?php echo $titre; ?>
					</h1>
					<p>
						<?php echo $af_message; ?>
					</p>
					<font size="2">
						<?php echo 'Ecris par '.$auteur.' le '.$date_f.''; ?>
					</font>	
				</div>
				<?php
				$reponse->closeCursor();
			}
			else
			{
				header('Location: billets.php?mess=4');
			}
		}
		/////////////////////////////////////////////
		///////////////Modifier Billet///////////////
		/////////////////////////////////////////////
		elseif($_GET['action'] == 2)
		{
			if(isset($_GET['mess']))
			{
				?>
				<div class="message">
					<?php
					if($_GET['mess'] == 1)
					{
						echo "Merci de remplir tout les champs";
					}
					?>
				</div>
				<?php
			}
			$time_actuel = time();
			$login = $_SESSION['ndc'];
			$token = sha1($time_actuel.$login.$time_actuel);
			$_SESSION['token'] = $token;
			$_SESSION['tokentime'] = time();	
			$req = $bdd->prepare("SELECT id, titre, auteur, message FROM billets WHERE id = :id");
			$req->bindParam('id',$billet,PDO::PARAM_INT);
			$req->execute();
			$billet_affi = $req->fetch();
			if($billet_affi)
			{
				$id = htmlspecialchars($billet_affi['id']);
				$auteur = htmlspecialchars($billet_affi['auteur']);
				$message = htmlspecialchars($billet_affi['message']);
		 		$titre = htmlspecialchars($billet_affi['titre']);
		 		?>
		 		<center><h1>Modification de billet</h1></center>
				<div class="formulaire">
				<form method="post" action="includes/formulaires_post.php?formulaire=2">
					<label>Titre :</label>
					<input type="text" name="titre" value="<?php echo $titre ?>" /><br /><br />
					<label>Texte :</label><br />
					<textarea name="billet_ecris" rows="20" cols="180"><?php echo $message; ?></textarea><br>
					<label>Auteur :</label>
					<input type="text" name="auteur" value="<?php echo $auteur ?>" /><br /><br /><br />
					<input type="hidden" name="billet_id" value="<?php echo $billet;?>" />
					<input type="hidden" name="token" value="<?php echo $token;?>" />
					<input type='submit' value="Valider">
				</form>
				</div> 
				<?php
				$req->closeCursor();
			}
			else
			{
				header('Location: billets.php?mess=4');
			}
		}
		////////////////////////////////////////
		////////////Supprimer Billet////////////
		////////////////////////////////////////		
		elseif($_GET['action'] == 3)
		{
			$req = $bdd->prepare("SELECT id FROM billets WHERE id = :id");
			$req->bindParam('id',$billet,PDO::PARAM_INT);
			$req->execute();
			$billet_affi = $req->fetch();
			if($billet_affi)
			{
				$req_del = $bdd->prepare("DELETE FROM billets WHERE id = :id");
				$req_del->bindParam('id',$billet,PDO::PARAM_INT);
				$req_del->execute();
				$req_del->closeCursor();
				$req->closeCursor();
				header('Location: billets.php?mess=3');
			}
			else
			{
				header('Location: billets.php?mess=4');
			}
		}			
	} 
	else 
	{ 
		header('Location: billets.php?mess=6');
	}
}
else 
{
	header('Location: index.php');
}
?> 

</div>