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