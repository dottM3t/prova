<?php

	session_start();

	if( isset($_SESSION['user_id'])){
		header('Location: verified_session.php');
	}

	require 'db_connect.php';

	if(!empty($_POST['username']) && !empty($_POST['password'])):

		$records = $conn->prepare('SELECT id,username,password FROM utenti WHERE username = :username');
		$records->bindParam('username', $_POST['username']);
		$records->execute();
		$result = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if(count($result) > 0 && password_verify($_POST['password'], $result['password'])){

			$_SESSION['user_id'] = $result['id'];
			
			header('Location: ../webApp/index.php');
		}else {
			$message = 'Sembra che le credenziali siano sbagliate';
		}


		endif;
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../webApp/assets/css/main.css" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="../webApp/index.php" class="logo">&larr;</a>
					<nav id="nav">
						<a href="../webApp/index.php">Home</a>
						<a href="opere.php">Opere</a>
						
						
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
					<h2>Login</h2>
				</header>
				<p>
				<form action="login.php" method="POST">
				<div class="6u 12u$(xsmall)">
				<input type="text" placeholder="Enter your username" name="username"><br>
				</div>
				<div class="6u$ 12u$(xsmall)">
				<input type="password" placeholder="and password" name="password">
				</div><br>
				<input class="button special small accept" type="submit">
				<b>or</b> <a class ="button special small" href="register.php">Register here</a>
				</form>
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
			<script src="../webApp/assets/js/skel.min.js"></script>
			<script src="../webApp/assets/js/util.js"></script>
			<script src="../webApp/assets/js/main.js"></script>

</html>