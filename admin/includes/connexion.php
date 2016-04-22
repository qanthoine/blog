<?php 
session_start();
include ('../../includes/bdd.php');
if(!isset($_SESSION['ndc']))
{
  if(!empty($_POST['ndc']) AND !empty($_POST['mdp']))
  {
    $ndc_verif = htmlspecialchars($_POST['ndc']);
    $mdp_verif = htmlspecialchars($_POST['mdp']);
    $mdp_crypt = sha1("supermotdepasse".$mdp_verif."vraimentcool");

    $req = $bdd->prepare('SELECT * FROM admin WHERE login = :login AND mdp = :mdp');
    $req->bindParam('login',$ndc_verif,PDO::PARAM_STR);
    $req->bindParam('mdp',$mdp_crypt,PDO::PARAM_STR);
    $req->execute();
    $donnees = $req->fetch();

    if (!$donnees)
    {
        header('Location: ../index.php?mess=1');
    }
    else
    {
        session_start();
        $_SESSION['ndc'] = $ndc_verif;
        header('Location: ../index.php?mess=5');
    }
    $req->closeCursor();
  }
}
else 
{
  header('Location: ../index.php?mess=6');
}
?>