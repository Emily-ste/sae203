<?php
require 'headfoot/head.php';
?>
<hr>
<h1>gestion de nos albums</h1>
<h2>Validation de la modification...</h2>
<hr>
<?php
$nom=$_GET['nom'];
$natio=$_GET['natio'];
$actif=$_GET['actif'];

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


deconnexion();
?>
</tbody>
</table>


<?php
require 'headfoot/foot.php';
?>