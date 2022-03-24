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
    <a href="admin.php">retour au tableau de bord</a>
    <?php
    session_start();
    require '../lib/lib_crud.inc.php';
    ?>
</header>