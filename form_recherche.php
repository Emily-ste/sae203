<?php
require 'debut.php';
require 'header.php';
?>

<script src="https://parsleyjs.org/dist/parsley.min.js"></script>
<link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">

<body>
    <div id="tile">
        <form method="GET" action="reponse_recherche.php" data-parsley-validate id="searchTile">
            <div id="tile2">
            votre recherche: <br>
            <input type="text" name="album" data-parsley-type="text" placeholder="Album" class="formInput"> <br>
            <select class="formInput" name="artist">
                <option value="*">Tous les albums</option>
                <?php
                $mabd = connexion();
                $req = "SELECT nom_artist FROM artists";
                $resultat = $mabd->query($req);
                foreach ($resultat as $value) {
                    echo $value['nom_artist'];
                    echo '<option value='.$value['nom_artist'].'>'.ucwords($value['nom_artist']).'</option>';
                }
                ?>
            </select> <br>
            <input type="submit" name="valider" id="submit">
            </div>
        </form>
    </div>
</body>
</html>

<?php
require 'footer.php';
require 'fin.php';
?>