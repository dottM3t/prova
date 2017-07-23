<!DOCTYPE html>
<html>
<head>
	<title>Login Below</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../../webApp/assets/css/main.css" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
				<a href="edit_multimedia.php" class="logo">&larr;</a>
					<nav id="nav">
						<a href="../webApp/index.php">Home</a>
						<a href="../auth/opere.php">Opere</a>
							<a href=""><?php include '../../auth/verified_session.php'; ?></a>
					<a href="elements.html"></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
			
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
$res = '';
$codice_originale = '';
$_db = new DBQuery();

if (isset ( $_POST ['edit_image'] )) {
	$row [] = null;
	if(!isset($_POST ['checkbox'])){
		trigger_error("<script type='text/javascript'>alert('Devi selezionare un\'opera da modificare');location.replace('edit_multimedia.php')</script>", E_USER_ERROR);

	}
	$checkbox [] = $_POST ['checkbox'];
	for($i = 0; $i < count ( $checkbox ); $i ++) {
		$codice_originale = $checkbox [$i];
	}
}
$res = $_db->SelectImagePath($codice_originale);
while ( $row = mysqli_fetch_array ( $res ) ) {
	?>

<section calss="one" class="wrapper">
	<div class="inner">

	 <h4>Codice opera:</h4><?php echo htmlspecialchars($codice_originale); ?><br><br>
	 <h4>Nome: </h4><?php echo htmlspecialchars($row ['nome']); ?><br><br>
	 <h4>Immagine:</h4> <?php echo htmlspecialchars($row ['img']); ?><br><br>
	<div>
	<h2>Inserisci le modifiche</h2>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type='text' style="display:none;" name="codice_mod" value="<?php echo $codice_originale; ?>">
		<input type="file" name="editFile" title="Scegli file" required/>
		<input type="submit" value="Upload File" name="edit_file" />
	</form>
	</div>


<?php

}


if (isset ( $_POST ['edit_file'] )) {
	
	edit_Image($_POST['codice_mod']);
}
	
	function edit_Image($id){
		
	$selectimagepath = new DBQuery();
	$result=$selectimagepath->SelectImagePath($id);
	$image_path='';
		while($row=mysqli_fetch_array($result)){
		
		$image_path=$row['img'];
	}
	
	$selectimagepath->getMysqli()->closeConnection();
	
	if($image_path==null){
		trigger_error("<script type='text/javascript'>alert('Non sono presenti file immagine da modificare');location.replace('erase_multimedia.php')</script>')", E_USER_ERROR);
	}else{	
		unlink($image_path);
	
		$dir='uploads/';
		$image_path=$dir.basename($_FILES['editFile']['name']);

		uploadFile();
	
		$updateimagepath = new DBQuery();
		$updateimagepath->UpdateImagePath('img',$image_path,$id);
	}	
	if($updateimagepath){?>
	<script type='text/javascript'>alert('Modifica effettuata');location.replace('edit_multimedia.php')</script>
<?php
	}
	$updateimagepath->getMysqli()->closeConnection();
		
	
	
	
}

	function uploadFile(){
		
		if(isset($_POST['edit_file']) && $_POST['edit_file']=='Upload File'){
	
			$dir='uploads/';
			$image_path=$dir.basename($_FILES['editFile']['name']);
			$allowed_ext = array('png','jpeg','jpg','JPEG','PNG','JPG');
	
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($_FILES['editFile']['size'] > 20971520) {
					trigger_error("<script type='text/javascript'>alert('dimensione massima consentita 20 mb');location.replace('edit_multimedia.php')</script>", E_USER_ERROR);
				}
				
			if (!in_array(file_extension($image_path), $allowed_ext)) {
				trigger_error("<script type='text/javascript'>alert('Il file ha un\'estensione non ammessa');location.replace('edit_multimedia.php')</script>", E_USER_ERROR);
			}
		
				if(move_uploaded_file($_FILES['editFile']['tmp_name'], $image_path)){
		
					
					header ( 'Refresh:3; http://idsmuseum.000webhostapp.com/museodurazzo/opere/audio/edit_multimedia.php' );
						
					
				}
			}	

					
		}
	}
	
	function file_extension($filename) {
		$ext = explode('.', $filename);
		return $ext[count($ext)-1];  
	}

?>
			</body>
	<!-- Script js per navbar -->
			<script src="../../webApp/assets/js/jquery.min.js"></script>
			<script src="../../webApp/assets/js/skel.min.js"></script>
			<script src="../../webApp/assets/js/util.js"></script>
			<script src="../../webApp/assets/js/main.js"></script>
</html>