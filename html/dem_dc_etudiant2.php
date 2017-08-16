<?php
include 'include/session_etud.php';
if(isset($_POST['id_etudiant'],$_POST['id_matiere'])){
	include 'include/db.php';
    $id_etudiant = $_POST['id_etudiant'];
    $id_matiere = $_POST['id_matiere'];
    $demande="";
    		if (isset($_POST['note_tp']))
            {
                $demande=$demande."note_tp";
            }
            if (isset($_POST['note_ds'])) 
            {
                $demande=$demande."note_ds";
            }
            if (isset($_POST['note_exam']))
            {
                $demande=$demande."note_exam";
            }
$sql = "INSERT INTO `double_correction`(`id_matiere`, `id_etudiant`, `demande`) VALUES ('$id_matiere','$id_etudiant','$demande');";
	
	mysql_query($sql);
	header('Location: indexetud.php');
}else{header('Location: indexetud.php');}
?>
