<?php
include 'include/session.php';

include 'include/db.php';
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
        
        
        <li><a href="logout.php">Déconnecter</a></li>
        <li><a href="affbib.php">Bibliothéque</a></li>
      
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
<table border="1" color=red>
<tr>
<td><a href="ajoutetud.php">Ajouter etudiant</a></td>
<td><a href="affetud.php">Afficher etudiant</a></td>
</tr>
<tr>
<td><a href="ajouteens.php">ajouter un enseignant</a></td>
<td><a href="affeens.php">afficher un enseignant</a></td>
</tr>
<tr>
<td><a href="ajouteadmin.php">Ajouter cadre admin</a></td>
<td><a href="affadmin.php">Afficher cadre admin</a></td>
</tr>
<tr>
<td><a href="ajoutebib.php">Ajouter un livre</a></td>
<td><a href="affbib.php">Afficher les livres de la bibliothéque</a></td>
</tr>
<tr>
<td><a href="ajoutmat.php">Ajouter une matiere</a></td>
<td><a href="affmat.php">Afficher les matieres</a></td>
</tr>
<tr>
<td><a href="ajoutnote.php">Ajouter des notes</a></td>
<td><a href="affanote.php">Afficher les notes</a></td>
</tr>
        
      </figure>

</body>
</html>
