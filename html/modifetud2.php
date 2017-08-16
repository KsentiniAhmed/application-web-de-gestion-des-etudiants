<?php


include 'include/session.php';
include 'include/db.php';
$cin = $_POST['cin'];
$pass = $_POST['password'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$id = $_POST['id_etudiant'];
$dn = $_POST['dn'];
$section = $_POST['id_section'];
$sexe = $_POST['sexe'];
$sql = "UPDATE `etudiant` SET `password` = '$pass', `nom` = '$nom',`prenom` = '$prenom', `dn` = '$dn', `id_section` = '$section', `sexe` = '$sexe' WHERE `etudiant`.`cin` = $cin;";

mysql_query($sql);

header('Location: affetud.php');
