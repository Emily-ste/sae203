<?php
require 'debut.php';
require 'header.php';
?>

<script src="https://parsleyjs.org/dist/parsley.min.js"></script>
<link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">

<body>
    <div id="searchTile">
        <form method="GET" action="reponse_recherche.php" data-parsley-validate>
            votre recherche: <br>
            <input type="text" name="prix" data-parsley-type="number"> <br>
            <input type="text" name="prix" data-parsley-type="number"> <br>
                        <input type="submit" name="valider">
        </form>
    </div>
</body>
</html>

<?php
require 'footer.php';
require 'fin.php';
?>