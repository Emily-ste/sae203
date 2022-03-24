<?php
require 'headfoot/head.php';
?>
<hr>
<h1>gestion des artistes</h1>
<hr>

<a href="table2_new_form.php">ajouter un artiste</a>
<table border=1>
    <thead>
    <tr><td>Id</td><td>Nom</td><td>Nationalité</td><td>Actif depuis</td><td>Supprimer</td><td>Modifier</td></tr>
    </thead>
    <tbody>
    <?php


    $mabd = connexion();

    //requete sql
    $req = "SELECT * FROM artists";

    //appel fonction afficher albums page admin
    showArtistsEntries($req, $mabd);
    ?>

    </tbody>
</table>


<?php
require 'headfoot/foot.php';
?>