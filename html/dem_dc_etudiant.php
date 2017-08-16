<?php
include 'include/session_etud.php';
include 'include/db.php';

if(isset($_GET['id_matiere'],$_GET['id_etudiant'])){
	$id_matiere=$_GET['id_matiere'];
	$id_etudiant=$_GET['id_etudiant'];
	$sql1 = "select * from `etudier` where (`id_matiere`='$id_matiere' and `id_etudiant`='$id_etudiant');";
	if(($r = mysql_query($sql1)) and ($d=mysql_fetch_array($r))){
    $note_tp = $d['note_tp'];
    $note_ds = $d['note_ds'];
    $note_exam = $d['note_exam'];
	}
	if ($note_tp=$note_ds=$note_exam=NULL){header('Location: indexetud.php');} 
}else{
	header('Location: indexetud.php');
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
	$sql1 = "SELECT * FROM etudiant WHERE `cin`=$id;";
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
       <li class="active"><a href="indexetud.php">Accueil</a></li>
         <li><a href="affnote.php">Afficher les notes</a></li>
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
<form action="dem_dc_etudiant2.php" method="post">

<input type="hidden" name="id_matiere" value="<?php echo $id_matiere ?>">
<input name="id_etudiant" value="<?php echo $id_etudiant ?>" type="hidden">
<table>
<td><input type="checkbox" name="note_tp" > <label
for="note_tp">note tp</label></td>
<td><input type="checkbox" name="note_ds" > <label
for="note_ds">note ds</label></td>	
<td><input type="checkbox" name="note_exam" /> <label
for="note_exam">note exam</label></td>
<td><button type="reset">Annuler</button></td>
<td><button type="submit">Ajouter</button></td>
</table>
</form>
</figure>
</body>
</html>
