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
			{ ?>
				<img src="<?php echo $avatar; ?>" alt="avatar"/>
				<?php 
			} 
			else 
			{ ?> 
				<img src="img/defaut.jpg" alt="avatar"/> 
				<?php 
			} ?>


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