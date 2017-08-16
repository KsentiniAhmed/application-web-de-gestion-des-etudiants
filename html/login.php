<?php

if(isset($_POST['username'],$_POST['pass'],$_POST['type'])){
	$user = $_POST['username'];
	$pass = $_POST['pass'];
	$type = $_POST['type'];
	switch ($type) {
    case "etudiant":
        include 'include/db.php';
		$sql="SELECT `cin`, `password` FROM `etudiant` WHERE cin = $user ;";
		$d=mysql_query($sql);
		if($r = mysql_fetch_array($d)) {
			if(($r['cin'] == $user) && !(strcmp($r['password'],$pass))){
				session_start();
				$_SESSION['role'] = "etudiant";
				$_SESSION['id'] = "$user";
				header('Location: indexetud.php');}
			else {header('Location: login.html');}
		}else{
		header('Location: login.html');}
		break;
    case "enseignant":
        include 'include/db.php';
		$sql="SELECT `cin`, `password` FROM `enseignant` WHERE cin = $user ;";
		$d=mysql_query($sql);
		if($r = mysql_fetch_array($d)) {
			if(($r['cin'] == $user) && !(strcmp($r['password'],$pass))){
				session_start();
				$_SESSION['role'] = "enseignant";
				$_SESSION['id'] = "$user";
				header('Location: indexens.php');}
			else {header('Location: login.html');}
		}else{
		header('Location: login.html');
		}
		break;
    case "administrateur":
        include 'include/db.php';
		$sql="SELECT `cin`, `password` FROM `cadre_admin` WHERE cin = $user ;";
		$d=mysql_query($sql);
		if($r = mysql_fetch_array($d)){
			if(($r['cin'] == $user) && !(strcmp($r['password'],$pass))){
				session_start();
				$_SESSION['role'] = "administrateur";
				$_SESSION['id'] = "$user";
				header('Location: index.php');}
			else {header('Location: login.html');}
		}else{
		header('Location: login.html');
		}
		break;
	default:
		header('Location: login.html');
		break;
}
}else{
	header('Location: login.html');}
?>
