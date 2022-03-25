<?php
require 'headfoot/head.php';
?>
<hr>
<h1>gestion de nos albums</h1>
<h2>modification d'un album</h2>

<?php

$mabd = connexion();
$id = get_id();

//request sql get current informations
$req = 'SELECT * FROM  albums WHERE id_album ='.$id;

$album = getEntries($req, $mabd)
?>

<hr>
<!-- form prérempli des data en cours de moddif -->
<div class="form">
    <form method="POST" action="table1_update_valide.php?num=<?= $id?>" enctype="multipart/form-data">
        <img class="img2" src="../img/cover/<?php echo str_replace(' ', '',$album['titre_album'].'.jpeg'.'" alt="'.$album['titre_album']);?>."><br>
        <input type="file" name="pic" ><br>
        <hr>
        <div class="kecece">titre : </div><input type="text" name="titre" value="<?= $album['titre_album']; ?>"><br>
        <div class="kecece">sortie : </div><input type="number" name="sortie" value="<?= $album['release_album']; ?>"><br>
        <div class="kecece">durée : </div><input type="number" name="duree" value="<?= $album['lenght_album']; ?>"><br>
        <div class="kecece">style : </div><input type="text" name="style" value="<?= $album['style_album']; ?>"><br>
        <div class="kecece">Nombres de Tracks : </div><input type="number" name="nbtrack" value="<?= $album['nombretrack_album']; ?>"><br>

        <div class="kecece">Artiste</div>
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
        <input class="buttonNew" type="submit" name="">
    </form>
</div>

<?php
require 'headfoot/foot.php';
?>