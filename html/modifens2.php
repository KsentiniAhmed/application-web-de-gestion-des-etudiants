<?php


include 'include/session.php';
include 'include/db.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$cin = $_POST['cin'];
$pass = $_POST['password'];
$dn = $_POST['dn'];
$sexe = $_POST['sexe'];

$sql = "UPDATE `enseignant` SET `nom` = '$nom',`prenom` = '$prenom', `dn` = '$dn', `sexe` = '$sexe' WHERE `enseignant`.`cin` = $cin;";

mysql_query($sql);

header('Location: affeens.php');
