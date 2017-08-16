<?php
include 'include/session_ens.php';
include 'include/db.php';

$id_matiere = $_POST['id_matiere'];
$id_etudiant = $_POST['id_etudiant'];
$note_tp = $_POST['note_tp'];
$note_ds = $_POST['note_ds'];
$note_exam = $_POST['note_exam'];

$sql = "UPDATE `etudier` SET `note_tp` = '$note_tp', `note_ds` = '$note_ds', `note_exam`= '$note_exam' WHERE `id_matiere` = $id_matiere and `id_etudiant` = $id_etudiant ;";
$sql1 = "DELETE FROM `double_correction` WHERE (`id_matiere` = $id_matiere and `id_etudiant` = $id_etudiant) ;";
mysql_query($sql);
mysql_query($sql1);
header('Location: indexens.php');
