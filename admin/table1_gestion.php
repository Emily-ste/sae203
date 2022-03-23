<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<a href="../index.php">retour au site</a>
<hr>
<h1>gestion des albums</h1>
<hr>

<a href="table1_new_form.php">ajouter un album</a>
<table border=1>
    <thead>
    <tr><td>Pics</td><td>Id</td><td>Titre</td><td>Sortie</td><td>Durée</td><td>Style</td><td>Nombres Tracks</td><td>Supprimer</td><td>Modifier</td></tr>
    </thead>
    <tbody>
    <?php

    require '../lib/lib_crud.inc.php';

    $mabd = connexion();

    //requete sql
    $req = "SELECT * FROM albums";

    //appel fonction afficher albums page admin
    showAlbumsEntries($req, $mabd);
    ?>

    </tbody>
</table>
</body>
</html>