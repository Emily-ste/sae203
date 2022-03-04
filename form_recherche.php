<?php

require 'debut.php';
require 'header.php';
?>

<body>
    <div id="searchTile">
        votre recherche:

        <form method="GET" action="reponse_recherche.php" data-parsley-validate>
            prix min : <input type="text" name="prix" data-parsley-type="number"> <br>
            prix max : <input type="text" name="prix" data-parsley-type="number"> <br>
        <input type="submit" name="valider">
        </form>
    </div>
</body>
</html>

<?php
require 'footer.php';
require 'fin.php';
?>