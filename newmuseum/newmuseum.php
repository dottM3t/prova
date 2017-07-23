<?php

	require '../museodurazzo/auth/db_connect.php';
	
	if($user['privileges']!=NULL && $user['privileges'] < 1 ){
	
		include '../museodurazzo//opere/database/DBQuery.php';

		newMuseum();
		echo "<script type=\"text/javascript\">window.alert('New Museum succesfully created. Now you have to create manually an admin user with your host phpmyadmin panel.');
		window.location.href = '../webApp/index.php';</script>"; 
?>

