<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="admin.php">retour au tableau de bord</a>

<p>Validation de la modification...</p>


<?php

require '../lib/lib_crud.inc.php';
$mabd = connexion();
$id=$_POST['num'];


///get some variable from table2_update
$nom=$_POST['nom'];
$natio=$_POST['natio'];
$actif=$_POST['actif'];


//request sql maj new data
$req = "UPDATE artists SET  nom_artist='".$nom."',
                            natio_artist='".$natio."',
                            since_artist='".$actif."'
        WHERE id_artist='$id';";

echo $req;

//on try d'envoyer la requete
$resultat = requestUpdate($mabd, $req);


/*if ($resultat->rowCount() == 1) {
    echo '<p>L\'artist ' . $nom . ' a été modifié.</p>' . "\n";
} else {
    echo '<p>Erreur lors de la modification.</p>' . "\n";
    die();
}*/

?>


</body>
</html>