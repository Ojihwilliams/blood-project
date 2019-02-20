<?php

$dsn 	= "mysql:host=localhost; dbname=blood";
$user 	= 'root';
$pass 	= '';

try {
	$pdo = new pdo($dsn, $user, $pass);
} catch (Exception $e) {
	echo 'Connection error! ' .$e->getMessage();
	
}