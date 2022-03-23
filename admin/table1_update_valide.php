<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="admin.php">retour au tableau de bord</a>

<p>Validation de la modification...</p>


<?php

require '../lib/lib_crud.inc.php';
$mabd = connexion();
$id=get_id();


///get some variable from table1_update
$titre=$_POST['titre'];
$sortie=$_POST['sortie'];
$duree=$_POST['duree'];
$style=$_POST['style'];
$nbtrack=$_POST['nbtrack'];
$artist=$_POST['artist'];


//on renomme l'image avec le nom mis a jour de l'album
renamePic($mabd, $id, $titre);

//on verifie si une nouvelle image a été uploader lors de la modification

$pic = $_FILES['pic']['name'];
$picType = $_FILES["pic"]["type"];
$picTMPname = $_FILES['pic']['tmp_name'];
$nomimg = str_replace(' ', '',$titre);

if (verrifNewUp($pic) == true){

    //on verrif son type
    verrifType($picType);

    //on check l'extension du fichier uploader, si c'est un jpg on modifie la variable qui config l'extension en jpeg
    $ext = jpgJpeg($picType);

    //on sauvegarde l'image
    saveImg($nomimg, $ext, $picTMPname);

    //on regarde si l'image est en png, si oui on l'edit en jpeg
    if($ext == "png"){
        pngToJpeg($nomimg);
    }
}


//request sql maj new data
$req = "UPDATE albums SET  titre_album='".$titre."', 
                            release_album='".$sortie."', 
                            lenght_album='".$duree."', 
                            style_album='".$style."', 
                            nombretrack_album='".$nbtrack."', 
                            id_artist='".$artist."'
        WHERE id_album='$id';";


//on try d'envoyer la requete
requestUpdate($mabd, $req);

echo '<p>l\'album ' . $titre . ' a été modifiée.</p>' . "\n";

?>


</body>
</html>