<?php
include ('bdd.php');
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
  $pseudo_verif = ucfirst($pseudo);
  $cmts_verif = $_POST['commentaire_ecris'];
  $id_billet_verif = $_POST['billet_id'];
  $req = $bdd->prepare("INSERT INTO commentaires (auteur, message, date_at, news, email_atr, valide) VALUES (:pseudo, :message, NOW(),:billet, :email, :valide)");
  $req->bindParam('pseudo',$pseudo_verif,PDO::PARAM_STR);
  $req->bindParam('message',$cmts_verif,PDO::PARAM_STR);
  $req->bindParam('billet',$id_billet_verif,PDO::PARAM_INT);
  $req->bindParam('email',$email,PDO::PARAM_STR);
  $req->bindParam('valide',$valide,PDO::PARAM_INT);
  $req->execute();
  $req->closeCursor();
  header('Location: ../commentaires.php?billet='.$id_billet_verif.'&mess=2');
}
else
{
  header('Location: ../commentaires.php?billet='.$_POST['billet_id'].'&mess=1');
}
?>