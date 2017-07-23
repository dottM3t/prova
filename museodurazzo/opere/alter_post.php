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
					<a href="alter.php" class="logo">&larr;</a>
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
<?php

include 'database/DBQuery.php';
$res = '';
$codice_originale = '';
$_db = new DBQuery();

if (isset ( $_POST ['Alter'] )) {
	$row [] = null;
	if(!isset($_POST ['checkbox'])){
		
		trigger_error("<script type='text/javascript'>alert('Devi selezionare un\'opera da modificare');location.replace('alter.php')</script>')", E_USER_ERROR);

	}
	$checkbox [] = $_POST ['checkbox'];
	for($i = 0; $i < count ( $checkbox ); $i ++) {
		$codice_originale = $checkbox [$i];
	}
}
$res = $_db->SelectOperaResult($codice_originale);
while ( $row = $res->fetch_array() ) {
	?>

<section calss="one" class="wrapper">
	<div class="inner">

	 <h4>Codice opera:</h4><?php echo htmlspecialchars($codice_originale); ?><br><br>
	 <h4>Nome: </h4><?php echo htmlspecialchars($row ['nome']); ?><br><br>
	 <h4>Descrizione breve:</h4> <?php echo htmlspecialchars($row ['d_short']); ?><br><br>
	 <h4>Descrizione estesa:</h4> <?php echo htmlspecialchars($row ['d_estesa']); ?><br><br>
	 <h4>Category:</h4> <?php echo htmlspecialchars($row ['category']); ?><br><br>
	 <h4>Type:</h4> <?php echo htmlspecialchars($row ['type']); ?><br><br>
	 <h4>Material:</h4> <?php echo htmlspecialchars($row ['material']); ?><br><br>
	 <h4>Weight:</h4> <?php echo htmlspecialchars($row ['weight']); ?><br><br>
	 <h4>Dimension:</h4> <?php echo htmlspecialchars($row ['dimension']); ?><br><br>
	 <h4>Scale of damage:</h4> <?php echo htmlspecialchars($row ['damage']); ?><br><br>
	 <h4>Place of origin:</h4> <?php echo htmlspecialchars($row ['origin_place']); ?><br><br>
	 <h4>Storage location:</h4> <?php echo htmlspecialchars($row ['storage']); ?><br><br>
	 <h4>Location:</h4> <?php echo htmlspecialchars($row ['location']); ?><br><br>
	 <h4>Original or copy:</h4> <?php echo htmlspecialchars($row ['authentic']); ?><br><br>
	 <h4>Restoration work:</h4> <?php echo htmlspecialchars($row ['restoration']); ?><br><br>
	 <h4>Deliverer:</h4> <?php echo htmlspecialchars($row ['deliverer']); ?><br><br>
	 <h4>Possessor:</h4> <?php echo htmlspecialchars($row ['possessor']); ?><br><br>
	 <h4>Owner:</h4> <?php echo htmlspecialchars($row ['owner']); ?><br><br>
	

	<div style="border: 1px solid; border-color: #5385C1; padding: 8px; background-color: #F9F9F9;">
	<br>
	<h2>Insert changes</h2>
	<form method='post' action='' id='mod'>
	<?php echo "<input type='text' style='display:none;' name='codice_mod' value='$codice_originale'>"; ?>
	Inserisci il nome: <br>
	<input name='nome_mod' value="<?php echo $row ['nome']; ?>" required><br><br>
	Scrivi descrizione breve: <br>
	<input type="text" name='d_short_mod' required value="<?php echo $row ['d_short']; ?> "><br><br>
	Scrivi descrizione estesa: <br>
	
	<textarea id="d_estesa_mod" form="mod" name="d_estesa_mod"><?php echo htmlspecialchars($row ['d_estesa']); ?> </textarea> <br><br>

	Insert category: <br>
	<input name='category_mod' value="<?php echo $row ['category']; ?>" required><br><br>
	Insert type: <br>
	<input name='type_mod' value="<?php echo $row ['type']; ?>" required><br><br>
	Insert material: <br>
	<input name='material_mod' value="<?php echo $row ['material']; ?>" required><br><br>
	Insert weight: <br>
	<input name='weight_mod' value="<?php echo $row ['weight']; ?>" required><br><br>
	Insert dimension: <br>
	<input name='dimension_mod' value="<?php echo $row ['dimension']; ?>" required><br><br>
	Insert Scale of damage: <br>
	<input name='damage_mod' value="<?php echo $row ['damage']; ?>" required><br><br>
	Insert origin place: <br>
	<input name='origin_mod' value="<?php echo $row ['origin_place']; ?>" required><br><br>
	Insert storage location: <br>
	<input name='storage_mod' value="<?php echo $row ['storage']; ?>" required><br><br>
	Insert location: <br>
	<input name='location_mod' value="<?php echo $row ['location']; ?>" required><br><br>
	Insert Original or Copy: <br>
	<input name='authentic_mod' value="<?php echo $row ['authentic']; ?>" required><br><br>
	
	<textarea id="restoration_mod" form="mod" name="restoration_mod"><?php echo htmlspecialchars($row ['restoration']); ?> </textarea> <br><br>
	Insert deliverer: <br>
	<input name='deliverer_mod' value="<?php echo $row ['deliverer']; ?>" required><br><br>
	Insert Possessor: <br>
	<input name='possessor_mod' value="<?php echo $row ['possessor']; ?>" required><br><br>
	Insert owner: <br>
	<input name='owner_mod' value="<?php echo $row ['owner']; ?>" required><br><br>
	<input name='inv_mod' type='submit' value='Invia Modifica'>
	</form>


<?php

}

$codice_modifica = '';
$nome_modifica = '';
$short_modifica = '';
$estesa_modifica = '';
$category_mod = '';
$type_mod = '';
$material_mod = '';
$weight_mod = '';
$dimension_mod = '';
$damage_mod = '';
$origin_mod = '';
$storage_mod = '';
$location_mod = '';
$authentic_mod = '';
$restoration_mod = '';
$deliverer_mod = '';
$possessor_mod = '';
$owner_mod = '';



if (isset ( $_POST ['inv_mod'] )) {
	
	$codice_modifica = $_POST['codice_mod'];
	
	$nome_modifica = $_POST ['nome_mod'];
	
	$short_modifica = $_POST ['d_short_mod'];
	
	$estesa_modifica = $_POST ['d_estesa_mod'];


$category_mod = $_POST['category_mod'];
$type_mod = $_POST['type_mod'];
$material_mod = $_POST['material_mod'];
$weight_mod = $_POST['weight_mod'];
$dimension_mod = $_POST['dimension_mod'];
$damage_mod = $_POST['damage_mod'];
$origin_mod = $_POST['origin_mod'];
$storage_mod = $_POST['storage_mod'];
$location_mod = $_POST['location_mod'];
$authentic_mod = $_POST['authentic_mod'];
$restoration_mod = $_POST['restoration_mod'];
$deliverer_mod = $_POST['deliverer_mod'];
$possessor_mod = $_POST['possessor_mod'];
$owner_mod = $_POST['owner_mod'];
	
	$queryResult = $_db->UpdateOpera( $codice_modifica, $nome_modifica, $short_modifica, $estesa_modifica, $category_mod, $type_mod, $material_mod, $weight_mod, $dimension_mod, $damage_mod, $origin_mod, $storage_mod, $location_mod, $authentic_mod, $restoration_mod, $deliverer_mod, $possessor_mod, $owner_mod );
	
	if ($queryResult == TRUE) {
		header ( 'Location: http://idsmuseum.000webhostapp.com/museodurazzo/opere/alter.php' );
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