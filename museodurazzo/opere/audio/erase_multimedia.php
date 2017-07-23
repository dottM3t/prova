<!DOCTYPE html>
<html>
<head>
	<title>Elimina Multimedia</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../../webApp/assets/css/main.css" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="multimedia.php" class="logo">&larr;</a>
					<nav id="nav">
						<a href="../../webApp/index.php">Home</a>
						<a href="../../auth/opere.php">Opere</a>
						<a href=""><?php include '../../auth/verified_session.php'; ?></a>

					<a href="elements.html"></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

			<?php
	require '../../auth/db_connect.php';
		if($user['privileges']!=NULL && $user['privileges'] < 2 ){
			
		}

			else{ 	
					header('Location: ../../auth/access_denied.php');
					}

	?>

	<section id="one" class="wrapper">
		<div class="inner">

<?php
ob_start ();


include '../database/DBQuery.php';
$_db = new DBQuery();

$result = $_db->SelectAll();

?>
<h2 class="align-center"> Cancella Audio</h2>

<div class="table-wrapper">
<table class="alt">
	<thead>
		<th>#</th>
		<th>Codice Opera</th>
		<th>Nome</th>
		<th>Audio</th>
	</thead>
		<form name="form1" method="post" action="">


<?php

while ( $row = $result->fetch_array () ) {
	?>

					<tr>
						<td><input name="checkbox"
							type="checkbox" value="<?php echo $row['codice_interno']; ?>"></td>
						<td><?php echo $row['codice_interno']; ?></td>
						<td><?php echo $row['nome']; ?></td>
						<td><?php echo $row['audio']; ?></td>
					</tr>


<?php
}
?>
			</td>
	</tr>
</table>
	<input style="float: right;" name="delete_audio" type="submit" value="Elimina">

<?php


// Check if delete button active, start this

if (isset ( $_POST ['delete_audio'] )) {

	if(!isset($_POST['checkbox'])){
		
		trigger_error("<script type='text/javascript'>alert('Devi selezionare un\'opera');location.replace('erase_multimedia.php')</script>')", E_USER_ERROR);

		}else{
	$checkbox [] = $_POST ['checkbox'];
	
	$del_id='';
	for($i = 0; $i < count ( $checkbox ); $i ++) {
		$del_id = $checkbox [$i];
	}
	
		

	$selectaudiopath = new DBQuery();
	$result=$selectaudiopath->SelectAudioPath($del_id);
	$audio_path='';
		while($row=$result->fetch_array()){
		
		$audio_path=$row['audio'];
	}
	
	$selectaudiopath->getMysqli()->closeConnection();

	if($audio_path==null){
		trigger_error("<script type='text/javascript'>alert('Non sono presenti file audio da eliminare');location.replace('erase_multimedia.php')</script>')", E_USER_ERROR);
	}
	
	$deleteaudiopath = new DBQuery();
	$deleteaudiopath->DeleteAudioPath($del_id);
		
	unlink($audio_path);
	
	$deleteaudiopath->getMysqli()->closeConnection();
	
	$filename = explode('/',$audio_path);

	?>

	<script type="text/javascript">alert("File <?php echo $filename[1]; ?> deleted");location.replace("erase_multimedia.php")</script>
	<?php

}}

?>

</form>

</div>

<?php
ob_start ();



$_db = new DBQuery();

$result = $_db->SelectAll();

?>
<h2 class="align-center"> Cancella Immagini</h2>

<div class="table-wrapper">
<table class="alt">
	<thead>
		<th>#</th>
		<th>Codice Opera</th>
		<th>Nome</th>
		<th>Immagini</th>
	</thead>
		<form name="form1" method="post" action="">


<?php

while ( $row = $result->fetch_array() ) {
	?>

					<tr>
						<td><input name="checkbox"
							type="checkbox" value="<?php echo $row['codice_interno']; ?>"></td>
						<td><?php echo $row['codice_interno']; ?></td>
						<td><?php echo $row['nome']; ?></td>
						<td><?php echo $row['img']; ?></td>
					</tr>


<?php
}
?>
			</td>
	</tr>
</table>
	<input style="float: right;" name="delete_image" type="submit" value="Elimina">

<?php

if (isset ( $_POST ['delete_image'] )) {

	if(!isset($_POST['checkbox'])){
		
		trigger_error("<script type='text/javascript'>alert('Devi selezionare un\'opera');location.replace('erase_multimedia.php')</script>')", E_USER_ERROR);
		
		}else{
	$checkbox [] = $_POST ['checkbox'];
	
	for($i = 0; $i < count ( $checkbox ); $i ++) {
		$del_id = $checkbox [$i];

	}
	
	$selectimagepath = new DBQuery();
	$result=$selectimagepath->SelectImagePath($del_id);
	$image_path='';
		while($row=$result->fetch_array()){
		
		$image_path=$row['img'];
	}
	
	$selectimagepath->getMysqli()->closeConnection();

		if($image_path==null){
		trigger_error("<script type='text/javascript'>alert('Non sono presenti file immagine da eliminare');location.replace('erase_multimedia.php')</script>')", E_USER_ERROR);
	}
	
	$deleteimagepath = new DBQuery();
	$deleteimagepath->DeleteImagePath($del_id);
		
	unlink($image_path);
	
	$deleteimagepath->getMysqli()->closeConnection();
	
	$filename = explode('/',$image_path);

	?>
	<script type="text/javascript">alert("File <?php echo $filename[1]; ?> deleted");location.replace("erase_multimedia.php")</script>
<?php

}}

?>

</form>

</div>

</div></section>
</body>
	<!-- Script js per navbar -->
			<script src="../../webApp/assets/js/jquery.min.js"></script>
			<script src="../../webApp/assets/js/skel.min.js"></script>
			<script src="../../webApp/assets/js/util.js"></script>
			<script src="../../webApp/assets/js/main.js"></script>
</html>