<?php


include 'include/session_ens.php';
include 'include/db.php';

$id_mat = $_POST['id_matiere'];
$id_etu = $_POST['id_etudiant'];
$note_tp = $_POST['note_tp'];
$note_ds = $_POST['note_ds'];
$note_exam = $_POST['note_exam'];

$sql = "UPDATE `etuder` SET `id_matiere` = '$id_mat',`id_etudiant` = '$id_etu', `note_tp` = '$note_tp', `note_ds` = '$note_ds', `note_exam`= '$note_exam' WHERE `etuder`.`id_matiere` = $id_mat;";

mysql_query($sql);

header('Location: affanote.php');
