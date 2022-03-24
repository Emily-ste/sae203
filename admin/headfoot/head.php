<!DOCTYPE html>
<html lang="fr">
<head>
    <title>ADMIN</title>


    <link rel="icon" href="">
    <link rel="stylesheet" href="headfoot/style_admin.css">
    <meta http-equiv="X-UA-compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta charset="UTF-8">

</head>
<body>
<header>
    <?php
    session_start();
    require '../lib/lib_crud.inc.php';
    ?>


        <div class="menu">
            <ul>
                <li><a href="../index.php">Retour au site</a></li>
                <li><a href="admin.php">Retour au tableau de bord</a></li>
            </ul>
        </div>

        <div class="menu">
            <ul>
                <li><a href="../admin/table1_gestion.php">Gerer les albums</a></li>
                <li><a href="../admin/table1_new_form.php">Ajouter un album</a></li>
                <li><a> - </a></li>
                <li><a href="../admin/table2_gestion.php">Gerer les artistes</a></li>
                <li><a href="../admin/table2_new_form.php">Ajouter un artiste</a></li>
            </ul>
        </div>
</header>