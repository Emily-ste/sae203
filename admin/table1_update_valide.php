<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="admin.php">retour au tableau de bord</a>

<p>vous venez de modifier un album</p>


<?php

require '../lib/lib_crud.inc.php';
$mabd = connexion();

$titre=$_POST['titre'];
$sortie=$_POST['sortie'];
$duree=$_POST['duree'];
$style=$_POST['style'];
$nbtrack=$_POST['nbtrack'];
$artist=$_POST['artist'];

$num=$_POST['num'];

//var_dump($_FILES);


if(!empty($_FILES['pic']['name'])){
    $imageType=$_FILES["pic"]["type"];
    echo $imageType.'<br>';
    if ( ($imageType != "image/png") &&
        ($imageType != "image/jpg") &&
        ($imageType != "image/jpeg") ) {
        echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPG/JPEG sont autorisés.</p>'."\n";
        die();
    }

    $ext = str_replace('image/', '',$imageType);
    echo $ext;
    $nomimg = str_replace(' ', '',$titre);

    if(is_uploaded_file($_FILES["pic"]["tmp_name"])) {
        if(!move_uploaded_file($_FILES["pic"]["tmp_name"], "../img/cover/".$nomimg.'.'.$ext)) {
            echo '<p>Problème avec la sauvegarde de l\'image, désolée...</p>'."\n";
            die();
        }
    } else {
        echo '<p>Problème : image non chargée...</p>'."\n";
        die();
    }
}
imagejpeg("../img/cover/".$nomimg.'.'.$ext);


$req = "UPDATE albums SET  titre_album='".$titre."', 
                            release_album='".$sortie."', 
                            lenght_album='".$duree."', 
                            style_album='".$style."', 
                            nombretrack_album='".$nbtrack."', 
                            id_artist='".$artist."'
        WHERE id_album='$num';";


try {
    $resultat = $mabd->query($req);
} catch (PDOException $e) {
    // s'il y a une erreur, on l'affiche
    echo '<p>Erreur : ' . $e->getMessage() . '</p>';
    die();
}
if ($resultat->rowCount() == 1) {
    echo '<p>l\'album ' . $titre . ' a été modifiée.</p>' . "\n";
} else {
    echo '<p>Erreur lors de la modification.</p>' . "\n";
    die();
}

?>


</body>
</html>