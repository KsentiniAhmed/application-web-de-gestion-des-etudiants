<?php


include 'include/session.php';
include 'include/db.php';

$id = $_POST['id_livre'];
$titre = $_POST['titre'];
$auteur = $_POST['auteur'];
$commentaire = $_POST['commentaire'];

$sql = "UPDATE `bibliotheque` SET `titre` = '$titre',`auteur` = '$auteur', `commentaire` = '$commentaire' WHERE `bibliotheque`.`id_livre` = $id ;";

mysql_query($sql);

header('Location: affbib.php');
