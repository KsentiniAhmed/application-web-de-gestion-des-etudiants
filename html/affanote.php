<?php
include 'include/session.php';
include 'include/db.php';

$sql = "select * from etudier";

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
        
        <li><a href="ajoutnote.php">Ajouter notes</a></li>
        <li><a href="logout.php">Deconnection</a></li>
      
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
	<th>nom matiéré</th>
	<th>cin_etudiant</th>
        <th>nom etudiant </th>
        <th>prenom etudiant </th>
	<th>note_tp</th>
	<th>note_ds</th>
	<th>note_exam</th>
</tr>
<?php
while($data = mysql_fetch_array($req)){
?>
<?php
	$id=$data['id_matiere'];
	$sql1 = "SELECT * FROM matiere WHERE `id_matiere`=$id;";
	$req1 = mysql_query($sql1);
	$data1 = mysql_fetch_array($req1);
?>
<?php
	$cin=$data['id_etudiant'];
	$sql2 = "SELECT * FROM etudiant WHERE `cin`=$cin;";
	$req2 = mysql_query($sql2);
	$data2 = mysql_fetch_array($req2);
?>
<tr>
	 <td><?php echo $data1['nom'] ?></td>
	<td><?php echo $data['id_etudiant'] ?></td>
        <td><?php echo $data2['nom'] ?></td>
        <td><?php echo $data2['prenom'] ?></td>
	<td><?php echo $data['note_tp'] ?></td>
	<td><?php echo $data['note_ds'] ?></td>
	<td><?php echo $data['note_exam'] ?></td>
        
	
	<td><a href="suppnote.php?id_matiere=<?php echo $data['id_matiere']?>">supprimer</a></td>

	<td><a href="modifnote.php?id_matiere=<?php echo $data['id_matiere']?>">Modifier</a></td>


</tr>


<?php
}
?>
</table>
</FONT  >
</figure>
</body>
</html>
