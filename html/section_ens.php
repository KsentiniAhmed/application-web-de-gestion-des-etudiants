<?php
include 'include/session_ens.php';
include 'include/db.php';

if(isset($_GET['id_section'],$_GET['id_enseignant'])){
	$id_section=$_GET['id_section'];
	$id_enseignant=$_GET['id_enseignant'];
}else{header('Location: indexens.php');}
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
	$sql1 = "SELECT * FROM enseignant WHERE `cin`=$id;";
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
       <li class="active"><a href="indexens.php">Accueil</a></li>
         <li><a href="affbi.php">Bibliothéque</a></li>
         
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
function getMatiere($id){
	global $connect;
	$com = "SELECT `nom` FROM matiere where `id_matiere`=$id ;";
	$r = mysql_query($com);
	if($data = mysql_fetch_array($r)){
		return $data["nom"];
	}
	return "";
}
$sql1 = "select * from enseignement where ( id_section=$id_section and id_enseignant=$id_enseignant);";
	if($r = mysql_query($sql1)){
		while($data2 = mysql_fetch_array($r)){
$link="matiere_ens.php?id_section=".$data2['id_section']."&id_enseignant=".$id_enseignant."&id_matiere=".$data2['id_matiere'];				
			?>

<tr><td><a href=<?php echo $link ?>><?php echo getMatiere($data2['id_matiere']) ?></a></td></tr>
	<?php	
	}}else{
		header('Location: indexens.php');
	}?>
</figure>
</body>
</html>
