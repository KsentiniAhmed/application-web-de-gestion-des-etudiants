<?php
include 'include/session_ens.php';
include 'include/db.php';
if(isset($_GET['id_section'],$_GET['id_enseignant'],$_GET['id_matiere'])){
	$id_section=$_GET['id_section'];
	$id_enseignant=$_GET['id_enseignant'];
	$id_matiere=$_GET['id_matiere'];
}else{
	header('Location: indexens.php');}
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
	$sql1 = "SELECT * FROM enseignant WHERE `cin`=$id;";
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
       <li class="active"><a href="indexens.php">Accueil</a></li>
         <li><a href="affbi.php">Bibliothéque</a></li>
         
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
function getMatiere($id){
	global $connect;
	$com = "SELECT `nom` FROM matiere where `id_matiere`=$id ;";
	$r = mysql_query($com);
	if($data = mysql_fetch_array($r)){
		return $data["nom"];
	}
	return "";
}
function getSection($id){
	global $connect;
	$com = "SELECT `nom` FROM section where `id_section`=$id ;";
	$r = mysql_query($com);
	if($data = mysql_fetch_array($r)){
		return $data["nom"];
	}
	return "";
}
$getsection=getSection($id_section);
$getmatiere=getMatiere($id_matiere);
?>
<FONT COLOR="black" >
<h3>vous enseignez le <?php 
$sql1 = "select * from enseignement where ( id_section=$id_section and id_enseignant=$id_enseignant and id_matiere=$id_matiere);";
	$r = mysql_query($sql1);
	if($d = mysql_fetch_array($r)){	
echo $d['type_enseignement'].",";
}else {header('Location: indexens.html');}
?> de la matiere <?php echo $getmatiere ?> de <?php echo $getsection ?></h3>
<br><br>
<?php $link1="ajout_note_ens.php?id_matiere=".$id_matiere."&id_section=".$id_section;?>
<td><a href="<?php echo $link1 ?>">afficher liste etudiants</a></td>
<table border="1">
<tr>
	<th>Nom etudiant</th>
	<th>Prenom</th>
	<th>CIN</th>
	<th>Note tp</th>
	<th>Note ds</th>
	<th>Note exam</th>
</tr>
<?php
$sql5 = "select * from `etudiant` , `etudier` where (`id_section`='$id_section' and `etudier`.`id_etudiant`=`etudiant`.`cin` and `etudier`.`id_matiere`='$id_matiere');";
	if($req2 = mysql_query($sql5)){
		while($data2 = mysql_fetch_array($req2)){
								
			?>
<tr>
	<td><?php echo $data2['nom'] ?></td>
	<td><?php echo $data2['prenom'] ?></td>
	<td><?php echo $data2['cin'] ?></td>
	<td><?php echo $data2['note_tp'] ?></td>
	<td><?php echo $data2['note_ds'] ?></td>
	<td><?php echo $data2['note_exam'] ?></td>
	<?php 
	$link="ajoute_note_etudiant.php?id_etudiant=".$data2['cin']."&id_matiere=".$id_matiere;
	?>
	<td><a href="<?php echo $link ?>">Modifer</a></td>

	<?php	
	}}else{
		echo "da5let";
	}?>
</tr>
</table>
</FONT>
</figure>
</body>
</html>
