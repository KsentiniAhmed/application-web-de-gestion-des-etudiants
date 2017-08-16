<?php
include 'include/session_ens.php';
include 'include/db.php';

$id_matiere = $_POST['id_matiere'];
$id_etudiant = $_POST['id_etudiant'];
$note_tp = $_POST['note_tp'];
$note_ds = $_POST['note_ds'];
$note_exam = $_POST['note_exam'];

$sql = "INSERT INTO `etudier`(`id_matiere`, `id_etudiant`, `note_tp`, `note_ds`, `note_exam`) VALUES ($id_matiere,$id_etudiant,$note_tp,$note_ds,$note_exam);";

mysql_query($sql);

header('Location: indexens.php');
