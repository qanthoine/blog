<?php
include('../../includes/bdd.php');
session_start(); 
if(isset($_SESSION['ndc']))
{
	if(isset($_GET['formulaire']) AND !empty($_GET['formulaire']) AND $_GET['formulaire'] > 0)
	{
  		if(isset($_SESSION['token']) && isset($_SESSION['tokentime']) && isset($_POST['token']))
  		{
    		if($_SESSION['token'] == $_POST['token'])
    		{
    			$timestamp_ancien = time() - (15*60);
      			if($_SESSION['tokentime'] >= $timestamp_ancien)
      			{
					$formulaire = $_GET['formulaire'];
					switch ($formulaire) 
					{
						case '1': // Formulaire de Creation de Billet (billets.php)
							if(!empty($_POST['billet_ecris']) AND !empty($_POST['titre']) AND !empty($_POST['auteur']))
        					{
        						$titre_verif = $_POST['titre'];
        						$billet_verif = $_POST['billet_ecris'];
        						$auteur_verif = ucfirst($_POST['auteur']);
        						$req = $bdd->prepare("INSERT INTO billets (titre, auteur, message, date_at) VALUES (:titre, :auteur, :billet, NOW())");
        						$req->bindParam('titre',$titre_verif, PDO::PARAM_STR);
        						$req->bindParam('auteur',$auteur_verif, PDO::PARAM_STR);
        						$req->bindParam('billet',$billet_verif,PDO::PARAM_INT);
        						$req->execute();
        						$req->closeCursor();
        						header('Location: ../billets.php?mess=1');
        					} 
        					else
        					{
        						header('Location: ../billets.php?mess=7');
        					}
							break;
						case '2': // Formulaire de Modification de Billet (action_billet.php?action=2)
							if(!empty($_POST['billet_ecris']) AND !empty($_POST['auteur']) AND !empty($_POST['titre']))
							{
							    $auteur_verif = ucfirst($_POST['auteur']);
							    $billet_verif = $_POST['billet_ecris'];
							    $titre_verif = $_POST['titre'];
							    $billet_id = $_POST['billet_id'];
							    $req = $bdd->prepare("UPDATE billets SET titre = :titre, auteur = :auteur, message = :message WHERE id = :id");
							    $req->bindParam('titre',$titre_verif,PDO::PARAM_STR);
							    $req->bindParam('auteur',$auteur_verif,PDO::PARAM_STR);
							    $req->bindParam('message',$billet_verif,PDO::PARAM_STR);
							    $req->bindParam('id',$billet_id,PDO::PARAM_INT);
							    $req->execute();
							    $req->closeCursor();
							    header('Location: ../billets.php?mess=2');
							}
							else
							{
								$billet_id = $_POST['billet_id'];
								header('Location: ../action_billets.php?action=2&billet='.$billet_id.'&mess=1');
							}
							break;
						case '3': // Formulaire de Modification de Commentaire (action_cmts.php?action=2)
						if(!empty($_POST['auteur']) AND !empty($_POST['cmts_ecris']) AND !empty($_POST['cmts_id']))
						{
						    $auteur = ucfirst($_POST['auteur']);
						    $cmts_verif = $_POST['cmts_ecris'];
						    $verification = $_POST['cmts_publication'];
						    $cmts_id = $_POST['cmts_id'];
						    if($verification == 1)
						    {
						    	$validation = 1;
						    }
						    else
						    {
						        $validation = 0;
						    }

						    $req = $bdd->prepare("UPDATE commentaires SET auteur = :auteur, message = :message, valide = :valide WHERE id = :id");
						    $req->bindParam('auteur',$auteur, PDO::PARAM_STR);
						    $req->bindParam('message',$cmts_verif, PDO::PARAM_STR);
						    $req->bindParam('valide',$verification, PDO::PARAM_INT);
						    $req->bindParam('id',$cmts_id, PDO::PARAM_INT);
						    $req->execute();
						    $req->closeCursor;
						    header('Location: ../commentaires.php?mess=1');
						}
							else
							{
								$cmts_id = $_POST['cmts_id'];
								header('Location: ../action_cmts.php?action=2&cmts='.$cmts_id.'&mess=1');
							}
							break;
						case '4': // Formulaire de Modification de l'option de validation des Commentaires (commentaires.php)
						$verification = $_POST['cmts_validation'];
						if($verification == 1)
						{
							$validation = 1;
						}
						else
						{
							$validation = 0;
						}
						$req_val = $bdd->prepare("UPDATE admin SET prevalidation = :validation");
  						$req_val->bindParam(':validation',$validation, PDO::PARAM_INT);
						$req_val->execute();
						$req_val->closeCursor();
  						header('Location: ../commentaires.php?mess=4');
						break;			
					}
				}
      			else
      			{
        			header('Location: ../index.php?mess=4');
      			}
			}
      		else
      		{
       			header('Location: ../index.php?mess=4');
      		}
		}
      	else
      	{
      		  header('Location: ../index.php?mess=4');
      	}
	}
	else
	{
		header('Location: ../index.php?mess=3');
	}
}
else
{
	header('Location: ../index.php?mess=2');
}
