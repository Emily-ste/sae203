<?php

require 'secret.php';
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



function deconnexion(&$mabd){
    $mabd = null;
}
