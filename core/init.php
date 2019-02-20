<?php
	include 'database/connection.php';
	include 'classes/main.php';
	include 'classes/admin.php';
	
	global $pdo;

	session_start();
	$main 		= new Main($pdo);
	$admin 		= new Admin($pdo);
	
	define("BASE_URL", "http://localhost/blood/");




?>