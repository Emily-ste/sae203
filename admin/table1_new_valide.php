<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<a href="admin.php">retour au tableau de bord</a>
<hr>
<h1>gestion de nos albums</h1>
<h2>vous venez d'ajouter un article</h2>
<hr>
<?php
$titre=$_GET['titre'];
$sortie=$_GET['sortie'];
$duree=$_GET['duree'];
$style=$_GET['style'];
$nbtrack=$_GET['nbtrack'];
$artist=$_GET['artist'];

require '../lib/lib.inc.php';
require 'secret.php';
$mabd = connexion();

$req = 'INSERT INTO albums(titre_album, release_album, lenght_album, style_album, nombretrack_album, id_artist) 
        VALUES("'.$titre.'", '.$sortie.', '.$duree.', "'.$style.'", '.$nbtrack.', '.$artist.');';

echo $req;
$resultat = $mabd->query($req);

?>
</tbody>
</table>
</body>
</html>