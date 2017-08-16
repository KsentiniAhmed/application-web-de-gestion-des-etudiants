<?php


include 'include/session.php';
include 'include/db.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dn = $_POST['dn'];
$cin = $_POST['cin'];
$sexe = $_POST['sexe'];
$pass = $_POST['password'];
$sql = "UPDATE `cadre_admin` SET `nom` = '$nom',`prenom` = '$prenom', `dn` = '$dn', `sexe` = '$sexe' , `password` = '$pass' WHERE `cadre_admin`.`cin` = $cin;";

mysql_query($sql);

header('Location: affadmin.php');
