<?php
session_start();
if(!isset($_SESSION['role']) || ($_SESSION['role']!='enseignant' && $_SESSION['role']!='etudiant' )) ){
	header('Location: login.html');
}
?>
