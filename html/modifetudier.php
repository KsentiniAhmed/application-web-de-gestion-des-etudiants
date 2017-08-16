<?php
include 'include/session_ens.php';
include 'include/db.php';

if(isset($_GET['id_matiere'],$_GET['id_etudiant'])){
	$id_matiere=$_GET['id_matiere'];
	$id_etudiant=$_GET['id_etudiant'];
	$sql1 = "SELECT * FROM `etudier` WHERE (`id_matiere` = '$id_matiere' AND `id_etudiant` = '$id_etudiant')";
	$r = mysql_query($sql1);
	if($d = mysql_fetch_array($r)){
		$id_matiere = $d['id_matiere'];
		$note_tp = $d['note_tp'];
		$note_ds = $d['note_ds'];
		$note_exam = $d['note_exam'];
	

		
	}else{
		header('Location: indexens.php');
	}


}else{
	header('Location: indexens.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>fst</title>
<meta charset="utf-8">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body >
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="clear"> 
    <!-- ################################################################################################ -->
    <nav>
<?php
	$id=$_SESSION['id'];
	$sql1 = "SELECT * FROM cadre_admin WHERE `cin`=$id;";
	$req1 = mysql_query($sql1);
	$data1 = mysql_fetch_array($req1);
?>
<h1>bonjour  <?php echo $data1['nom'] ?> <?php echo $data1['prenom']?></h1>
    </nav>
    <!-- ################################################################################################ --> 
  </div>
</div>
<div class="wrapper row1">
  <header id="header" class="clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.html">Faculté de Science de Tunis </a></h1>
      </div>
    <div class="fl_right">
      <div class="fl_right">
      <img src="layout/fst.jpg" >
     </div>
    </div>
    <!-- ################################################################################################ --> 
  </header>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="index.php">Accueil</a></li>
        <li><a href="affanote.php">Afficher les notes</a></li>
       
        <li><a href="logout.php">Déconnecter</a></li>
      
      </ul>
      <!-- ################################################################################################ --> 
    </nav>
  </div>
</div>
<!-- ################################################################################################ -->
<div class="wrapper">
  <div id="slider">
    <div id="slide-wrapper" class="rounded clear"> 
      <!-- ################################################################################################ -->
      <figure>
<?phpif($note_tp=$note_ds=$note_exam=NULL){?>
<form action="modifetudier2.php" method="post">

<input type="hidden" name="id_matiere" value="<?php echo $id_mat ?>">
<FONT COLOR="black" >
<input name="id_matiere" value="<?php echo $id_mat ?>" type="hidden">
<input name="id_etudiant" value="<?php echo $id_etu ?>" type="hidden">
<table>
	<tr>
		<td>note_tp</td>
		<td><input name="note_tp" value="<?php echo $note_tp ?>" type="text"></td>
		</td>
	</tr>
	<tr>
		<td>note_ds</td>
		<td><input name="note_ds" value="<?php echo $note_ds ?>" type="text"></td>
		</td>
	</tr>
	<tr>
		<td>note_exam</td>
		<td><input name="note_exam" value="<?php echo $note_exam ?>" type="text"></td>
		</td>
	</tr>
	<tr>
		<td><button type="reset">Annuler</button></td>
		<td><button type="submit">Modif</button></td>

	</tr>
</table>
</FONT>
</form>
<?php }else{
<form action="modifetudier3.php" method="post">

<input type="hidden" name="id_matiere" value="<?php echo $id_mat ?>">
<FONT COLOR="black" >
<input name="id_matiere" value="<?php echo $id_mat ?>" type="hidden">
<input name="id_etudiant" value="<?php echo $id_etu ?>" type="hidden">
<table>
	<tr>
		<td>note_tp</td>
		<td><input name="note_tp" value="<?php echo $note_tp ?>" type="text"></td>
		</td>
	</tr>
	<tr>
		<td>note_ds</td>
		<td><input name="note_ds" value="<?php echo $note_ds ?>" type="text"></td>
		</td>
	</tr>
	<tr>
		<td>note_exam</td>
		<td><input name="note_exam" value="<?php echo $note_exam ?>" type="text"></td>
		</td>
	</tr>
	<tr>
		<td><button type="reset">Annuler</button></td>
		<td><button type="submit">Modif</button></td>

	</tr>
</table>
<?php }?>
</FONT>
</form>
<figure>
</body>
</html>
