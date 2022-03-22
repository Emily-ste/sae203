<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<a href="../index.php">retour au site</a>
<hr>
<h1>gestion des albums</h1>
<hr>

<a href="table1_new_form.php">ajouter un album</a>
<table border=1>
    <thead>
    <tr><td>Id</td><td>Titre</td><td>Sortie</td><td>Durée</td><td>Style</td><td>Nombres Tracks</td><td>Supprimer</td><td>Modifier</td></tr>
    </thead>
    <tbody>
    <?php

    require '../lib/lib_crud.inc.php';
    require 'secret.php';
    $mabd = connexion();

    $req = "SELECT * FROM albums";
    $resultat = $mabd->query($req);


    foreach ($resultat as $value) {
        echo '<tr>' ;
        echo '<td>' . $value['id_album'] . '</td>';
        echo '<td>'.$value['titre_album'] . '</td>';
        echo '<td>' . $value['release_album'] . '</td>';
        echo '<td>' . $value['lenght_album'] . '</td>';
        echo '<td>' . $value['style_album'] . '</td>';
        echo '<td>' . $value['nombretrack_album'] . '</td>';
        echo '<td> <a href="table1_delete.php?num='.$value['id_album'].'" > supprimer </a> </td>';
        echo '<td> <a href="table1_update_form.php?num='.$value['id_album'].'" > modifier </a> </td>';
        echo '</tr>';
    }
    ?>

    </tbody>
</table>
</body>
</html>