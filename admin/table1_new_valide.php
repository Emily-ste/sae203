<?php
require 'headfoot/head.php';
?>
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

$mabd = connexion();

//requette pour creer la nouvelle entree
$req = 'INSERT INTO albums(titre_album, release_album, lenght_album, style_album, nombretrack_album, id_artist) 
        VALUES("'.$titre.'", '.$sortie.', '.$duree.', "'.$style.'", '.$nbtrack.', '.$artist.');';

//on essaye de la push
$resultat = pushAddEntries($req, $mabd);

if ($resultat->rowCount() == 1) {
    echo '<p>L\'album ' . $titre . ' a été ajouté.</p>' . "\n";
} else {
    echo '<p>Erreur lors de la modification.</p>' . "\n";
    die();
}

?>
</tbody>
</table>

<?php
require 'headfoot/foot.php';
?>