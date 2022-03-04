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
            <select class="formInput">
                <option value="1">Tous les albums</option>
                <option value="2">Foo Fighters</option>
                <option value="2">The Pretty Reckless</option>
                <option value="3">Maneskin</option>
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