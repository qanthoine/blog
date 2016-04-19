<link rel="stylesheet" type="text/css" href="styles/style.css"/>
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