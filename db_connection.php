<?php
$dsn = 'mysql:host=sql2.njit.edu;dbname=mp657';
 $username='mp657';
 $password='CX0X54BbM';
try {
	$db = new PDO($dsn, $username, $password);
}catch(PDOException $e){
	$error_message = $e->getMessage();
	exit();
}
?>