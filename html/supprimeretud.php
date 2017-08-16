<?php
include 'include/session.php';

if(isset($_GET['cin'])){
	include 'include/db.php';
	$cin = $_GET['cin'];

	$sql = "Delete from etudiant where cin=$cin";
	mysql_query($sql);
}


header('Location: affetud.php');
?>
