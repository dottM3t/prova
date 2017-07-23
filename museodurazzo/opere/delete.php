<!DOCTYPE html>
<html>
<head>
	<title>Cancella Opera</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../webApp/assets/css/main.css" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="crud_opera.php" class="logo">&larr;</a>
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
	require '../auth/db_connect.php';
		if($user['privileges']!=NULL && $user['privileges'] < 2 ){
			
		}

			else{ 	
					header('Location: ../auth/access_denied.php');
					}

	?>

	<section id="one" class="wrapper">
		<div class="inner">

<?php
ob_start ();


include 'database/DBQuery.php';
$_db = new DBQuery();

$result = $_db->SelectAll();

?>
<h2 class="align-center"> Elimina Opera</h2>

<div class="table-wrapper">
<table class="alt">
	<thead>
		<th>#</th>
		<th>Codice Opera</th>
		<th>Nome</th>
	</thead>
		<form name="form1" method="post" action="delete.php">


<?php

while ( $row = mysqli_fetch_array ( $result ) ) {
	?>

					<tr>
						<td><input name="checkbox"
							type="checkbox" value="<?php echo $row['codice_interno']; ?>"></td>
						<td><?php echo htmlspecialchars($row['codice_interno']); ?></td>
						<td><?php echo htmlspecialchars($row['nome']); ?></td>
					</tr>


<?php
}
?>
			</td>
	</tr>
</table>
	<input style="float: right;" name="delete" type="submit" value="Delete">

<?php

	
// Check if delete button active, start this

if (isset ( $_POST ['delete'] )) {
	if(!isset($_POST ['checkbox'])){
		
		trigger_error("<script type='text/javascript'>alert('Devi selezionare un\'opera da eleminare');location.replace('delete.php')</script>')", E_USER_ERROR);

	}
	$checkbox [] = $_POST ['checkbox'];
	
	for($i = 0; $i < count ( $checkbox ); $i ++) {
		$del_id = $checkbox [$i];
		$res=$_db->DeleteOpera( $del_id );
		if($res==TRUE){
		header ( 'Refresh:0' );
		}
	}
}

?>

</form>

</div></div></section>
</body>
	<!-- Script js per navbar -->
			<script src="../webApp/assets/js/jquery.min.js"></script>
			<script src="../webApp/assets/js/skel.min.js"></script>
			<script src="../webApp/assets/js/util.js"></script>
			<script src="../webApp/assets/js/main.js"></script>
</html>