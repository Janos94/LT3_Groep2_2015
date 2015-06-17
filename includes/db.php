<?php 
	// Database connectie met localhost
	$dbhost = "localhost"; 
	$dbuser = "lt3"; 
	$dbpass = "supermanisgay!"; 
	$dbname = "superdesk"; 
	$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	// Test of de verbinding werkt! 
	if (mysqli_connect_errno()) {
		die("De verbinding met de database is mislukt: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
		);
	} 
?>