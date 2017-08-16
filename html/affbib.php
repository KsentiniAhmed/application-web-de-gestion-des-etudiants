<?php
include 'include/session.php';
include 'include/db.php';

$sql = "select * from bibliotheque";

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
        <li><a href="affbib.php">Bibliothéque</a></li>
         
          <li><a href="ajoutebib.php">Ajouter un livre</a> </li>
          <li><a href="logout.php">Déconnection</a> </li>
      
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
	<th>Titre</th>
	<th>Auteur</th>
	<th>Etat</th>
        
        
</tr>
<?php
while($data = mysql_fetch_array($req)){
?>
<tr>
	<td><?php echo $data['titre'] ?></td>
	<td><?php echo $data['auteur'] ?></td>
	<td><?php echo $data['commentaire'] ?></td>
        
	

	<td><a href="supprimerbib.php?id_livre=<?php echo $data['id_livre']?>">supprimer livre</a></td>

	<td><a href="modifbib.php?id_livre=<?php echo $data['id_livre']?>">Modifer livre</a></td>


</tr>


<?php
}
?>
</table>
</FONT >
</figure>
</body>
</html>
