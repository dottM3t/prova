
<!DOCTYPE HTML>
<html>
	<head>
		<title>Museum</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="" class="logo"></a>
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
				<h1>Durrës Archaeological Museum</h1>
				<!--<p>A free responsive HTML5 website template by TEMPLATED.</p> --> 
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">
					<div class="flex flex-3">
					<?php
						include '../opere/database/DBQuery.php';
						$db = new DBQuery();
						$result = $db -> SelectAllLimit();
						while ($row = $result->fetch_assoc() ){
					?>
						<article>
							<header>
								<h3><?php echo $row['nome']; ?></h3>
							</header>
							<p><?php echo $row['d_short']; ?></p>
							<footer>
								<a href="../auth/opera.php?id=<?php echo $row['codice_interno']; ?>" class="button special">More</a>
							</footer>
						</article>
						
					<?php
					}	
					?>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style1 special">
				<div class="inner">
					<header>
					<!--
						<h2></h2>
						<h3> 
						<a style="cursor:pointer"
							onclick=" window.open('images/Video.mp4','',' scrollbars=yes,channelmode=yes,menubar=no,width=300, resizable=yes,toolbar=no,location=no,status=no')">Click here to watch our video- presentation
						<iframe width="560" height="315" src="https://www.youtube.com/embed/3-m1PG4uIOY" frameborder="0" allowfullscreen></iframe>
						</a>	
						</h3>
					-->
					</header>
					<div class="flex flex-4">
						
						<div class="box person">
						<a href="">
							<div class="image round">
								<img src="images/code_index.png" alt="Person 1" />
							</div>
							<h3>QRCODE</h3>
							<p>get our application</p>
							</a>
						</div>
						
						<div class="box person">
						<a href="https://www.youtube.com/channel/UCu6NC7PhJu5Nj8DzixcCNqw">
							<div class="image round">
								<img src="images/youtube.jpg" alt="Person 2" />
							</div>
							<h3>WATCH</h3>
							<p>YouTube channel</p>
						</a>
						</div>
						
						<div class="box person" >
						<a href="gallery.php">
							<div class="image round">
								<img src="images/gallery.jpg" alt="Person 3" />
							</div>
							<h3>GALLERY</h3>
							<p>Watch our gallery</p>
						</a>	
						</div>
						
					</div>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper special">
				<div class="inner">
					<header class="align-center">
						<h2>Mostre ed eventi</h2>
						<p> </p>
					</header>
					<div class="flex flex-2">
						<article>
							<div class="image fit">
								<img src="images/reperti.jpg" alt="Pic 01" />
							</div>
							<header>
								<h3>In corso</h3>
							</header>
							<p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor lorem ipsum.</p>
							<footer>
								<a href= "events.php" class="button special">More</a>
							</footer>
						</article>
						<article>
							<div class="image fit">
								<img src="images/eventi1.jpg" alt="Pic 02" />
							</div>
							<header>
								<h3>In programma</h3>
							</header>
							<p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse commodo ullamcorper magna non comodo sodales tempus.</p>
							<footer>
								<a href= "events.php" class="button special">More</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="flex">
						<div class="copyright">
						<?php

	require '../auth/db_connect.php';

			if($user['privileges']!=NULL && $user['privileges'] < 1 ){
				?>
							<a href= "../auth/user_management.php" class="button special">User managemant</a>

							<a href= "../../newmuseum/museum_manager.php" class="button special">Museum Manager</a>
			<?php } else{} ?>
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