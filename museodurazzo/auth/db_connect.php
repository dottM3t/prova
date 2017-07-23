<?php
$server = 'localhost';
$username = 'id2234012_admin';
$password = 'admin';
$db = 'id2234012_db_durazzo';

	try{
		$conn = new PDO("mysql:host=$server;dbname=$db;", $username, $password);

	} catch(PDOException $e){
		trigger_error("<script type='text/javascript'>alert('Connection failed: ".$e->getMessage()."');location.replace('index.php')</script>')", E_USER_ERROR);
		}

?>