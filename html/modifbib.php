<?php
include 'include/session.php';
include 'include/db.php';

if(isset($_GET['id_livre'])){
	$id=$_GET['id_livre'];

	$sql1 = "select * from bibliotheque where id_livre=$id";
	$r = mysql_query($sql1);
	if($d = mysql_fetch_array($r)){
		$titre = $d['titre'];
		$auteur = $d['auteur'];

		$commentaire = $d['commentaire'];

	}else{
		header('Location: affbib.php');
	}


}else{
	header('Location: affbib.php');
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
        
         <li><a href="affbib.php">Afficher la Bibliothéque</a></li>
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



<form action="modifbib2.php" method="post">

<input type="hidden" name="id_livre" value="<?php echo $id ?>">
<FONT COLOR="black" >
<table>
	<tr>
		<td>titre</td>
		<td><input name="titre" value="<?php echo $titre ?>" type="text"></td>
	</tr>

	<tr>
		<td>Auteur</td>
		<td><input name="auteur" value="<?php echo $auteur ?>" type="text"></td>
	</tr>
	
	<tr>
		<td>Commentaire</td>
              <td><input name="commentaire" value="<?php echo $commentaire ?>" type="text"></td>
		
	</tr>
	<tr>
		<td><button type="reset">Annuler</button></td>
		<td><button type="submit">Modifier</button></td>

	</tr>
</table>
</FONT >
</form>
</figure>
</body>
</html>
