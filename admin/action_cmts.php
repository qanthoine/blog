<?php session_start(); ?>

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

<div class="body">

<?php
include ('../includes/bdd.php');
if(isset($_SESSION['ndc']))
{
	if(isset($_GET['action']) AND !empty($_GET['action']) AND $_GET['action'] > 0 AND $_GET['action'] <= 4 AND isset($_GET['cmts']) AND $_GET['cmts'] > 0 AND !empty($_GET['cmts']))
	{
		$id_cmts = $_GET['cmts'];
		/////////////////////////////////////////
		//////////////Voir Commen////////////////
		/////////////////////////////////////////
		if($_GET['action'] == 1)
		{
			$req = $bdd->prepare("SELECT id, auteur, message, date_at, email_atr FROM commentaires WHERE id = :id");
			$req->bindParam('id',$id_cmts,PDO::PARAM_INT);
			$req->execute();
			$cmts_affi = $req->fetch();
			if($cmts_affi)
			{
				$id_cmts_verif = htmlspecialchars($cmts_affi['id']);
				$auteur = htmlspecialchars($cmts_affi['auteur']);
				$message = htmlspecialchars($cmts_affi['message']);
				$af_message = nl2br($message);
				$email = htmlspecialchars($cmts_affi['email_atr']);
    			$date = date_create(htmlspecialchars($cmts_affi['date_at']));
    			$date_f = date_format($date, 'd/m/Y à H:i');	
				$avatar_defaut = urlencode('http://image.noelshack.com/fichiers/2016/15/1460410275-defaut.jpg'); 		
				$avatar = "http://2.gravatar.com/avatar/".md5($email)."?s=100&d=".$avatar_defaut."";
				?>	
				<div class="commentaires">
					<div class="commentaires_contenu">
						<img src="<?php echo $avatar; ?>" alt="avatar"/>
						<p>
							<?php echo $af_message; ?>
						</p>
						<font size="2">
							<?php
							echo 'Ecris par '.$auteur.' le '.$date_f.''; 
							?>
						</font>
					</div>
					<br>	
					<a href="commentaires.php"> <input type="button" value="Retour">
				</div>
				<?php
			}
			else
			{
				header('Location: commentaires.php?erreur=1');
			}
		}
		/////////////////////////////////////////////
		///////////////Modifier Commen///////////////
		/////////////////////////////////////////////
		elseif($_GET['action'] == 2) 
		{
			if(isset($_GET['erreur']) AND $_GET['erreur'] == 1)
			{
				echo "Merci de remplir tout les champs";
			}
			$time_actuel = time();
			$login = $_SESSION['ndc'];
			$token = sha1($time_actuel.$login.$time_actuel);
			$_SESSION['token'] = $token;
			$_SESSION['tokentime'] = time();
			$req = $bdd->prepare("SELECT id, auteur, message, valide FROM commentaires WHERE id = :id");
			$req->bindParam('id',$id_cmts,PDO::PARAM_INT);
			$req->execute();
			$cmts_affi = $req->fetch();
			if($cmts_affi)
			{
				$id = htmlspecialchars($cmts_affi['id']);
				$auteur = htmlspecialchars($cmts_affi['auteur']);
				$message = htmlspecialchars($cmts_affi['message']);
			 	$valide = htmlspecialchars($cmts_affi['valide']);
			 	?>
			 	<center><h1>Modification de commentaire</h1></center>
				<div class="formulaire">
					<form method="post" action="includes/formulaires_post.php?formulaire=3">
						<label>Auteur :</label>
						<input type="text" name="auteur" value="<?php echo $auteur ?>" /><br /><br /><br />
						<label>Commentaire :</label><br />
						<textarea name="cmts_ecris" rows="20" cols="180"><?php echo $message; ?></textarea><br>
						<label>Statut :</label>
						<input type="radio" name="cmts_publication" value="1" id="valide" <?php if($valide == '1'){?> checked="checked" <?php } ?> /> <label for="oui">Publier</label>
						<input type="radio" name="cmts_publication" value="0" id="prevalide" <?php if($valide == '0'){?>checked="checked" <?php } ?> /> <label for="non">Masquer</label><br><br><br>
						<input type="hidden" name="cmts_id" value="<?php echo $id_cmts;?>" />
						<input type="hidden" name="token" value="<?php echo $token;?>" />
						<input type='submit' value="Valider">
					</form>
				</div> 
				<?php
			} 
			else
			{
				header('Location: commentaires.php?erreur=1');
			}
		}
		////////////////////////////////////////
		////////////Supprimer Commen////////////
		////////////////////////////////////////
		elseif($_GET['action'] == 3) 
		{
			$req = $bdd->prepare("SELECT id FROM commentaires WHERE id = :id");
			$req->bindParam('id',$id_cmts,PDO::PARAM_INT);
			$req->execute();
			$cmts_affi = $req->fetch();
			if($cmts_affi)
			{
				$cmts = htmlspecialchars($_GET['cmts']);
				$req_del = $bdd->prepare("DELETE FROM commentaires WHERE id = :id");
				$req_del->bindParam('id',$cmts,PDO::PARAM_INT);
				$req_del->execute();
				$req_del->closeCursor();
				$req->closeCursor();
				header('Location: ../admin/commentaires.php');
			}
			else
			{
				header('Location: commentaires.php?erreur=1');
			}
		}
		////////////////////////////////////////
		////////////Valider Commenta////////////
		////////////////////////////////////////
		elseif($_GET['action'] == 4) 
		{
			$req = $bdd->prepare("SELECT id FROM commentaires WHERE id = :id");
			$req->bindParam('id',$id_cmts,PDO::PARAM_INT);
			$req->execute();
			$cmts_affi = $req->fetch();
			if($cmts_affi)
			{
				$req_val = $bdd->prepare("UPDATE commentaires SET valide = 1 WHERE id = :id");
				$req_val->bindParam('id',$id_cmts, PDO::PARAM_INT);
				$req_val->execute();
				$req_val->closeCursor();
				$req->closeCursor();
				header('Location: ../admin/commentaires.php');
			}
			else
			{
				header('Location: commentaires.php?erreur=1');
			}
		}			
	}
	else
	{ 
		header('Location: commentaires.php');
	}
}
else
{ 
	header('Location: ../admin');
}
?>

</div>
</html>