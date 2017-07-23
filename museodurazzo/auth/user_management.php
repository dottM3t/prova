<!DOCTYPE html>
<html>
<head>
	<title>User Managment</title>
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
						<a href="../auth/opere.php">Opere</a>
						<a href=""><?php include '../auth/verified_session.php'; ?></a>

					<a href="elements.html"></a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
	<section id="one" class="wrapper">
		<div class="inner">

			<?php

	require '../auth/db_connect.php';
		if($user['privileges']!=NULL && $user['privileges'] < 1 ){
			
		}

			else{ 	
					header('Location: ../auth/access_denied.php');
					;}

	?>
<?php
ob_start ();


include '../opere/database/DBQuery.php';
$_db = new DBQuery();

$result = $_db->SelectUser();

?>
<h2 class="align-center"> Edit or apply Privileges</h2>

<div class="table-wrapper">
<table class="alt">
	<thead>
		<th>#</th>
		<th>Username</th>
		<th>Privileges</th>
	</thead>
		<form name="form1" method="post" action="user_management_post.php">


<?php

while ( $row = mysqli_fetch_array ( $result ) ) {
	?>

					<tr>
						<td><input name="checkbox"
							type="checkbox" value="<?php echo htmlspecialchars($row['id']); ?>"></td>
						<td><?php echo htmlspecialchars($row['username']); ?></td>
						<td><?php if ($row['privileges'] == 0) {
        							echo "Administrator";
        						}
        						  if ($row['privileges'] == 1){
      								echo "Operator";
      									}
    							    else{
								}?> </td></tr>


<?php
}
?>
			</td>
	</tr>
</table>
	<input style="float: right;" name="Alter" type="submit" value="Edit">
</form>

</div></div></section>
</body>
	<!-- Script js per navbar -->
			<script src="../webApp/assets/js/jquery.min.js"></script>
			<script src="../webApp/assets/js/skel.min.js"></script>
			<script src="../webApp/assets/js/util.js"></script>
			<script src="../webApp/assets/js/main.js"></script>
</html>