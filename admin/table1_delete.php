<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="admin.php">retour au tableau de bord</a>
<hr> <h1>gestion de nos albums</h1> <hr>
<h2>Validation de la modification...</h2>

<?php

require '../lib/lib_crud.inc.php';
$mabd = connexion();

//get wich id work on
$id = get_id();

//requete de supression
$req = 'DELETE FROM albums
        WHERE id_album = '.$id;

//call delete function
suppression($id, $req, $mabd);

?>

</body>
</html>