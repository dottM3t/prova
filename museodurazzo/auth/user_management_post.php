<?php ob_start (); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../webApp/assets/css/main.css" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="user_management.php" class="logo">&larr;</a>
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
		if($user['privileges']!=NULL && $user['privileges'] < 1 ){
			
		}

			else{ 	
					header('Location: access_denied.php');
					}

	?>
<?php

include '../opere/database/DBQuery.php';
$res = '';
$codice_originale = '';
$_db = new DBQuery();

if (isset ( $_POST ['Alter'] )) {
	$row [] = null;
	if(!isset($_POST ['checkbox'])){
		
		trigger_error("<script type='text/javascript'>alert('Devi selezionare un utente a cui applicare i privilegi');location.replace('user_management.php')</script>')", E_USER_ERROR);

	}
	$checkbox [] = $_POST ['checkbox'];
	for($i = 0; $i < count ( $checkbox ); $i ++) {
		$id = $checkbox [$i];
	}
}
$res = $_db->SelectUserId($id);
while ( $row = $res->fetch_array() ) {
	?>

<section calss="one" class="wrapper">
	<div class="inner">

	 <h4>User: </h4><?php echo htmlspecialchars($row['username']); ?> <br><br>

	<div style="border: 1px solid; border-color: #5385C1; padding: 8px; background-color: #F9F9F9;">
	<br>
	<h2>Edit privileges</h2>
	<form method='post' action='' id='mod'>
	<input type='text' style='display:none;' name='id_mod' value='<?php echo $id; ?>'>
	Insert privileges:<br>
	<input name='priv_mod' value="<?php echo $row ['privileges']; ?>" required><br><br>

	<input name='inv_mod' type='submit' value='Apply'>
	</form>

	</div>

<div class="inner">
<br>
	<h4>Insert value '0' for grant administrator privileges</h4>
	<h4>Insert value '1' for grant operator privileges</h4>
	<h4>Insert value '2' for normal user</h4>

	<br><br>
</div>

<?php

}

$id = '';


if (isset ( $_POST ['inv_mod'] )) {
	
	$id = $_POST['id_mod'];
	
	$privileges = $_POST ['priv_mod'];

	$queryResult = $_db->UpdateUserPrivileges( $id, $privileges);
	
	if ($queryResult == TRUE) {

		header ( 'Location: http://idsmuseum.000webhostapp.com/museodurazzo/auth/user_management.php' );
	}
}

?>

</body>
	<!-- Script js per navbar -->
			<script src="../webApp/assets/js/jquery.min.js"></script>
			<script src="../webApp/assets/js/skel.min.js"></script>
			<script src="../webApp/assets/js/util.js"></script>
			<script src="../webApp/assets/js/main.js"></script>
</html>