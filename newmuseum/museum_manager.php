<!DOCTYPE html>
<html>
<head>
	<title>Museum Manager</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../museodurazzo/webApp/assets/css/main.css" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
				<a href="../webApp/index.php" class="logo">&larr;</a>
					<nav id="nav">
						<a href="../museodurazzo/webApp/index.php">Home</a>
						<a href="../museodurazzo/auth/opere.php">Opere</a>
						<a href=""><?php include '../museodurazzo/auth/verified_session.php'; ?></a>
						<a href=""></a>
					<a href="elements.html"></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

<?php

	require '../museodurazzo/auth/db_connect.php';
	

			if($user['privileges']!=NULL && $user['privileges'] < 1 ){
				?>
			<br><br>
		<?php
		?>

<div class="inner"> <h2>Museum Management</h2>
  <p> Here you can backup your museum database, or create a new museum. </p>
	
  	<a class="button special" href="newmuseum.php">New Museum</a>
	<br><br><br>
  	<h3>Upload an sql backup to your server</h3><br>
	<form enctype="multipart/form-data" action="uploaddb.php" method="POST">
	<input type="hidden" name="MAX_FILE_SIZE" value="30000">
    <input name="userfile" type="file" /><br><br>
    <input type="submit" value="Send File" />
</form>

<br>
<h3>Backup your museum</h3><br>
	<a class="button special" href="dump.php">Download Backup</a>
	
	</div>


<!-- se sei loggato mostrami tutte le opere anche non pubblicate -->

<?php } ?>

</body>
	<!-- Script js per navbar -->
			<script src="../museodurazzo/webApp/assets/js/jquery.min.js"></script>
			<script src="../museodurazzo/webApp/assets/js/skel.min.js"></script>
			<script src="../museodurazzo/webApp/assets/js/util.js"></script>
			<script src="../museodurazzo/webApp/assets/js/main.js"></script>

</html>