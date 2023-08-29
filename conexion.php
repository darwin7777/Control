<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "control";



$conn = new mysqli($servername, $username, $password, $database);
	
	if($conn->connect_errno)
	{
		echo "No hay conexión: (" . $conn->connect_errno . ") " . $conn->connect_error;
	}
?>
