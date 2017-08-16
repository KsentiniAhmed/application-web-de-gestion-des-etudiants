<?php
include 'include/session.php';
include 'include/db.php';

$sql = "select * from enseignant";

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
        
       
        <a href="ajouteens.php">Ajouter ensignant</a>
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
	<th>CIN</th>
	<th>Password</th>
	<th>Nom</th>
	<th>Prenom</th>
	<th>DN</th>
	<th>Sexe</th>
</tr>
<?php
while($data = mysql_fetch_array($req)){
?>
<tr>
	<td><?php echo $data['cin'] ?></td>
	<td><?php echo $data['password'] ?></td>
	<td><?php echo $data['nom'] ?></td>
	<td><?php echo $data['prenom'] ?></td>
	<td><?php echo $data['dn'] ?></td>
	<td><?php echo $data['sexe'] ?></td>

	<td><a href="supprimerens.php?cin=<?php echo $data['cin']?>">supprimer enseignant</a></td>

	<td><a href="modifens.php?cin=<?php echo $data['cin']?>">Modifier enseignant</a></td>


</tr>


<?php
}
?>
</table>
</FONT>
</figure>
</body>
</html>
