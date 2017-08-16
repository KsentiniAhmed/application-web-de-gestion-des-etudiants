<?php
include 'include/session_etud.php';
include 'include/db.php';

$sess = $_SESSION['id'];
$sql = "select * from etudier where `id_etudiant`= '$sess' ;";

$req = mysql_query($sql);

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
<FONT COLOR="black" >
<table border="1">
<tr>
	<th>Matiére</th>
	<th>note tp</th>
	<th>note ds</th>
	<th>note examen</th>
	

</tr>
<?php
$id_etudiant=$_SESSION['id'];
while($data = mysql_fetch_array($req)){
?>
<?php
	$id=$data['id_matiere'];
	$sql1 = "SELECT * FROM matiere WHERE `id_matiere`=$id;";
	$req1 = mysql_query($sql1);
	$data1 = mysql_fetch_array($req1);
?>
<tr>
	<td><?php echo $data1['nom'] ?></td>
       <td><?php echo $data['note_tp'] ?></td>
	<td><?php echo $data['note_ds'] ?></td>
	<td><?php echo $data['note_exam'] ?></td>
<?php $link="dem_dc_etudiant.php?id_matiere=".$id."&id_etudiant=".$id_etudiant;?>
	<td><a href=<?php echo $link ?>>demande double correction</a></td>

	
	
</tr>


<?php
}
?>
</table>
</FONT>
</figure>
</body>
</html>
