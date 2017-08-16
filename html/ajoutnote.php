<?php
include 'include/session.php';
$ajout = false;
if(isset($_POST['id_matiere'],$_POST['id_etudiant'],$_POST['note_tp'],$_POST['note_ds'],$_POST['note_exam'])){
	include 'include/db.php';
	
	$id_mat = $_POST['id_matiere'];
	$id_etu = $_POST['id_etudiant'];
	$note_tp = $_POST['note_tp'];
	$note_ds = $_POST['note_ds'];
	$note_exam = $_POST['note_exam'];

$sql = "INSERT INTO `etuder` (`	id_matiere`, `id_etudiant`, `note_tp`, `note_ds`, `note_exam`) VALUES ('$id_mat', '$id_etu', '$note_tp', '$note_ds', '$note_exam');";
	
	mysql_query($sql);
	$ajout = true;

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
        <li><a href="affbib.php">Bibliothéque</a></li>
         <li> <a href="etudenote.php">Afficher</a></li>
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

<?php
if($ajout ==true){
	echo "Ajouté";
}
?>

<form action="" method="post">
<FONT COLOR="black" >
<table>
	
	<tr>
		<td>id-matiere</td>
		<td><input name="id_mat" type="text"></td>
	</tr>
	<tr>
		<td>cin-etudiant</td>
		<td><input name="id_etu" type="text"></td>
	</tr>
	<tr>
		<td>note_tp</td>
		<td><input name="note_tp" type="text"></td>
	</tr>
	<tr>
		<td>note_ds</td>
		<td><input name="note_ds" type="text"></td>
	</tr>
	<tr>
		<td>note_exam</td>
		<td><input name="note_exam" type="text"></td>
	</tr>
	
	<tr>
		<td><button type="reset">Annuler</button></td>
		<td><button type="submit">Ajouter</button></td>

	</tr>
</table>
</FONT>
</form>
</figure>
</body>
</html>
