<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<a href="admin.php">retour au tableau de bord</a>
<hr>
<h1>gestion de nos albums</h1>
<p>modification d'un album</p>

<?php

require '../lib/lib_crud.inc.php';
$mabd = connexion();
$id = get_id();

//request sql get current informations
$req = 'SELECT * FROM  artists WHERE id_artist ='.$id;

$artist = getEntries($req, $mabd)
?>

<hr>
<!-- form prérempli des data en cours de moddif -->
<form method="POST" action="table2_update_valide.php">
    <hr>
    Nom : <input type="text" name="nom" value="<?= $artist['nom_artist']; ?>"><br>
    Nationalité : <input type="text" name="natio" value="<?= $artist['natio_artist']; ?>"><br>
    Actif depuis : <input type="text" name="actif" value="<?= $artist['since_artist']; ?>"><br>

    <br>
    ID artist !!warning!! careful with editing that<input type="text" name="num"  value="<?php echo $artist['id_artist']; ?>">
    <br>
    <input type="submit" name="">
</form>

</body>
</html>