<?php
include 'include/session.php';

if(isset($_GET['id_matiere'])){
	include 'include/db.php';
	$id = $_GET['id_matiere'];

	$sql = "Delete from matiere where id_matiere=$id";
	mysql_query($sql);
}


header('Location: affmat.php');
?>
