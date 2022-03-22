<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="admin.php">retour au tableau de bord</a>

<p>vous venez de modifier un album</p>


<?php

require '../lib/lib_crud.inc.php';
$mabd = connexion();

$titre=$_GET['titre'];
$sortie=$_GET['sortie'];
$duree=$_GET['duree'];
$style=$_GET['style'];
$nbtrack=$_GET['nbtrack'];
$artist=$_GET['artist'];

$num=$_GET['num'];

$req = "UPDATE albums SET  titre_album='".$titre."', 
                            release_album='".$sortie."', 
                            lenght_album='".$duree."', 
                            style_album='".$style."', 
                            nombretrack_album='".$nbtrack."', 
                            id_artist='".$artist."'
        WHERE id_album='$num';";


try {
    $resultat = $mabd->query($req);
} catch (PDOException $e) {
    // s'il y a une erreur, on l'affiche
    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
    die();
}
if ($resultat->rowCount() == 1) {
    echo '<p>l\'album ' . $titre . ' a été modifiée.</p>' . "\n";
} else {
    echo '<p>Erreur lors de la modification.</p>' . "\n";
    die();
}

?>


</body>
</html>