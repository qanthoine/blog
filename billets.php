<?php include ('includes/bdd.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="styles/style.css"/>
	</head>
	<body>		
		<?php
		//////////////////////////////////
		//Mise en place de la pagination//
		//////////////////////////////////
		$news_page = 5;
		$news_totales_req = $bdd->query('SELECT id FROM billets');
		$news_totales = $news_totales_req->rowcount();
		$PgTotales = ceil($news_totales/$news_page);
		if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $PgTotales)
		{	
			$_GET['page'] = intval($_GET['page']);
			$PgCourante = $_GET['page'];
			$news_totales_req->closeCursor();
		}	
		else 	
		{
			$PgCourante = 1;
		}
		$PgPremiere = ($PgCourante-1)*$news_page;
		///////////////////////////////////
		///////Affichage des billets///////
		///////////////////////////////////
		?>
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
		////////////////////////////////////
		///////Pagination des billets///////
		////////////////////////////////////
			?>
		</div>
		<?php
		if($news_totales > $news_page)
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
					echo '<a href="index.php?page='.$i.'">'.$i.'<a> ';
					}
				}
				?>
			</div>
			<?php
		}
		?>	
	</body>
</html>