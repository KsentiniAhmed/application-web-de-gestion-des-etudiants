<?php
include 'include/session_ens.php';
include 'include/db.php';

if(isset($_GET['id_mat'])){
	$id_mat=$_GET['id_matiere'];

	$sql1 = "select * from etudier where id_matiere=$id_mat";
	$r = mysql_query($sql1);
	if($d = mysql_fetch_array($r)){
		$id_mat = $d['id_matiere'];

	}else{
		header('Location: affanote.php');
	}


}else{
	header('Location: affanote.php');
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


<form action="modifnote2.php" method="post">

<input type="hidden" name="id_matiere" value="<?php echo $id_mat ?>">
<FONT COLOR="black" >
<input name="id_matiere" value="<?php echo $id_mat ?>" type="hidden">
<input name="id_etudiant" value="<?php echo $id_etu ?>" type="hidden">
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
<figure>
</body>
</html>
