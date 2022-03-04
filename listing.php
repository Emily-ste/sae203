<?php

require 'debut.php';
require 'header.php';


$mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'lasaecgenial');
$mabd->query('SET NAMES utf8;');

$req = "SELECT * FROM albums INNER JOIN artists ON albums.id_artist = artists.id_artist";
$resultat = $mabd->query($req);

/* foreach ($resultat as $value) {
    echo $value['titre_album'] . ' , ' . $value['release_album'];
    echo '<br> auteur: ' . $value['nom_artist']. '<hr>';
}
*/


    echo '<div id="main">';
        foreach ($resultat as $value) {
            echo '<div class="item">';
            echo '<img src="img/cover/'.str_replace(' ', '',$value['titre_album'].'" alt="'.$value['titre_album']).'">';
            echo '<div class="divP">';
            echo '<p class="hide data">';
            echo ucwords(strtolower($value['titre_album'])).'<br>'.
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



<!-- <div id="main">
    <div class="item">
        <div class="test">
            <p class="hide data">
                titre <br>
                sortie <br>
                durée <br>
                style <br>
                nombre <br>
            </p>
        </div>
    </div>
</div>
->


<?php
require 'footer.php';
require 'fin.php';
?>