<?php
include ('includes/bdd.php');
include ('includes/session.php');
if(isset($_GET['billet']))
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
			include ('includes/prepagination_commentaires.php');
			include ('includes/affichage_commentaires.php');

			if(isset($_GET['erreur']) AND $_GET['erreur'] = 1)
			{	
				echo 'Il n\'y a pas de commentaire écris';
			}
			if($cmts_totales > $cmts_page)
			{	
			include ('includes/pagination_commentaires.php');
			}
			include ('includes/creat_commentaires.php');
			?>


		</div>
	</body>
	</html>

	<?php
}
else
{
	include ('includes/page_erreur.php');
}
?>