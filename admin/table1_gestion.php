<?php
require 'headfoot/head.php';
?>

<hr>
<h1>gestion des albums</h1>
<hr>
    <br>
    <div class="ajouter">
    <a class="ajouter" href="table1_new_form.php">Ajouter un album</a>
    </div>
    <br>
    <br>
<div class="table">
    <table border="1">
        <thead>
        <tr><td>Pics</td><td>Id</td><td>Titre</td><td>Sortie</td><td>Durée</td><td>Style</td><td>Nombres Tracks</td><td>Supprimer</td><td>Modifier</td></tr>
        </thead>
        <tbody>
        <?php

        $mabd = connexion();

        //requete sql
        $req = "SELECT * FROM albums";

        //appel fonction afficher albums page admin
        showAlbumsEntries($req, $mabd);
        ?>

        </tbody>
    </table>
</div>

<?php
require 'headfoot/foot.php';
?>