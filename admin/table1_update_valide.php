<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="gestion.php">retour au tableau de bord</a>

<p>vous venez de modifier un album</p>


<?php

require '../lib/lib_crud.inc.php';
require 'secret.php';
$mabd = connexion();

$titre=$_GET['titre'];
$prix=$_GET['prix'];
$pages =$_GET['nbpages'];
$auteur =$_GET['numauteur'];
$num =$_GET['num'];

$req = "UPDATE bandes_dessinees SET bd_titre='".$titre."', bd_prix='".$prix."', bd_nb_pages='".$pages."',_auteur_id='".$auteur."'
            WHERE bd_id='$num';";


echo 'juste pour le debug: '. $req;
$resultat = $mabd->query($req);

?>


</body>
</html>