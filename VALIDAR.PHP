<?php
	session_start();
	if(isset($_POST['Entrar'])){
		$usuario = $_POST['txtuser'];
		$password = $_POST['txtpassword'];
		include ("conexion.php");

		$miSelect = "SELECT * from usuario where usuario = '$usuario' and pasword = '$password'";

		$resultados = mysqli_query($conexion,$miSelect);

		//$row = mysqli_fetch_array($resultados);
		
		if($usuario = mysqli_fetch_assoc($resultados)){
			//session_start();

			header("location: menuUsuario.html");
		}
		else{
			echo "datos incorrectos";
		}
	}
?>