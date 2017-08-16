<?php
include 'include/session.php';
$ajout = false;
if(isset($_POST['password'],$_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['dn'], $_POST['sexe'])){
	include 'include/db.php';
    $cin = $_POST['cin'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$dn = $_POST['dn'];
    $sexe = $_POST['sexe'];
    $pass = $_POST['passowrd'];
$sql = "INSERT INTO `cadre_admin` (`cin`, `nom`, `prenom`, `dn`, `sexe`, `password` ) VALUES ('$cin', '$nom', '$prenom', '$dn', '$sexe' ,'$pass');";
	
	if(mysql_query($sql)){
	$ajout = true;}

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
       
           <li> <a href="affadmin.php">Afficher</a></li>
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
if($ajout ==true){
	echo "Ajouté";
}
?>

<form action="" method="post">
<FONT COLOR="black" >
<table>
	<tr>
		<td>Cin</td>
		<td><input name="cin" type="text"></td>
	</tr>

	<tr>
		<td>Nom</td>
		<td><input name="nom" type="text"></td>
	</tr>

	<tr>
		<td>Prenom</td>
		<td><input name="prenom" type="text"></td>
	</tr>
	<tr>
		<td>Date nass</td>
		<td><input name="dn" type="date"></td>
	</tr>
		<tr>
		<td>sexe</td>
		<td>	
			<select name="sexe">
				<option value="femme">femme</option>
				<option value="homme">homme</option>  
			</select>
		</td>
	</tr>
	<tr>
		<td>mots de passe</td>
		<td><input name="password" type="text"></td>
	</tr>
	<tr>
		<td><button type="reset">Annuler</button></td>
		<td><button type="submit">Ajouter</button></td>

	</tr>
</table>
</FONT>
</form>
</figure>
</body>
</html>
