<?php
require 'headfoot/head.php';
?>

<h2>Validation de la modification...</h2>


<?php

$mabd = connexion();
$id=$_GET['num'];


///get some variable from table2_update
$nom=$_POST['nom'];
$natio=$_POST['natio'];
$actif=$_POST['actif'];


//request sql maj new data
$req = "UPDATE artists SET  nom_artist='".$nom."',
                            natio_artist='".$natio."',
                            since_artist='".$actif."'
        WHERE id_artist='$id';";


//on try d'envoyer la requete
$resultat = requestUpdate($mabd, $req);

echo '<p>L\'artist ' . $nom . ' a été modifié.</p>' . "\n";


?>


</body>
</html>