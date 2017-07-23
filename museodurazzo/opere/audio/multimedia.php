<!DOCTYPE html>
<html>
<head>
	<title>Upload Multimedia File</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../../webApp/assets/css/main.css" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="../crud_opera.php" class="logo">&larr;</a>
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
<section id="main" class="wrapper">
	<div class="inner">
	<header class="align-center">
		<h2>Upload dei file multimediali</h2>
	</header>
	

	<!--Insert form-->
	<div class="inner">
	<header class="align-center">
	<?php
ob_start ();


include '../database/DBQuery.php';
$_db = new DBQuery();

$result = $_db->SelectAll();

?>


<div class="table-wrapper">
<table class="alt">
	<thead>
		<th>#</th>
		<th>Codice Opera</th>
		<th>Nome</th>
		<th>Audio</th>
		<th>Immagini</th>
	</thead>
	<form name="form1" method="post" action="upload.php" enctype="multipart/form-data">


<?php

while ( $row = $result->fetch_array() ) {
	?>

					<tr>
						<td><input name="checkbox"
							type="checkbox" value="<?php echo $row['codice_interno']; ?>"></td>
						<td><?php echo $row['codice_interno']; ?></td>
						<td><?php echo $row['nome']; ?></td>
						<td><?php echo $row['audio']; ?></td>
						<td><?php echo $row['img']; ?></td>
					</tr>


<?php
}
?>
			</td>
	</tr>
</table>
	
		<h3>Seleziona il file da caricare</h3>
		<input type="file" name="insertFile" required><br><br>
		<input class ="button small" type="submit" value="Upload File" name="insert_file">
		<?php


// Check if upload button active, start this

if (isset ( $_POST ['insert_file'] )) {
	$checkbox [] = $_POST ['checkbox'];
	
	for($i = 0; $i < count ( $checkbox ); $i ++) {
		$id = $checkbox [$i];
		
	}
}

?>
	</form>
	</header>
	</div>
	<br/>
	<div class="row">
	<!--Edit form-->
	<div class="6u 12u$(small)">
	<header class="align-center">
	<h3>Modifica file</h3>
	<a class="button small" href="edit_multimedia.php">Click Here</a>
	</header>
	</div>
	
	<!--Delete form-->
	<div class="6u 12u$(small)">
	<header class="align-center">
	<h3>Cancella file</h3>
	<a class="button small" href="erase_multimedia.php">Click Here</a>
	</header>
	</div>
	

</body>
	<!-- Script js per navbar -->
			<script src="../../webApp/assets/js/jquery.min.js"></script>
			<script src="../../webApp/assets/js/skel.min.js"></script>
			<script src="../../webApp/assets/js/util.js"></script>
			<script src="../../webApp/assets/js/main.js"></script>

</html>