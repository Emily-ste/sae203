<?php

require 'debut.php';
require 'header.php';


$mabd = connexion();

$mabd->query('SET NAMES utf8;');

$req = "SELECT * FROM albums INNER JOIN artists ON albums.id_artist = artists.id_artist";
$resultat = $mabd->query($req);


    echo '<div id="main">';
        foreach ($resultat as $value) {
            echo '<div class="item">';
            echo '<img class="img" src="img/cover/'.str_replace(' ', '',$value['titre_album'].'.jpeg'.'" alt="'.$value['titre_album']).'">';
            echo '<div class="divP">';
            echo '<p class="hide data">';
            echo ucwords(strtolower($value['titre_album'])).'<br>'.
                'Par : '.ucwords(strtolower($value['nom_artist'])).'<br>'.
                'Nationalité : '.ucwords(strtolower($value['natio_artist'])).'<br>'.
                'Actif depuis : '.ucwords(strtolower($value['since_artist'])).'<br>'.
                'Sortie : '.ucwords(strtolower($value['release_album'])).'<br>'.
                ucwords(strtolower($value['lenght_album'])).' Minutes'.'<br>'.
                'Genre : '.ucwords(strtolower($value['style_album'])).'<br>'.
                ucwords(strtolower($value['nombretrack_album'])).' Pistes'."\n";
            echo '</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    ?>

<?php
require 'footer.php';
require 'fin.php';
?>