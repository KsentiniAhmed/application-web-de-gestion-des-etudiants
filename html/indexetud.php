<?php
include 'include/session_etud.php';
include 'include/db.php'
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
         <li><a href="affbibe.php">Bibliothéque</a></li>
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
<tr><td><h1><a href="affbibe.php">Afficher les livres disponnibles</a></h1></td></tr>
<tr><td><h1><a href="affnote.php">Afficher les notes</a></h1></td></tr>

 </figure>

</body>
</html>
