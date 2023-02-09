<?php
require 'debut.php';
require 'header.php';

echo '<div class="enhaut"></div>';
    $mabd = connexion();

    $albumRaw = filter_var($_GET['album'], FILTER_SANITIZE_STRING);
    $album = htmlentities($albumRaw, ENT_QUOTES);
    $artist = str_replace('+', ' ',$_GET['artist']);

    $mabd->query('SET NAMES utf8;');


    if (empty($artist) AND (empty($album) == true)){
        echo '<p id="nochamps">No field filled</p>';
        $req = "SELECT * FROM albums INNER JOIN artists ON albums.id_artist = artists.id_artist;";
    }

    elseif (empty($album) == true){
        $req = "SELECT * FROM albums INNER JOIN artists ON albums.id_artist = artists.id_artist
            WHERE nom_artist = '$artist';";
    }

    elseif (empty($artist) == true){
        $req = "SELECT * FROM albums INNER JOIN artists ON albums.id_artist = artists.id_artist
            WHERE titre_album LIKE '%$album%';";
    }

    else {
        $req = "SELECT * FROM albums INNER JOIN artists ON albums.id_artist = artists.id_artist
            WHERE nom_artist = '$artist' AND titre_album LIKE '%$album%';";
    }


    $resultat = $mabd->query($req);

    showList($resultat);

echo '<div class="enbas"></div>';

require 'footer.php';
require 'fin.php';
?>