<?php
include 'include/session.php';

if(isset($_GET['id_livre'])){
	include 'include/db.php';
	$id = $_GET['id_livre'];

	$sql = "Delete from bibliotheque where id_livre=$id";
	mysql_query($sql);
}


header('Location: affbib.php');
?>
