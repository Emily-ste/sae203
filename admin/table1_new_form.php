<?php
require 'headfoot/head.php';
?>

<hr>
<h1>gestion de nos albums</h1>
<p>ajouter ici un album</p>
<hr>

<!-- form pour entrer les données -->
<form method="GET" action="table1_new_valide.php">
    titre : <input type="text" name="titre"><br>
    sortie : <input type="text" name="sortie"><br>
    durée : <input type="text" name="duree"><br>
    style : <input type="text" name="style"><br>
    nombre track : <input type="text" name="nbtrack"><br>
    artist : <select name="artist">
        <?php

        //bout de php pour afficher de maniere dynamique les artistes disponibles dans la DB artists

        $mabd = connexion();

        //requete SQL
        $req = "SELECT * FROM  artists";

        //afficher la liste
        listArtistsNewForm($req, $mabd);
        ?>
    </select>
    <br><br>
    <input type="submit" name="">
</form>

</tbody>
</table>

<?php
require 'headfoot/foot.php';
?>





