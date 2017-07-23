<!DOCTYPE html>
<html>
<head>
	<title>Permesso Negato!</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../webApp/assets/css/main.css" />
<link rel="icon" href="https://idsmuseum.000webhostapp.com/museodurazzo/webApp/favicon.ico" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<nav id="nav">
						<a href="../webApp/index.php">Home</a>
						<a href="opere.php">Opere</a>
						<a href=""><?php include 'verified_s_subpage.php'; ?></a>
					<a href="elements.html"></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

<section id="main" class="wrapper">
	<div class="inner">

			<div class="flex flex-2">
				<article>
				<header class="align-left">
					<h2>Accesso Negato!</h2>
				</header>
				<p><strong>
				Se pensi sia un errore contatta il webmaster</strong><br><br>
				<a class ="button special small" href="../webApp/index.php">Indietro</a>
				</p>

			<footer>

			</footer>


			</article>
		</div>
			<?php if(!empty($message)): ?>
	<p><?= $message ?></p>
<?php endif; ?>
	</div>

</section>
</body>
	<!-- Script js per navbar -->
			<script src="../webApp/assets/js/jquery.min.js"></script>
			<script src="../webApp/provaApp/assets/js/skel.min.js"></script>
			<script src="../webApp/provaApp/assets/js/util.js"></script>
			<script src="../webApp/provaApp/assets/js/main.js"></script>

</html>