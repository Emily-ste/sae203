<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<a href="admin.php">retour au tableau de bord</a>
<hr>
<h1>gestion de nos albums</h1>
<h2>Validation de la modification...</h2>
<hr>
<?php
$titre=$_GET['titre'];
$sortie=$_GET['sortie'];
$duree=$_GET['duree'];
$style=$_GET['style'];
$nbtrack=$_GET['nbtrack'];
$artist=$_GET['artist'];

require '../lib/lib_crud.inc.php';
$mabd = connexion();

//requette pour creer la nouvelle entree
$req = 'INSERT INTO albums(titre_album, release_album, lenght_album, style_album, nombretrack_album, id_artist) 
        VALUES("'.$titre.'", '.$sortie.', '.$duree.', "'.$style.'", '.$nbtrack.', '.$artist.');';

//on essaye de la push
pushAddEntries($req, $mabd, $titre);

?>
</tbody>
</table>
</body>
</html>