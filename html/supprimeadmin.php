<?php
include 'include/session.php';

if(isset($_GET['cin'])){
	include 'include/db.php';
	$cin = $_GET['cin'];

	$sql = "Delete from cadre_admin where cin=$cin";
	mysql_query($sql);
}


header('Location: affadmin.php');
?>
