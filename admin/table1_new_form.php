<?php
require 'headfoot/head.php';
?>

<hr>
<h1>gestion des albums</h1>
<hr>
<h2>Ajouter ici un album</h2>

<!-- form pour entrer les données -->
<div class="form">
    <form method="POST" action="table1_new_valide.php" enctype="multipart/form-data">
        <input type="file" required name="pic" ><br>
        <input type="text" placeholder="Titre" required name="titre"><br>
        <input type="number" placeholder="Sortie" required name="sortie"><br>
        <input type="number" step="any" placeholder="Durée (00.00)" required name="duree"><br>
        <input type="text" placeholder="Style"required name="style"><br>
        <input type="number" placeholder="Nombres Tracks" required name="nbtrack"><br>
        <div class="kecece">Artist : </div><br><select name="artist">
            <?php

            //bout de php pour afficher de maniere dynamique les artistes disponibles dans la DB artists

            $mabd = connexion();

            //requete SQL
            $req = "SELECT * FROM  artists";

            //afficher la liste
            listArtistsNewForm($req, $mabd);
            deconnexion($mabd);
            ?>
        </select>
        <br><br>
        <input type="submit" name="">
    </form>
</div>
</tbody>
</table>

<?php
require 'headfoot/foot.php';
?>





