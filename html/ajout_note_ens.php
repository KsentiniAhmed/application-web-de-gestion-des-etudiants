<?php
include 'include/session_ens.php';
$ajout = false;
if(isset($_GET['id_section'],$_GET['id_matiere'])){
$id_section = $_GET['id_section'];
$id_matiere = $_GET['id_matiere'];
}else{header('Location: matiere_ens.php');}
include 'include/db.php';

$sql = "select * from etudiant where `id_section` = $id_section;";

$req = mysql_query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
</head>
<body>
<a href="indexens.php">Accueil</a>
<a href="logout.php">Déconnection</a>
<table border="1">
<tr>
	<th>CIN</th>
	<th>Nom</th>
	<th>Prenom</th>

</tr>
<?php

while($data = mysql_fetch_array($req)){
?>
<tr>
	<td><?php echo $data['cin'] ?></td>
	<td><?php echo $data['nom'] ?></td>
	<td><?php echo $data['prenom'] ?></td>
	<?php
	$cin=$data['cin'];
	$sql1234="select * from `double_correction` where (`id_etudiant`=$cin and `id_matiere`=$id_matiere);";
	$sql123="select * from `etudier` where `id_etudiant`=$cin and `id_matiere`=$id_matiere";
	if (!($re=mysql_query($sql123) and $d3=mysql_fetch_array($re) and !($d3['note_ds']=$d3['note_td']=$d3['note_exam']=0))){
	$link2="ajoute_note_etudiant.php?id_etudiant=".$data['cin']."&id_matiere=".$id_matiere;
	?>
	<td><a href="<?php echo $link2?>">ajouter note</a></td>
<?php }
if(($re2=mysqli_query($connect,$sql1234)) and ($d2=mysqli_fetch_array($re2)) and (strcmp($demande=$d2['demande'],""))){
	$link1="modif_dc_note_etudiant.php?id_matiere=".$id_matiere."&id_etudiant=".$cin."&demande=".$demande;?>
<td><a href="<?php echo $link1 ?>">demande double correction note</a></td>
<?php } ?>
</tr>


<?php
}
?>
</table>


</body>
</html>
