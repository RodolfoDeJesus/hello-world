<?php  
session_start();
if (isset($_POST['bien'])) {
	 $con = mysqli_connect('localhost','root','','basesalubridad') or die("problemas al conectar con la base de datos");
	 echo "Connected successfully"; 
	 $sql ="INSERT INTO factura (nombreEmisor,fecha,nombreFactura,monto)VALUES('$_POST[emisor]','$_POST[fecha]','$_POST[factura]','$_POST[monto]')";

echo "<br><br>";
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";



    $last_id = $con->insert_id;


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
}else{
    echo "error al principio";
    }

if (isset($_POST['bien'])) {
	 $con = mysqli_connect('localhost','root','','basesalubridad') or die("problemas al conectar con la base de datos");
     echo "Connected successfully"; 
     $fac=$_POST['factura'];
     //$id= "SELECT idFactura FROM factura WHERE nombreFactura=$fac";
     

    $sql2 ="INSERT INTO  bienes (idFactura,nombreBien,caracteristicas,estatus,costo,cantidad,financiamiento,marca,modelo,serie)VALUES('$last_id','$_POST[biens]','$_POST[caracteristicas]','$_POST[estado]','$_POST[costo]','$_POST[cantidad]','$_POST[recurso]','$_POST[marca]','$_POST[modelo]','$_POST[serie]')";

if (mysqli_query($con, $sql2)) {
    echo "New record created successfully";

} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
}

mysqli_close($con);
}else{
    echo "error al principio";
    } 

?>
