<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$baseDB = "basesalubridad";

	$conexion = mysqli_connect($host,$user,$pass,$baseDB);

	if(mysqli_connect_errno()){
		printf("Conexion Fallida %s\n", mysqli_connect_error());
	}

	mysqli_set_charset($conexion, "utf-8");
?>