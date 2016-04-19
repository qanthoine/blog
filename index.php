<?php include ('/includes/session.php'); ?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="/styles/style.css"/>
        <title>Mon Blog</title>
    </head>

    	<?php 
    	include ('includes/header.php');
    	include ('includes/menus.php'); 
    	?>

    <body>

    	<div class="body">
    		<?php include ('includes/news.php'); ?>
    	</div>
    	
    </body>

</html>