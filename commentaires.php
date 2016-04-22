<?php
include ('includes/bdd.php');
if(isset($_GET['billet']) AND $_GET['billet'] >= 1)
{
	$id_billet = htmlspecialchars($_GET['billet']);
	$req_verif = $bdd->prepare("SELECT * FROM billets WHERE id = :id");
	$req_verif->bindParam('id',$id_billet,PDO::PARAM_INT);
	$req_verif->execute();
	$verif = $req_verif->fetch();
	if($verif)
	{
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta charset="utf-8" />
				<link rel="stylesheet" type="text/css" href="styles/style.css"/>
				<title>Commentaires</title>
			</head>
			<?php 
			include ('includes/header.php');
			include ('includes/menus.php'); 
			?>
			<body>
				<div class="body">
					<center>Liste des Commentaires pour le billet n°<?php echo $id_billet?></center> 
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
									echo 'Merci d\'écrire un commentaire';
									break;
								
								case '2':
									echo 'Commentaire ajouté !';
									break;
							}
							?>
						</div>
						<?php	
					}	
					//////////////////////////////////
					//Mise en place de la pagination//
					//////////////////////////////////					
					$cmts_page = 5;
					$cmts_totales_req = $bdd->prepare("SELECT * FROM commentaires WHERE news = :id");
					$cmts_totales_req->bindParam('id',$id_billet,PDO::PARAM_INT);
					$cmts_totales_req->execute();
					$cmts_totales = $cmts_totales_req->rowcount();
					$PgTotales = ceil($cmts_totales/$cmts_page);
					if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $PgTotales)
					{	
						$_GET['page'] = intval($_GET['page']);
						$PgCourante = htmlspecialchars($_GET['page']);
					}
					else 
					{
						$PgCourante = 1;
					}
					$PgPremiere = ($PgCourante-1)*$cmts_page;
					$cmts_totales_req->closeCursor();
					///////////////////////////////////
					///////Affichage des comment///////
					///////////////////////////////////
					?>
					<div class="commentaires">
						<?php
						if($cmts_totales >=1)
						{
							$id_billet = $_GET['billet'];
							$req = $bdd->prepare('SELECT id, auteur, message, date_at, email_atr, valide FROM commentaires WHERE news = :id ORDER BY date_at DESC LIMIT :pgpremiere,:cmts_page');
							$req->bindParam('id',$id_billet,PDO::PARAM_INT);
							$req->bindParam('pgpremiere',$PgPremiere,PDO::PARAM_INT);
							$req->bindParam('cmts_page',$cmts_page,PDO::PARAM_INT);
							$req->execute();
							while ($cmts = $req->fetch()) 
							{
								$id = htmlspecialchars($cmts['id']);
								$auteur = htmlspecialchars($cmts['auteur']);
								$message = htmlspecialchars($cmts['message']);
								$af_message = nl2br($message);
								$date = date_create(htmlspecialchars($cmts['date_at']));
								$date_f = date_format($date, 'd/m/Y à H:i');
								$email = htmlspecialchars($cmts['email_atr']);
								$avatar_defaut = urlencode('http://image.noelshack.com/fichiers/2016/15/1460410275-defaut.jpg'); 		
								$avatar = "http://2.gravatar.com/avatar/".md5($email)."?s=100&d=".$avatar_defaut."";
								$valide = htmlspecialchars($cmts['valide']);
								?>
								<div class="commentaires_contenu">
									<?php 
									if($valide == 1)
									{
										if($avatar != $avatar_defaut)
										{ 
											?>
											<img src="<?php echo $avatar; ?>" alt="avatar"/>
											<?php 
										} 
										else 
										{ 
											?> 
											<img src="img/defaut.jpg" alt="avatar"/> 
											<?php 
										} 
										?>
										<p>
											<?php echo $af_message; ?>
										</p>
										<div class="auteur">
											<?php 
											echo 'Ecris par '.$auteur.' le '.$date_f.'';
											?>
										</div>
										<?php
									}
									else
									{ 
										?>
										<p>
											<?php echo "Le commentaire est en cours de validation par un administrateur"; ?>
										</p>
										<?php
									}
									?>
								</div>
								<?php
							}
								$req->closeCursor();
						} 
						else
						{
							echo 'Il n\'y a pas de commentaires pour cette news.';
						}
						?>
					</div>
					<?php
					////////////////////////////////////
					///////Pagination des comment///////
					////////////////////////////////////
					if($cmts_totales > $cmts_page)
					{
						?>	
						<div class="pagination">
							<?php
							for ($i=1;$i<=$PgTotales;$i++) 
							{ 
								if ($i == $PgCourante) 
								{
									echo $i.' ';
								}
								else 
								{
									echo '<a href="commentaires.php?billet='.$id_billet.'&page='.$i.'">'.$i.'<a> ';
								}
							}
							?>
						</div>
						<?php
					}
					////////////////////////////////////
					///////Creation des commentai///////
					////////////////////////////////////
					?>
					<div class="formulaire">
						<form method="post" action="includes/commentaires_post.php">
							<label>Votre Commentaire :</label><br />
							<textarea name="commentaire_ecris" rows="8" cols="180"></textarea><br>
							<label>Votre Pseudo :</label>
							<input type="text" name="pseudo" placeholder="Facultatif"/>
							<label>Votre Email :</label>
							<input type="email" name="email" placeholder="Facultatif"/>
							<input type="hidden" name="billet_id" value="<?php echo $_GET['billet'];?>" />
							<input type='submit' value="Valider"> 
						</form>
					</div>
				</div>
			</body>
		</html>
		<?php
	}
	else
	{
		include ('includes/page_erreur.php');
	}
}
else
{
	header('Location: index.php');
}
?>