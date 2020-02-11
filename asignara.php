<?php 

session_start();
	if(isset($_POST['asignar'])){
        $con=mysqli_connect('localhost','root','','basesalubridad') or die("problemas al conectar con la base de datos");

		

		$sql ="INSERT INTO resguardo (idPersonal,idProducto) 
		VALUES('$_POST[lista2]','$_POST[bien]')";
		
		if (mysqli_query($con, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
		}else{
			echo "error";
		}
	
?>