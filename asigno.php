<?php 

$con=mysqli_connect('localhost','root','','basesalubridad') or die("problemas al conectar con la base de datos");;
$depa=$_POST['depa'];

	$sql="SELECT idDepartamento, nombrePersonal, idPersonal
		from personal 
		where idDepartamento='$depa'";

	$result=mysqli_query($con,$sql);

	$cadena="<label>Selecciona personal: </label> 
			<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[2].'>'.utf8_encode($ver[1]).'</option>';
	}
	echo  $cadena."</select>";
	/*
	session_start();
	if(isset($_POST['asignar'])){
		$idbien= "SELECT idProducto from bienes WHERE nombreBien == $_POST[bien]";

		$sql ="INSERT INTO resguardo (idPersonal,idBien) 
		VALUES('$_POST[lista2]',$idbien)";
		
		if (mysqli_query($con, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);
		}else{
			echo "error";
		}
	*/
?>