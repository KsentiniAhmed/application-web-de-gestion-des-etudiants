<?php
include 'include/session.php';
include 'include/db.php';

if(isset($_GET['cin'])){
	$cin=$_GET['cin'];

	$sql1 = "select * from cadre_admin where cin=$cin";
	$r = mysql_query($sql1);
	if($d = mysql_fetch_array($r)){
		
		$nom = $d['nom'];
		$prenom = $d['prenom'];
		$dn = $d['dn'];
		$sexe = $d['sexe'];
		$pass = $d['password'];

	}else{
		header('Location: affadmin.php');
	}


}else{
	header('Location: affadmin.php');
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
        
        <li><a href="affadmin.php">Afficher admin</a></li>
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



<form action="modifadmin2.php" method="post">

<input type="hidden" name="cin" value="<?php echo $cin ?>">
<FONT COLOR="black" >
<table>

	<tr>
		<td>Nom</td>
		<td><input name="nom" type="text" value="<?php echo $nom ?>"></td>
	</tr>
	<tr>
		<td>Prenom</td>
		<td><input name="prenom" type="text" value="<?php echo $prenom ?>"></td>
	</tr>
	<tr>
		<td>Date naissance</td>
		<td><input name="dn" type="date" value="<?php echo $dn ?>"></td>
	</tr>
	<tr>
		<td>Sexe</td>
		<td>
			<select name="sexe">
				<option <?php if($sexe == 'femme') echo "selected" ?> value="femme">femme</option>
				<option <?php if($sexe == 'homme') echo "selected" ?> value="homme">homme</option> 
			</select>
		</td>
	</tr>

	<tr>
		<td>Password</td>
		<td><input name="password" type="password" value="<?php echo $pass ?>"></td>
	</tr>
	<tr>
		
		<td><button type="reset">Annuler</button></td>
		<td><button type="submit">Modif</button></td>

	</tr>
</table>
</FONT>
</form>
</figure>
</body>
</html>
