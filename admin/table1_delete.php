<?php
require 'headfoot/head.php';
?>

<hr>
    <h1>gestion de nos albums</h1>
    <hr>
<h2>Validation de la modification...</h2>

<?php

$mabd = connexion();

//get wich id work on
$id = get_id();

//requete de supression
$req = 'DELETE FROM albums
        WHERE id_album = '.$id;

//call delete function

$resultat = suppression($req, $mabd);

//on suppr l'album ou on affiche que cela a échoué
if ($resultat->rowCount()==1) {
    echo '<h2>vous venez de supprimer l\'album numéro '.$id.'</h2>';
} else {
    echo '<p>Erreur lors de la suppression.</p>'."\n";
    die();
}

deconnexion($mabd);

require 'headfoot/foot.php';
?>