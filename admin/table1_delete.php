<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="admin.php">retour au tableau de bord</a>
<hr> <h1>gestion de nos albums</h1> <hr>

<?php
//get album id
$id=$_GET['num'];

require '../lib/lib_crud.inc.php';
$mabd = connexion();

//requete de supr
$req = 'DELETE FROM albums
        WHERE id_album = '.$id;


//on try la suppression
try {
    $resultat = $mabd->query($req);
} catch (PDOException $e){
    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
    die();
}

if ($resultat->rowCount()==1) {
    echo '<h2>vous venez de supprimer l\'album numéro '.$id.'</h2>';
} else {
    echo '<p>Erreur lors de la suppression.</p>'."\n";
    die();
}
?>

</body>
</html>