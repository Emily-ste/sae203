<?php
require 'headfoot/head.php';
?>
<hr>
<h1>gestion de nos albums</h1>
<p>modification d'un album</p>

<?php

$mabd = connexion();
$id = get_id();

//request sql get current informations
$req = 'SELECT * FROM  albums WHERE id_album ='.$id;

$album = getEntries($req, $mabd)
?>

<hr>
<!-- form prérempli des data en cours de moddif -->
<form method="POST" action="table1_update_valide.php?num=<?= $id?>" enctype="multipart/form-data">
    image : <img class="img2" src="../img/cover/<? echo str_replace(' ', '',$album['titre_album'].'.jpeg'.'" alt="'.$album['titre_album']);?>."><br>
    <input type="file" name="pic" ><br>
    <hr>
    titre : <input type="text" name="titre" value="<?= $album['titre_album']; ?>"><br>
    sortie : <input type="text" name="sortie" value="<?= $album['release_album']; ?>"><br>
    durée : <input type="text" name="duree" value="<?= $album['lenght_album']; ?>"><br>
    durée : <input type="text" name="style" value="<?= $album['style_album']; ?>"><br>
    durée : <input type="text" name="nbtrack" value="<?= $album['nombretrack_album']; ?>"><br>

    artist :
    <select name="artist">
        <?php
        //on affiche de maniere dynamique la liste d'artistes, tout en preselectionnant l'actuel
        $req = "SELECT * FROM artists";
        listArtistsNewForm($req, $mabd);
        ?>

    </select>

    <br>
    <!-- ID album !!warning!! careful with editing that<input type="text" name="num"  value="<?php echo $album['id_album']; ?>"> -->
    <br>
    <input type="submit" name="">
</form>

<?php
require 'headfoot/foot.php';
?>