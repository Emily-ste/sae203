<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<a href="admin.php">retour au tableau de bord</a>
<hr>
<h1>gestion de nos albums</h1>
<p>modification d'un album</p>
<?php
$num = $_GET['num'];

require '../lib/lib_crud.inc.php';
require 'secret.php';
$mabd = connexion();

$req = 'SELECT * FROM  albums WHERE id_album ='.$num;
try {
    $resultat = $mabd->query($req);
} catch (PDOException $e) {
    // s'il y a une erreur, on l'affiche
    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
    die();
}
$album = $resultat->fetch();
?>
<hr>
<form method="GET" action="table1_update_valide.php">
    titre : <input type="text" name="titre" value="<?= $album['titre_album']; ?>"><br>
    sortie : <input type="text" name="sortie" value="<?= $album['release_album']; ?>"><br>
    durée : <input type="text" name="duree" value="<?= $album['lenght_album']; ?>"><br>
    durée : <input type="text" name="style" value="<?= $album['style_album']; ?>"><br>
    durée : <input type="text" name="nbtrack" value="<?= $album['nombretrack_album']; ?>"><br>

    artist :
    <select name="artist">
        <?php
        $req = "SELECT * FROM artists";
        $resultat2 = $mabd->query($req);
        foreach ($resultat2 as $value){
            echo '<option value="'.$value['id_artist'].'"';
            if ($album['id_artist']==$value['id_artist']){
                echo 'selected="selected"';
            }
            echo '>'.ucwords($value['nom_artist']).'</option>'."\n";
        }

        ?>

    </select>

    <br>
    ID album !!warning!! careful with editing that<input type="text" name="num"  value="<?php echo $album['id_album']; ?>">
    <br>
    <input type="submit" name="">
</form>

</body>
</html>