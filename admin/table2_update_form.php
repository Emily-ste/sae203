<?php
require 'headfoot/head.php';
?>
<hr>
<h1>gestion de nos albums</h1>
<h2>modification d'un album<h2>

<?php

$mabd = connexion();
$id = get_id();

//request sql get current informations
$req = 'SELECT * FROM  artists WHERE id_artist ='.$id;

$artist = getEntries($req, $mabd)
?>

<hr>
<!-- form prérempli des data en cours de moddif -->
<div class="form">
    <form method="POST" action="table2_update_valide.php?num=<?= $id?>">
        <hr>
        <div class="kecece">Nom : </div><input type="text" name="nom" value="<?= $artist['nom_artist']; ?>"><br>
        <div class="kecece">Nationalité : </div><input type="text" name="natio" value="<?= $artist['natio_artist']; ?>"><br>
        <div class="kecece">Actif depuis : </div><input type="number" name="actif" value="<?= $artist['since_artist']; ?>"><br>
        <input type="submit" name="">
    </form>
</div>

<?php
require 'headfoot/foot.php';
?>