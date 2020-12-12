<?php
function doConnect() { 
	$user = 'root'; 
	$pass = 'maithi';  
	$dsn = 'mysql:host=localhost;dbname=Ligues'; 
	try{
		$dbh= new PDO($dsn, $user, $pass); 
		return $dbh;
	} catch (PDOException $e){ 
		print "Erreur ! :" . $e->getMessage() . "<br/>"; 
		die(); 
	}
	return null;
}
?>