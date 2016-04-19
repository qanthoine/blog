<?php
include ('bdd.php');
$id_billet_verif = htmlspecialchars($_POST['billet_id']);

if(!empty($_POST['commentaire_ecris']) AND !empty($_POST['billet_id']))
{
  $req = $bdd->query('SELECT prevalidation FROM admin');
  $cmts_val = $req->fetch();
  $valide = $cmts_val['prevalidation'];

  if(!empty($_POST['pseudo']))
  {
    $pseudo = $_POST['pseudo'];
  }
  else 
  {
    $pseudo = 'Anonyme';
  }
  if(!empty($_POST['email']))
  {
    $email = $_POST['email'];
  }
  else 
  {
    $email = '';
  }

  $pseudo_verif = ucfirst(htmlspecialchars($pseudo));
  $email_verif = htmlspecialchars($email);
  $cmts_verif = htmlspecialchars($_POST['commentaire_ecris']);
  $req = $bdd->prepare("INSERT INTO commentaires (auteur, message, date_at, news, email_atr, valide) VALUES (:pseudo, :message, NOW(),:billet, :email, :valide)");
  $req->bindParam('pseudo',$pseudo_verif,PDO::PARAM_STR);
  $req->bindParam('message',$cmts_verif,PDO::PARAM_STR);
  $req->bindParam('billet',$id_billet_verif,PDO::PARAM_INT);
  $req->bindParam('email',$email_verif,PDO::PARAM_STR);
  $req->bindParam('valide',$valide,PDO::PARAM_INT);
  $req->execute();
  $req->closeCursor();
  header('Location: ../commentaires.php?billet='.$id_billet_verif);
}
else
{
  header('Location: ../commentaires.php?billet='.$id_billet_verif.'&erreur=1');
}
?>