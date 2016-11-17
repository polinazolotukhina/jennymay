<?php

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname  = "forms1";
	$table = "users";

	//Creating connection for mysql
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);











	include_once 'class.user.php';
	$user = new USER($conn);

?>