<?php
include 'include/session.php';
include 'include/db.php';
$ajout = false;
if(isset($_POST['cin'],$_POST['password'], $_POST['nom'],$_POST['prenom'],$_POST['dn'],$_POST['id_section'])){
        $cin = $_POST['cin'];
        $pass = $_POST['password'];
        $nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$dn = $_POST['dn'];
		$section = $_POST['id_section'];
        $sexe = $_POST['sexe'];
        

$sql = "INSERT INTO `etudiant` (`cin`,`password`, `nom`, `prenom`, `dn`, `id_section`, `sexe`) VALUES ('$cin', '$pass','$nom', '$prenom', '$dn', '$section' ,'$sexe');";
	
	if(mysql_query($sql)){
	$ajout = true;}
}
function getSection($id){
	$com = "SELECT nom FROM section where `id_section`=$id";
	$r = mysql_query($com);
	if($data = mysql_fetch_array($r)){
		return $data["nom"];
	}
	return "";
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
        
        
       
        <li><a href="affbib.php">Bibliothéque</a></li>
       <li><a href="affetud.php">Afficher les etudiants</a></li>
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
		<td>CIN</td>
		<td><input name="cin" type="text"></td>
	</tr>
         <tr>
		<td>mots de passe </td>
		<td><input name="password" type="password"></td>
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
		<td>Section</td>
		<td>
			<select name="id_section">
				<?php
				$s = "SELECT * FROM section";
				$req = mysql_query($s);
				while($data = mysql_fetch_array($req)){
			?>
<option value="<?php echo $data['id_section']?>"> <?php echo getSection($data['id_section'])?></option>
				<?php
				}
				?>
			</select>
		</td>
	</tr>
        <tr>
        <tr>
		<td>sexe</td>
		<td>
			<select name="sexe">
				<option value="homme">homme</option>
				<option value="femme">femme</option>
			</select>
		</td>
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
