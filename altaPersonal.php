<?php
session_start();
if(isset($_POST['registro'])){
   $con = mysqli_connect('localhost','root','','basesalubridad') or die("problemas al conectar con la base de datos");
   

echo "Connected successfully";  
$activo="activo";
$sql ="INSERT INTO personal (nombrePersonal,puesto,idDepartamento,estatus) VALUES('$_POST[nombre]','$_POST[puesto]','$_POST[departamento]','$activo')";

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
}else{
    echo "error";
}
echo '<script>
		
		window.location.replace("menuUsuario.html");
		</script>';
?>