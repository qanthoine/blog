<?php
// Debut de la Gestion de la pagination //
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
?>