<?php

	session_start();

	require 'db_connect.php';

	if( isset($_SESSION['user_id'])){
		header('Location: ../webApp/index.php');
	}

	$message = '';

	if(!empty($_POST['username']) && !empty($_POST['password'])):

		//Inserisco il nuovo utente nel database
		$query = 'INSERT INTO utenti (username, password) VALUES (:username, :password)';
		$stm = $conn->prepare($query);
		$stm->bindParam(':username', $_POST['username']);
		$psw = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stm->bindParam(':password', $psw);
		if( $stm->execute() ):
  	?>
		<script type="text/javascript">alert("Registrazione effettuata con successo"); location.replace("login.php")</script>
		<?php
		else:
			?>
		<script type="text/javascript">alert("Registrazione fallita");location.replace("login.php")</script>
		<?php
		  endif;

		endif;
 ?>


<!DOCTYPE html>
<html>
<title>Register Below</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../webApp/assets/css/main.css" />
<link rel="icon" href="https://idsmuseum.000webhostapp.com/museodurazzo/webApp/favicon.ico" />
	</head>
	<body class="subpage">
		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="../webApp/index.php" class="logo">&larr;</a>
					<nav id="nav">
						<a href="../index.php">Home</a>
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
					<h2>Register</h2>
				</header>
				<p>
				<form action="register.php" method="POST">
				<div class="6u 12u$(xsmall)">
				<input type="text" placeholder="Enter your username" name="username"><br>
				</div>
				<div class="6u$ 12u$(xsmall)">
				<input type="password" placeholder="and password" name="password">
				</div><br>
				<div class="6u$ 12u$(xsmall)">
				<input type="password" placeholder="confirm password" name="confirm_password"><br />
				</div>
				<input class="button special small accept" type="submit">
				</form>
				</p>

			<footer>

			</footer>
			</article>

</div>
</div>
</section>
<?php if(!empty($message)): ?>
	<p><?= $message ?></p>
	<?php endif; ?>
</body>

	<!-- Script js per navbar -->
			<script src="../webApp/assets/js/jquery.min.js"></script>
			<script src="../webApp/assets/js/skel.min.js"></script>
			<script src="../webApp/assets/js/util.js"></script>
			<script src="../webApp/assets/js/main.js"></script>
</html>