<?php

require 'debut.php';
require 'header.php';

/*
$mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'lasaecgenial');
$mabd->query('SET NAMES utf8;');

$req = "SELECT * FROM albums INNER JOIN artists ON albums.id_artist = artists.id_artist";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo $value['titre_album'] . ' , ' . $value['release_album'];
    echo '<br> auteur: ' . $value['nom_artist']. '<hr>';
}
*/

?>

<div>
    <?php
        foreach ($resultat as $value) {
            echo '<div class="item">';
            echo '<div class="test">';
            echo '<p class="hide data">';
            echo $value['titre_album'].'<br>'.$value['release_album'].'<br>'.$value['lenght_album'].'<br>'.$value['style_album'].'<br>'.$value['nombretrack_album'].'<br>'."\n";
            echo '</p>';
            echo '</div>';
            echo '</div>';
        }
    ?>
</div>


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