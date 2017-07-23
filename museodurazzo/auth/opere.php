<!DOCTYPE html>
<html>
<head>
	<title>Opere</title>
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
						<a href=""><?php include 'verified_session.php'; ?></a>
						<a href=""></a>
					<a href="elements.html"></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

<?php

	require 'db_connect.php';

			if($user['privileges']!=NULL && $user['privileges'] < 2 ){
				?>
			<br><br>
		<?php
		?>
<div>
	
	<h3><a class="button special" href="../opere/crud_opera.php">Gestisci opere</a></h3>
	</div>


<!-- se sei loggato mostrami tutte le opere anche non pubblicate -->
	
<section id="one" class="wrapper">
	<div class="inner">
		<div class="flex flex-3">

<?php

	require '../opere/database/DBAccess.php';

	$conn = new DBAccess();

		$per_page=6;
		$request= 'SELECT count(codice_interno) FROM opere_arte';
		$q1=mysqli_query($conn->getConnection(), $request);
 		$row = mysqli_fetch_array($q1, MYSQLI_NUM );

 		$rec_count = $row[0];
 		
         if(isset($_GET['page'])) {
            $page = $_GET['page'] + 1;
            $offset = ($page-1) * $per_page;
         }else {
            $page = 1;
            $offset = 0;
         }
         $total_pages = ceil($rec_count/$per_page);
		
		$query= sprintf("SELECT * FROM opere_arte LIMIT $offset, $per_page", mysqli_real_escape_string($conn->getConnection(),$offset), mysqli_real_escape_string($conn->getConnection(), $per_page));


   	if($stmt = mysqli_query($conn->getConnection(), $query)){


while ($nt = $stmt->fetch_assoc()) {

	?>
	<article>
			<header>
					<h2><?php echo $nt['nome'];?></h2>
			</header>
				  <p>
					<?php echo $nt['d_short'] ?>
				  </p>
				    <div class="image fit opere">
				  	<img src="../opere/audio/<?php echo $nt['img'];?>" alt="">
				  </div> 
				  <?php if($nt['flag']==0){ ?><br><strong>Non pubblicata</strong><br>
					<?php } else{} ?>
				<footer>
					<a class="button special" href="opera.php?id=<?php echo $nt['codice_interno'] ?>">Vedi Opera</a>
			</footer>
	<br><br>
	</article>


		<?php } ?>
		</div>
</div>
</section>
<div class="inner" style="padding-bottom: 50px;" align="center">
<?php } ?>


	<a class="button small special" href="opere.php?page=0"><</a>
	<?php
		   
            for ($i=0; $i<$total_pages; $i++) {  ?>
            <a class="button small special" href="opere.php?page=<?php echo $i; ?>"><?php echo ($i+1);?></a>
						<?php } ?>
	<a class="button small special" href="opere.php?page=<?php echo ($total_pages-1); ?>">></a>
<?php
         
      }

		else{
	 ?>
</div>

<section id="one" class="wrapper">
	<div class="inner">
		<div class="flex flex-3">

	<?php

		require '../opere/database/DBAccess.php';

	$conn = new DBAccess();

		$per_page=6;
		$request= 'SELECT count(codice_interno) FROM opere_arte WHERE flag=1';
		$q1=mysqli_query($conn->getConnection(), $request);
 		$row = mysqli_fetch_array($q1, MYSQLI_NUM );

 		$rec_count = $row[0];
 		
         if(isset($_GET['page'])) {
            $page = $_GET['page'] + 1;
            $offset = ($page-1) * $per_page;
         }else {
            $page = 1;
            $offset = 0;
         }
         $total_pages = ceil($rec_count/$per_page);
		
		$query=sprintf("SELECT * FROM opere_arte WHERE flag=1 LIMIT $offset, $per_page", mysqli_real_escape_string($conn->getConnection(), $offset), mysqli_real_escape_string($conn->getConnection(), $per_page));

   	if($stmt = mysqli_query($conn->getConnection(), $query)){


while ($nt = $stmt->fetch_assoc()) {

	?>

		<article>
			<header>
					<h2><?php echo $nt['nome'];?></h2>
			</header>
				  <p>
					<?php echo $nt['d_short'] ?>
				  </p>
				    <div class="image fit opere">
				  	<img src="../opere/audio/<?php echo $nt['img'];?>" alt="">
				  </div> 

				<footer>
					<a class="button special" href="opera.php?id=<?php echo $nt['codice_interno'] ?>">Vedi Opera</a>
			</footer>
	<br><br>
	</article>

	
<?php }} ?>
</div>
			<?php if(!empty($message)): ?>
	<p><?= $message ?></p>
<?php endif; ?>
	</div>

</section>
<div class="inner" style="padding-bottom: 50px;" align="center">
	<a class="button small special" href="opere.php?page=0"><</a>
	<?php
		   
            for ($i=0; $i<$total_pages; $i++) {  ?>
            <a class="button small special" href="opere.php?page=<?php echo $i; ?>"><?php echo ($i+1);?></a>
						<?php } ?>
	<a class="button small special" href="opere.php?page=<?php echo ($total_pages-1); ?>">></a>
</div>
<?php } ?>
</body>
	<!-- Script js per navbar -->
			<script src="../webApp/assets/js/jquery.min.js"></script>
			<script src="../webApp/assets/js/skel.min.js"></script>
			<script src="../webApp/assets/js/util.js"></script>
			<script src="../webApp/assets/js/main.js"></script>

</html>