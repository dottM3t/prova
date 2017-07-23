<?php
////////////////////////////////////////////
$id=$_GET['id'];        // Collecting data from query string
if(!is_numeric($id)){ // Checking data it is a number or not

trigger_error("<script type='text/javascript'>alert('Errore nei dati');location.replace('opere.php')</script>')", E_USER_ERROR);
		

}


require '../opere/database/DBAccess.php';

function file_extension($filename) {
  $ext = explode('.', $filename);
  return $ext[count($ext)-1];  
}

	$conn = new DBAccess();
	
$count= 'SELECT *  FROM opere_arte where codice_interno=?';

if($stmt = mysqli_prepare($conn->getConnection(), 'SELECT * FROM opere_arte WHERE codice_interno=?')){
  $stmt->bind_param('i',$id);
  $stmt->execute();

   $result = $stmt->get_result();

   $row=$result->fetch_object();
?>



<!DOCTYPE html>
<html>
<head>
	<title>Opera</title>
	<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../webApp/assets/css/main.css" />
<link rel="icon" href="https://idsmuseum.000webhostapp.com/museodurazzo/webApp/favicon.ico" />
</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="opere.php?page=0" class="logo">&larr;</a>
					<nav id="nav">
						<a href="../webApp/index.php">Home</a>
						<a href="opere.php">Opere</a>
						<a href=""><?php include 'verified_session.php'; ?></a>
						<a href=""></a>
					<a href="elements.html"></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

<section id="main" class="wrapper">
	<div class="inner">

				<header class="align-center">
					<h2><?php echo $row->nome; ?></h2>
					<p><?php echo $row->d_short; ?></p>
				</header>
				<h3 id="content">Descrizione</h3>
				<p>
					<?php echo $row->d_estesa; ?>
				</p>

		<div class="image fit opere">
		   <img src="../opere/audio/<?php echo $row->img; ?>" alt="Foto">
		  </div>

			<footer>
			
			<h3>Category:</h3><p><?php echo $row->category; ?></p>
			<h3>Type:</h3><p><?php echo $row->type; ?></p>
			<h3>Material:</h3><p><?php echo $row->material; ?></p>
			<h3>Weight:</h3><p><?php echo $row->weight; ?></p>
			<h3>Dimension:</h3><p><?php echo $row->dimension; ?></p>
			<h3>Scale of Damage:</h3><p><?php echo $row->damage; ?></p>
			<h3>Origin Place:</h3><p><?php echo $row->origin_place; ?></p>
			<h3>Storage Location:</h3><p><?php echo $row->storage; ?></p>
			<h3>Location:</h3><p><?php echo $row->location; ?></p>
			<h3>Original or copy (write one of the word):</h3><p><?php echo $row->authentic; ?></p>
			<h3>Restoration work:</h3><p><?php echo $row->restoration; ?></p>
			<h3>Deliverer:</h3><p><?php echo $row->deliverer; ?></p>
			<h3>Possessor:</h3><p><?php echo $row->possessor; ?></p>
			<h3>Owner:</h3><p><?php echo $row->owner; ?></p>
	<h3>File multimediale</h3>
			<?php 
			
			$ext = file_extension($row->audio);
			if($ext == 'mp3'){ ?>
			<audio controls><source src="../opere/audio/<?php echo $row->audio; ?>" type="audio/mpeg"></audio><?php }else if($ext == 'mp4'){ ?>

			<video width="320" height="240" controls><source src="../opere/audio/<?php echo $row->audio; ?>" type="video/mp4"></video>
			 <?php } 
			else{ ?> 
				<p>Nessun file multimediale presente</p>
			<?php } ?>
			</footer>


		</div>
		<?php }else{
}

?>
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