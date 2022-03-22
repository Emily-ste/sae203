<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="admin.php">retour au tableau de bord</a>
<hr> <h1>gestion de nos albums</h1> <hr>

<?php
// recupérer dans l'url l'id de l'album à supprimer
$id=$_GET['num'];

require '../lib/lib.inc.php';
require 'secret.php';
$mabd = connexion();

// tapez ici la requete de suppression de l'album dont l'id est passé dans l'url
$req = 'DELETE FROM albums
        WHERE id_album = '.$id;

// cette ligne sert juste pour le debug. à supprimer quand tout marche correctement
echo $req;

$resultat = $mabd->query($req);

echo '<h2>vous venez de supprimer l\'album numéro '.$id.'</h2>';
?>

</body>
</html>