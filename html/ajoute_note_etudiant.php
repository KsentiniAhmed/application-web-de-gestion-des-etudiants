<?php
include 'include/session_ens.php';
include 'include/db.php';
if(isset($_GET['id_matiere'],$_GET['id_etudiant'])){
	$id_matiere=$_GET['id_matiere'];
	$id_etudiant=$_GET['id_etudiant'];
	$sql1 = "select * from etudier where id_matiere=$id_matiere and id_etudiant=$id_etudiant";
	if($r = mysql_query($sql1) and $d = mysql_fetch_array($r)){
    $note_tp = $d['note_tp'];
    $note_ds = $d['note_ds'];
    $note_exam = $d['note_exam'];
	}else{
	$note_tp = NULL;
    $note_ds = NULL;
    $note_exam = NULL;
	}

}else{
	header('Location: ajout_note_ens.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta charset="utf-8">
</head>
<body>
<a href="indexens.php">Accueil</a>
<a href="logout.php">Déconnection</a>

<?php if (!($note_tp==NULL && $note_ds==NULL && $note_exam==NULL)){ ?>
<form action="ajoute_note_etudiant2.php" method="post">

<input type="hidden" name="id_matiere" value="<?php echo $id_matiere ; ?>">
<input type="hidden" name="id_etudiant" value="<?php echo $id_etudiant ; ?>">
<table>

	


	<tr>
		<td>note_tp</td>
		<td><input type="text" name="note_tp" value="<?php echo $note_tp ; ?>"></td>
		
	</tr>
	<tr>
		<td>note_ds</td>
		<td><input type="text" name="note_ds" value="<?php echo $note_ds ; ?>"></td>
		
	</tr>
	<tr>
		<td>note_exam</td>
		<td><input type="text" name="note_exam" value="<?php echo $note_exam ; ?>"></td>
		
	</tr>
	<tr>
		<td><button type="reset">Annuler</button></td>
		<td><button type="submit">Modif</button></td>

	</tr>
</table>
</form>
<?php }else{
	?>
<form action="ajoute_note_etudiant3.php" method="post">

<input type="hidden" name="id_matiere" value="<?php echo $id_matiere ; ?>">
<input type="hidden" name="id_etudiant" value="<?php echo $id_etudiant ; ?>">
<table>

	<tr>
		<td>note_tp</td>
		<td><input name="note_tp" type="text"></td>
		
	</tr>
	<tr>
		<td>note_ds</td>
		<td><input name="note_ds" type="text"></td>
		
	</tr>
	<tr>
		<td>note_exam</td>
		<td><input name="note_exam" type="text"></td>
		
	</tr>
	<tr>
		<td><button type="reset">Annuler</button></td>
		<td><button type="submit">Modif</button></td>

	</tr>
</table>
</form>
<?php } ?>
</body>
</html>
