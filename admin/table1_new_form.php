<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<a href="admin.php">retour au tableau de bord</a>
<hr>
<h1>gestion de nos albums</h1>
<p>ajouter ici un album</p>
<hr>

//form pour entrer les données
<form method="GET" action="table1_new_valide.php">
    titre : <input type="text" name="titre"><br>
    sortie : <input type="text" name="sortie"><br>
    durée : <input type="text" name="duree"><br>
    style : <input type="text" name="style"><br>
    nombre track : <input type="text" name="nbtrack"><br>
    artist : <select name="artist">
        <?php
        //bout de php pour afficher de maniere dynamique les artistes disponibles dans la DB artists

        require '../lib/lib_crud.inc.php';

        $mabd = connexion();


        $req = "SELECT * FROM  artists";
        $resultat = $mabd->query($req);
        echo '<option value="">Tous les albums</option>';
        foreach ($resultat as $value) {
            $v = str_replace(' ', '+',$value['nom_artist']);
            echo '<option value='.$value['id_artist'].'>'.ucwords($value['nom_artist']).'</option>';
        }
        ?>
        ?>
    </select>
    <br><br>
    <input type="submit" name="">
</form>

</tbody>
</table>
</body>
</html>