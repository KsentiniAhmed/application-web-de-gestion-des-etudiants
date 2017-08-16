<?php


include 'include/session.php';
include 'include/db.php';

$nom = $_POST['nom'];
$id = $_POST['id_matiere'];

$coeff = $_POST['coeff'];

$sql = "UPDATE `matiere` SET `nom` = '$nom',  `coeff` = '$coeff' WHERE `matiere`.`id_matiere` = $id;";

mysql_query($sql);

header('Location: affmat.php');
