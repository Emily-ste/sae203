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
$nom=$_GET['nom'];
$natio=$_GET['natio'];
$actif=$_GET['actif'];

require '../lib/lib_crud.inc.php';
$mabd = connexion();

//requette pour creer la nouvelle entree
$req = 'INSERT INTO artists(nom_artist, natio_artist, since_artist) 
        VALUES("'.$nom.'", "'.$natio.'", '.$actif.');';

//on essaye de la push
$resultat = pushAddEntries($req, $mabd);

if ($resultat->rowCount() == 1) {
    echo '<p>L\'artist ' . $nom . ' a été ajouté.</p>' . "\n";
} else {
    echo '<p>Erreur lors de la modification.</p>' . "\n";
    die();
}

?>
</tbody>
</table>
</body>
</html>