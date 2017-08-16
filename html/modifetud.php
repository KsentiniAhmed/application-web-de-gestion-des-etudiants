<?php
include 'include/session.php';
include 'include/db.php';

if(isset($_GET['cin'])){
	$cin=$_GET['cin'];

	$sql1 = "select * from etudiant where cin=$cin";
	$r = mysql_query($sql1);
	if($d = mysql_fetch_array($r)){
                $cin = $d['cin']; 
                $pass = $d['password'];
		$nom = $d['nom'];
		$prenom = $d['prenom'];
		$dn = $d['dn'];
		$id_section = $d['id_section'];
                $sexe = $d['sexe']; 

	}else{
		header('Location: affetud.php');
	}


}else{
	header('Location: affetud.php');
}
function getSection($id){
	$s = "SELECT nom FROM section where `id_section`=$id";
	$r = mysql_query($s);
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
<body>


<form action="modifetud2.php" method="post">

<input type="hidden" name="cin" value="<?php echo $cin ?>">
<FONT COLOR="black" >
<table>
        <tr>
		<td>cin</td>
		<td><input name="cin" value="<?php echo $cin ?>" type="cin"></td>
	</tr>

        <tr>
		<td>password</td>
		<td><input name="password" value="<?php echo $pass ?>" type="password"></td>
	</tr>

	<tr>
		<td>Nom</td>
		<td><input name="nom" value="<?php echo $nom ?>" type="text"></td>
	</tr>

	<tr>
		<td>Prenom</td>
		<td><input name="prenom" value="<?php echo $prenom ?>" type="text"></td>
	</tr>
	<tr>
		<td>Date nass</td>
		<td><input name="dn" value="<?php echo $dn ?>" type="date"></td>
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
<option <?php if($data['id_section'] == $id_section) echo "selected" ?> value="<?php echo $data['id_section']?>"><?php echo getSection($data['id_section'])?></option>
				<?php
				}
				?>
			</select>
		</td>
	</tr>
              <td>sexe</td>
		<td>
			<select name="sexe">
				<option value="homme">homme</option>
				<option value="femme">femme</option>
			</select>
              </td>
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
