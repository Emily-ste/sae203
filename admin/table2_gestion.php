<?php
require 'headfoot/head.php';
?>
<hr>
<h1>gestion des artistes</h1>
<hr>
    <br>
    <div class="ajouter">
    <a class="ajouter" href="table2_new_form.php">ajouter un artiste</a>
    </div>
    <br>
    <br>
    <div class="table">
        <table border="1">
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

            deconnexion();
            ?>

            </tbody>
        </table>
    </div>


<?php
require 'headfoot/foot.php';
?>