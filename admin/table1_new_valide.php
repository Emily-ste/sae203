<?php
require 'headfoot/head.php';
?>
<hr>
<h1>gestion de nos albums</h1>
<h2>Validation de la modification...</h2>
<hr>
<?php
$titre=$_POST['titre'];
$sortie=$_POST['sortie'];
$duree=$_POST['duree'];
$style=$_POST['style'];
$nbtrack=$_POST['nbtrack'];
$artist=$_POST['artist'];

$mabd = connexion();

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


//requette pour creer la nouvelle entree
$req = 'INSERT INTO albums(titre_album, release_album, lenght_album, style_album, nombretrack_album, id_artist) 
        VALUES("'.$titre.'", '.$sortie.', '.$duree.', "'.$style.'", '.$nbtrack.', '.$artist.');';

//on essaye de la push
$resultat = pushAddEntries($req, $mabd);

if ($resultat->rowCount() == 1) {
    echo '<p>L\'album ' . $titre . ' a été ajouté.</p>' . "\n";
} else {
    echo '<p>Erreur lors de la modification.</p>' . "\n";
    die();
}

deconnexion($mabd);

?>
</tbody>
</table>

<?php
require 'headfoot/foot.php';
?>