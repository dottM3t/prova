<?php
	session_start();
	require 'db_connect.php';
	$user = NULL;
	
	if( isset($_SESSION['user_id']) ){

		$records = $conn->prepare('SELECT id,username,password, privileges FROM utenti WHERE id = :id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$result = $records->fetch(PDO::FETCH_ASSOC);

		

		if( count($result) > 0){
			$user = $result;
		}	

	}

	?>

<html>
	<body>
	
	<?php if( !empty($user) ): ?>
	<?= htmlspecialchars($user['username']); ?> 
	<a class="button small special round" href="/museodurazzo/auth/logout.php">Logout</a>
	

	<?php else: ?>
	<a class="button small special round" href="../auth/login.php">Login</a>
<?php endif; ?>


</body>
	
</html>