<?php
include 'include/session.php';
include 'include/db.php';

$sql = "select * from matiere";

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
        
       <li><a href="ajoutmat.php">Ajouter matiere</a></li>

      

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
	<th>Nom</th>
	<th>id</th>
	<th>coeff</th>
</tr>
<?php
while($data = mysql_fetch_array($req)){
?>
<tr>
	<td><?php echo $data['nom'] ?></td>
	
	<td><?php echo $data['id_matiere'] ?></td>
	<td><?php echo $data['coeff'] ?></td>
	<td><a href="suppmat.php?id_matiere=<?php echo $data['id_matiere']?>">supprimer</a></td>

	<td><a href="modifmat.php?id_matiere=<?php echo $data['id_matiere']?>">Modifier</a></td>


</tr>


<?php
}
?>
</table>
</FONT>
 </figure>
</body>
</html>
