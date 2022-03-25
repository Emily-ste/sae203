<?php

require 'secret.php';


//connexion
function connexion(){

    try {
        $mabd = new PDO('mysql:host=127.0.0.1;dbname=sae203;charset=UTF8;', USER, PASSWORD);
        $mabd->query('SET NAMES utf8;');
    } catch (PDOException $e) {
        //print "Erreur co: vps " . $e->getMessage() . '<br />';
    }

    try {
        $mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'root', '');
        $mabd->query('SET NAMES utf8;');
    }  catch(Exception $r) {
        //print "Erreur co: localhost " . $r->getMessage() . '<br />';
    }

    return $mabd;
}



//deconnexion
function deconnexion(&$mabd){
    $mabd = null;
}



//supprimer entrée
function suppression($req, $mabd) {

    //on try la suppression
    try {
        $resultat = $mabd->query($req);
        return $resultat;
    } catch (PDOException $e){
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
}

//get id en post (utile pour savoir quel entrée editer ou suppr
function get_id(){
    $id=$_GET['num'];
    return $id;
}

//afficher tableau de toutes les entrées de la DB albums
function showAlbumsEntries($req, $mabd){
    $resultat = $mabd->query($req);

    //on affiche en tableau toutes les valeurs de la base "Albums"
    foreach ($resultat as $value) {
        echo '<tr>' ;
        echo '<td><img class="img2" src="../img/cover/'.str_replace(' ', '',$value['titre_album'].'.jpeg'.'" alt="'.$value['titre_album']).'"></td>';
        echo '<td>' . $value['id_album'] . '</td>';
        echo '<td>'.$value['titre_album'] . '</td>';
        echo '<td>' . $value['release_album'] . '</td>';
        echo '<td>' . $value['lenght_album'] . '</td>';
        echo '<td>' . $value['style_album'] . '</td>';
        echo '<td>' . $value['nombretrack_album'] . '</td>';
        echo '<td> <a href="table1_delete.php?num='.$value['id_album'].'" > supprimer </a> </td>';
        echo '<td> <a href="table1_update_form.php?num='.$value['id_album'].'" > modifier </a> </td>';
        echo '</tr>';
    }
}

//afficher tableau de toutes les entrées de la DB artist
function showArtistsEntries($req, $mabd){
    $resultat = $mabd->query($req);

    //on affiche en tableau toutes les valeurs de la base "Albums"
    foreach ($resultat as $value) {
        echo '<tr>' ;
        echo '<td>' .$value['id_artist'] . '</td>';
        echo '<td>'.$value['nom_artist'] . '</td>';
        echo '<td>' .$value['natio_artist'] . '</td>';
        echo '<td>' .$value['since_artist'] . '</td>';
        echo '<td> <a href="table2_delete.php?num='.$value['id_artist'].'" > supprimer </a> </td>';
        echo '<td> <a href="table2_update_form.php?num='.$value['id_artist'].'" > modifier </a> </td>';
        echo '</tr>';
    }
}

//afficher list artists dispo
function listArtistsNewForm($req, $mabd){
    $resultat = $mabd->query($req);
    foreach ($resultat as $value) {
        $v = str_replace(' ', '+',$value['nom_artist']);
        echo '<option value='.$value['id_artist'].'>'.ucwords($value['nom_artist']).'</option>';
    }
}

//afficher list artists dispo préselect
function listArtistsNewFormPreSelect($req, $mabd){
    $resultat2 = $mabd->query($req);
    foreach ($resultat2 as $value){
        echo '<option value="'.$value['id_artist'].'"';
        if ($album['id_artist']==$value['id_artist']){
            echo 'selected="selected"';
        }
        echo '>'.ucwords($value['nom_artist']).'</option>'."\n";
    }
}

//push add entries to albums
function pushAddEntries($req, $mabd){
    try {
        $resultat = $mabd->query($req);
        return $resultat;
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
}

//get current entries for editing (albums et artists)
function getEntries($req, $mabd){
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    return $resultat->fetch();
}

//renommer image associé quand on renome entrée album
function renamePic($mabd, $id, $titre){
    $ask = 'SELECT titre_album FROM  albums WHERE id_album ='.$id;

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
}

//verrifier si une image a été up
function verrifNewUp($pic){
    return (!empty($pic));
}

//verrifier son type
function verrifType($picType){
    if ( ($picType != "image/png") &&
        ($picType != "image/jpg") &&
        ($picType != "image/jpeg") ) {
        echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPG/JPEG sont autorisés.</p>'."\n";
        die();
    }
}

//jpg to jpeg
function jpgJpeg($picType){
    $ext = str_replace('image/', '',$picType);
    return $ext;
    if($ext == 'jpg'){
        $ext = 'jpeg';
        return $ext;
    }
}

//save img
function saveImg($nomimg, $ext, $picTMPname){

    //on check si cela provient bien d'un upload et on nomme correctement le fihcier
    if(is_uploaded_file($picTMPname)) {
        if(!move_uploaded_file($picTMPname, "../img/cover/".$nomimg.'.'.$ext)) {
            echo '<p>Problème avec la sauvegarde de l\'image, désolée...</p>'."\n";
            die();
        }
    } else {
        echo '<p>Problème : image non chargée...</p>'."\n";
        die();
    }
}

//convertir img en png et delete l'ancienne (reccuperer sur stackoverflow)
function pngToJpeg($nomimg){
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

//request update
function requestUpdate($mabd, $req){
    try {
        $resultat = $mabd->query($req);
        return $resultat;
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
}


//afficher listing
function showList($resultat){
    echo '<div id="main">';
    foreach ($resultat as $value) {
        echo '<div class="item">';
        echo '<img class="img" src="img/cover/'.str_replace(' ', '',$value['titre_album'].'.jpeg'.'" alt="'.$value['titre_album']).'">';
        echo '<div class="divP">';
        echo '<p class="hide data">';
        echo ucwords(strtolower($value['titre_album'])).'<br>'.
            'Par : '.ucwords(strtolower($value['nom_artist'])).'<br>'.
            'Pays : '.ucwords(strtolower($value['natio_artist'])).'<br>'.
            'Actif depuis : '.ucwords(strtolower($value['since_artist'])).'<br>'.
            'Sortie : '.ucwords(strtolower($value['release_album'])).'<br>'.
            ucwords(strtolower($value['lenght_album'])).' Minutes'.'<br>'.
            'Genre : '.ucwords(strtolower($value['style_album'])).'<br>'.
            ucwords(strtolower($value['nombretrack_album'])).' Pistes'."\n";
        echo '</p>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}