<!DOCTYPE html>
<html>
<head>
	<title>Modifica Multimedia</title>
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
<h2 class="align-center"> Modifica Audio</h2>

<div class="table-wrapper">
<table class="alt">
	<thead>
		<th>#</th>
		<th>Codice Opera</th>
		<th>Nome</th>
		<th>Audio</th>
	</thead>
		<form name="form1" method="post" action="edit_audio.php">


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
	<input style="float: right;" name="edit_audio" type="submit" value="Modifica">



</form>

</div>

<?php
ob_start ();



$_db = new DBQuery();

$result = $_db->SelectAll();

?>
<h2 class="align-center"> Modifica Immagini</h2>

<div class="table-wrapper">
<table class="alt">
	<thead>
		<th>#</th>
		<th>Codice Opera</th>
		<th>Nome</th>
		<th>Immagini</th>
	</thead>
		<form name="form1" method="post" action="edit_image.php">


<?php

while ( $row = $result-> fetch_array () ) {
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
	<input style="float: right;" name="edit_image" type="submit" value="Modifica">


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