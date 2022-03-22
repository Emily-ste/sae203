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

require '../lib/lib_crud.inc.php';
$mabd = connexion();

$req = 'INSERT INTO albums(titre_album, release_album, lenght_album, style_album, nombretrack_album, id_artist) 
        VALUES("'.$titre.'", '.$sortie.', '.$duree.', "'.$style.'", '.$nbtrack.', '.$artist.');';

try {
    $resultat = $mabd->query($req);
} catch (PDOException $e) {
    // s'il y a une erreur, on l'affiche
    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
    die();
}
if ($resultat->rowCount() == 1) {
    echo '<p>L\'album ' . $titre . ' a été ajouté.</p>' . "\n";
} else {
    echo '<p>Erreur lors de la modification.</p>' . "\n";
    die();
}

?>
</tbody>
</table>
</body>
</html>