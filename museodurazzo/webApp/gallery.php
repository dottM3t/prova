<html>
	<head>
		<title>Gallery</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
<link rel="icon" href="https://idsmuseum.000webhostapp.com/museodurazzo/webApp/favicon.ico" />
	</head>
	<body>
	
			<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"></a>
					<nav id="nav">
						<a href="index.php">Home</a>
						<a href="../auth/opere.php">Opere</a>
						<a href=""><?php include "../auth/verified_session.php"; ?></a>
					<a href="elements.html"></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span>
					</a>
				</div>
			</header>
			
			<!-- Banner -->
			<section id="banner">
				<h1>Durr&euml;s Archaeological Museum</h1>
				<!--<p>A free responsive HTML5 website template by TEMPLATED.</p> --> 
			</section>
			<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
					<?php
					
						include '../opere/database/DBQuery.php';
						$db = new DBQuery();
						$result = $db -> SelectAllImg();
						while ($row = $result->fetch_assoc() ){
						/*
					?>
						<article>
							<header>
								<div class="image fit">
									<img src="../opere/audio/<?php echo $row['img']; ?>">
								</div>
							</header>
						</article>
						
					<?php
				*/
					
					htmlspecialchars('
						<article>
							<header>
								<div class="image fit">
									<img src="../opere/audio/'.$row['img'].'">
								</div>
							</header>
						</article>
					');
					
					}	
					?>
					</div>
				</div>
			</section>
			
			
			
			
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="flex">
						<div class="copyright">
							
						</div>
						<ul class="icons">
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-linkedin"><span class="label">linkedIn</span></a></li>
							<li><a href="#" class="icon fa-pinterest-p"><span class="label">Pinterest</span></a></li>
							<li><a href="#" class="icon fa-vimeo"><span class="label">Vimeo</span></a></li>
						</ul>
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>