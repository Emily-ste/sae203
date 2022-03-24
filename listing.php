<?php

require 'debut.php';
require 'header.php';


$mabd = connexion();

$mabd->query('SET NAMES utf8;');

$req = "SELECT * FROM albums INNER JOIN artists ON albums.id_artist = artists.id_artist";
$resultat = $mabd->query($req);

showList($resultat);




require 'footer.php';
require 'fin.php';
?>