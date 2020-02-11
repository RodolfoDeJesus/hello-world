<?php
session_start();
if(isset($_POST['registro'])){
   $con = mysqli_connect('localhost','root','','basesalubridad') or die("problemas al conectar con la base de datos");
   

echo "Connected successfully";  
$activo="activo";
$sql ="INSERT INTO usuario (nombre,apellido,usuario,pasword,correo,telefono) 
VALUES('$_POST[nom]','$_POST[ape]','$_POST[user]','$_POST[pass]','$_POST[correo]','$_POST[tel]')";

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
		
		window.location.replace("index.html");
		</script>';
?>