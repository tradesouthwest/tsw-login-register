<?php 
// enter your database host, name, username, and password
$db_host = 'localhost';
$db_name = 'xxxxxxxxxx';
$db_user = 'xxxxxxxxxx';
$db_pass = 'xxxxxxxxxx';

// connect with pdo 
try {
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name;", $db_user, $db_pass);
}
catch(PDOException $e) {
	die('pdo connection error: ' . $e->getMessage());
}
