<?php
	$conn = new mysqli('localhost', 'root', '12345678', 'biblioteca') or die(mysqli_error());
	if(!$conn){
		die("Error fatal: error de conexión!");
	}