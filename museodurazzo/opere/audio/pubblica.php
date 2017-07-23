<!DOCTYPE html>
<html>
<head>
	<title>Pubblica</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../../webApp/assets/css/main.css" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="../crud_opera.php" class="logo">&larr;</a>
					<nav id="nav">
						<a href="../../webApp/index.php">Home</a>
						<a href="../../auth/opere.php">Opere</a>
						<a href=""><?php include '../../auth/verified_session.php'; ?></a>

					<a href="elements.html"></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
	<section id="one" class="wrapper">
		<div class="inner">

			<?php

	require '../../auth/db_connect.php';
		if($user['privileges']!=NULL && $user['privileges'] < 2 ){
			
		}

			else{ 	
					header('Location: ../../auth/access_denied.php');
					}

	?>
<?php
ob_start ();


include '../database/DBQuery.php';
$_db = new DBQuery();

$result = $_db->SelectAll();

?>
<h2 class="align-center"> Pubblica Opera</h2>

<div class="table-wrapper">
<table class="alt">
	<thead>
		<th>#</th>
		<th>Codice Opera</th>
		<th>Nome</th>
		<th>Flag</th>
	</thead>
		<form name="form1" method="post" action="">


<?php

while ( $row = $result->fetch_array () ) {
	?>

					<tr>
						<td><input name="checkbox"
							type="checkbox" value="<?php echo $row['codice_interno']; ?>"></td>
						<td><?php echo $row['codice_interno']; ?></td>
						<td><?php echo $row['nome']; ?></td>
						<td><?php echo $row['flag']; ?></td>
					</tr>


<?php
}
?>
			</td>
	</tr>
</table>
	<input style="float: right;" name="publi" type="submit" value="Publish">
	<div style ="float:right;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
	<input style="float: right;" name="hide" type="submit" value="Hide Opera">
	<?php


	
// Check if delete button active, start this
require_once '../database/DBQuery.php';
include 'qrcode.php'; 

 function publish($id){
	$updateflag = new DBQuery();
	$result=$updateflag->UpdateFlag($id);
	$url='';
	if($result){
		?>
		<strong>Publicated</strong>
		<?php
		header('Location: pubblica.php');
		header('Refresh:0');
		$pagina = '/museodurazzo/auth/opera.php?id='.$id.'';
		$url= 'https://idsmuseum.000webhostapp.com' . $pagina;
	}
	return $url;
}
	?>

<?php
	function hide($id){
		$updateflag = new DBQuery();
		$updateflag->HideFlag($id);

	}

if (isset ( $_POST ['publi'] )) {
	$checkbox [] = $_POST ['checkbox'];
	
	
	for($i = 0; $i < count ( $checkbox ); $i ++) {
		$id = $checkbox [$i];
		$url=publish($id);
		$qrcode = new QRCODE();
		$qrcode->TEXT($url);
		$qrcodepath='qr_code/qrcode_'.$id.'.png';
		$qrcode->QRCODE(400,$qrcodepath);
		
		$updateqrcode = new DBQuery();
		$updateqrcode->UpdateQRCodePath($qrcodepath,$id);
		
		header ( 'Refresh:3' );
		
	}
}

if (isset ( $_POST ['hide'] )) {
	$checkbox [] = $_POST ['checkbox'];
	
	
	for($i = 0; $i < count ( $checkbox ); $i ++) {
		$id = $checkbox [$i];
		hide($id);	
		header ( 'Refresh:0' );
		
	}
}


?>
</form>

</div></div></section>
</body>
	<!-- Script js per navbar -->
			<script src="../../webApp/assets/js/jquery.min.js"></script>
			<script src="../../webApp/assets/js/skel.min.js"></script>
			<script src="../../webApp/assets/js/util.js"></script>
			<script src="../../webApp/assets/js/main.js"></script>
</html>