<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<a href="gestion.php">retour au tableau de bord</a>
<hr>
<h1>gestion de nos albums</h1>
<p>modification d'un album</p>
<?php
$num = $_GET['num'];

require '../lib/lib_crud.inc.php';
require 'secret.php';
$mabd = connexion();

$req = 'SELECT * FROM  bandes_dessinees WHERE bd_id ='.$num;
$resultat = $mabd->query($req);
$album = $resultat->fetch();
echo $album['bd_titre'];
echo $album['bd_prix'];
?>
<hr>
<form method="GET" action="valid_modif.php">
    titre:<input type="text" name="titre" value="<?= $album['bd_titre']; ?>"><br>
    prix:<input type="text" name="prix" value="<?= $album['bd_prix']; ?>"><br>
    nombre de pages:<input type="text" name="nbpages" value="<?= $album['bd_nb_pages']; ?>"><br>
    auteur:
    <select name="numauteur">
        <?php
        $req="SELECT * FROM auteurs";
        $resultat2 = $mabd->query($req);
        foreach ($resultat2 as $value){
            echo '<option value="'.$value['auteur_id'].'"';
            if ($album['_auteur_id']==$value['auteur_id']){
                echo 'selected="selected"';
            }
            echo '>'.$value['auteur_prenom'].' '.mb_strtoupper($value['auteur_nom']).'</option>'."\n";
        }

        ?>

    </select>
    <br>
    <input type="text" name="num"  value="<?php echo $album['bd_id']; ?>">
    <br>
    <input type="submit" name="">
</form>

</body>
</html>