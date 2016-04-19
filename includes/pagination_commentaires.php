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
