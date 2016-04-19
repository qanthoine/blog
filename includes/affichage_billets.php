<div class="news">
<?php
$reponse = $bdd->prepare('SELECT id, titre, auteur, message, date_at FROM billets ORDER BY date_at DESC LIMIT :pgpremiere,:news_page');
$reponse->bindParam('pgpremiere',$PgPremiere,PDO::PARAM_INT);
$reponse->bindParam('news_page',$news_page,PDO::PARAM_INT);
$reponse->execute();
while ($news = $reponse->fetch()) 
{
	$id = htmlspecialchars($news['id']);
	$titre = htmlspecialchars($news['titre']);
	$auteur = htmlspecialchars($news['auteur']);
	$message = htmlspecialchars($news['message']);
	$af_message = nl2br($message);
	$date = date_create(htmlspecialchars($news['date_at']));
	$date_f = date_format($date, 'd/m/Y à H:i');
	?>

	<div class="news_contenu">
		<h1>
			<?php echo $titre; ?>
		</h1>
		<p>
			<?php echo $af_message; ?>
		</p>		
		<div class="auteur">
			<a href="commentaires.php?billet=<?php echo $id; ?>">Commentaires</a><br>
			<?php
			echo "Ecris par $auteur le $date_f";
			?> 
		</div>	
	</div>
	<?php
}
	$reponse->closeCursor();
?>
</div>