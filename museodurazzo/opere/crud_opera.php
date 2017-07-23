

<!DOCTYPE html>
<html>
<head>
	<title>Gestione Opere</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../webApp/assets/css/main.css" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="../auth/opere.php" class="logo">&larr;</a>
					<nav id="nav">
						<a href="../webApp/index.php">Home</a>
						<a href="../auth/opere.php">Opere</a>
						<a href=""><?php include '../auth/verified_session.php'; ?></a>
						
					<a href="elements.html"></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
<?php


			if($user['privileges']!=null && $user['privileges'] < 2 ){
			
		}

			else{ 	
					header('Location: ../auth/access_denied.php');
					}
					?>

<section id="main" class="wrapper">
	<div class="inner">
	<header class="align-center">
		<h2>Gestisci Opere</h2>
	</header>
	<div>

	<h2>Create a new opera entries</h2>
	<?php include '../opere/create.php'; ?>

	
    </div>
	<br>
	<div class="flex flex-2">
	<h2>Or Modify an opera     --></h2>
		<a class="button special" href="alter.php">Click Here</a>
	<h2> Or Delete an opera     --></h2>
	<a class="button special" href="delete.php">Click Here</a>
	</div>
	
	<div class="row">
	<div class="6u 12u$(small)">
	<br>
	    <h2>File multimediali</h2>
    	<a class="button special" href="../opere/audio/multimedia.php">Click Here</a>
    	</div>

    <div class="6u 12u$(small)">
    <br>
    <!--Published form da inserire nella pagina gestisci opera-->
    <h2>Pubblica l'opera</h2>
	<a class="button special" href="audio/pubblica.php">Click Here</a>
    </div>

    </div>
	<br>
</div>
</section>
</body>

	<!-- Script js per navbar -->
			<script src="../webApp/assets/js/jquery.min.js"></script>
			<script src="../webApp/assets/js/skel.min.js"></script>
			<script src="../webApp/assets/js/util.js"></script>
			<script src="../webApp/assets/js/main.js"></script>

</html>
