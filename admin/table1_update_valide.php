<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<a href="admin.php">retour au tableau de bord</a>

<p>Validation de la modification...</p>


<?php

require '../lib/lib_crud.inc.php';
$mabd = connexion();


///get some variable from table1_update
$titre=$_POST['titre'];
$sortie=$_POST['sortie'];
$duree=$_POST['duree'];
$style=$_POST['style'];
$nbtrack=$_POST['nbtrack'];
$artist=$_POST['artist'];

$num=$_POST['num'];



//on renomme l'image avec le nom mis a jour de l'album
$ask = 'SELECT titre_album FROM  albums WHERE id_album ='.$num;
    try {
        $result = $mabd->query($ask);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    $path = $result->fetch();

    $path = '../img/cover/'.str_replace(' ', '',$path['titre_album']).'.jpeg';

    //si le fichier existe on le renomme
    if (file_exists($path)) {
        rename ($path, '../img/cover/'.$titre.'.jpeg');
    }

//on verifie si une nouvelle image a été uploader lors de la modification, si oui on check le format

if(!empty($_FILES['pic']['name'])){
    $imageType=$_FILES["pic"]["type"];
    echo $imageType.'<br>';
    if ( ($imageType != "image/png") &&
        ($imageType != "image/jpg") &&
        ($imageType != "image/jpeg") ) {
        echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPG/JPEG sont autorisés.</p>'."\n";
        die();
    }

    //on check l'extension du fichier uploader, si c'est un jpg on modifie en jpeg
    $ext = str_replace('image/', '',$imageType);

    if($ext == 'jpg'){
        $ext = 'jpeg';
    }

    //on sauvegarde l'image
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

    //on regarde si l'image est en png, si oui on l'dit en jpeg
    if($ext == "png"){
        $filePath = '../img/cover/'.$nomimg.'.png';
        $filePathEdit = '../img/cover/'.$nomimg;

        $image = imagecreatefrompng($filePath);
        $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
        imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
        imagealphablending($bg, TRUE);
        imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
        imagedestroy($image);
        $quality = 50; // 0 = worst / smaller file, 100 = better / bigger file
        imagejpeg($bg, $filePathEdit . ".jpeg", $quality);
        imagedestroy($bg);

        //on delete l'ancien png
        if(file_exists($filePath)){unlink($filePath);}
    }
}




//on maj la bdd avec les nouvelles valeurs
$req = "UPDATE albums SET  titre_album='".$titre."', 
                            release_album='".$sortie."', 
                            lenght_album='".$duree."', 
                            style_album='".$style."', 
                            nombretrack_album='".$nbtrack."', 
                            id_artist='".$artist."'
        WHERE id_album='$num';";


//on try d'envoyer la requete
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