<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] !='administrateur' ){
	header('Location: login.html');
}
?>
