<?php
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
?>