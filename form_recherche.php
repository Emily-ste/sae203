<?php
require 'debut.php';
require 'header.php';
?>
    <div class="enhaut"></div>
<script src="https://parsleyjs.org/dist/parsley.min.js"></script>
<link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">

<body>

 <h1 id="recherche">Recherche</h1>
    <div class="form">
        <form method="GET" action="reponse_recherche.php" data-parsley-validate id="searchTile">
            <div id="tile2">

            <input type="text" name="album" data-parsley-type="text" placeholder="Nom de l'album" class="formInput"> <br><br>
            <select class="formInput" name="artist">
                <option value="">Tous les artistes</option>
                <?php
                $mabd = connexion();
                $req = "SELECT nom_artist FROM artists";
                $resultat = $mabd->query($req);
                foreach ($resultat as $value) {
                    $v = str_replace(' ', '+',$value['nom_artist']);
                    echo '<option value='.$v.'>'.ucwords($value['nom_artist']).'</option>';
                }
                ?>
            </select> <br> <br>
            <input type="submit" id="submit">
            </div>
        </form>
    </div>
</body>
</html>

<?php
require 'footer.php';
require 'fin.php';
?>