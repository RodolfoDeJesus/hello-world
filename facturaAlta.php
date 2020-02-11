<?php
  $mysqli = new mysqli('localhost', 'root', '', 'basesalubridad');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta de Bienes</title>
	<link rel="stylesheet" type="text/css" href="css/interface1Estilo.css" media="">
	<link rel="icon" href="picture/logo_S.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script>
    function ordenarSelect(id_componente)
    {
      var selectToSort = jQuery('#' + id_componente);
      var optionActual = selectToSort.val();
      selectToSort.html(selectToSort.children('option').sort(function (a, b) {
        return a.text === b.text ? 0 : a.text < b.text ? -1 : 1;
      })).val(optionActual);
    }
    $(document).ready(function () {
      ordenarSelect('bieni');
    });
  </script>
</head>
<body>
	<main>
        <div class="content-all">
		<header>
		<img src="picture/logo_S.png" width="200">
		<h2>Direccion de Protección Contra Riesgos Sanitarios</h2>
    	<h3>Secretaría de Salud</h3>
		</header>

		
		<form action="altaFactura.php" method="POST">
			
			<label>Nombre del emisor:</label>
			<input type="text" name="emisor" name="emisor"style="width:400px;height:30px"  required="">
			<label>Fecha: </label>
			<input type="date" name="fecha" style="height:30px;width:400px"name="fecha" required=""><br><br>
			<label>Numero de factura: </label>
			<input type="text" name="factura" style="height:30px"name="factura" required="">
			<label>Monto total: </label>
			<input type="number" name="monto"step="any" style="height:30px"name="monto" required="">
			<br>
			<hr style="color: #0056b2;">
			<label>Bien informático:</label>
			<input type=text list=bieni style="height: 30px" name="biens">
			<datalist readonly=»readonly» id="bieni" style="height: 30px">
			<?php
          $query = $mysqli -> query ("SELECT * FROM bienes");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[nombreBien].'">'.$valores[nombreBien].'</option>';
          }
        ?>
			</datalist>
			
</div>


 <!--<input name="bien"type="text"readonly=»readonly» id="txtReceptor" />--->
			<br>
			<div >
			<label style="position:relative">Descripción: </label><br>
			<textarea style="position:relative"name="caracteristicas"required="" cols="75" maxlength="600" rows="10"></textarea>
			
			<label style="position:relative">Estado:</label>
			<select style="height:30px;position:relative"name="estado">
				<option value="Bueno">Bueno</option>
				<option value="Regular">Regular</option>
				<option value="Malo">Malo</option>
			</select>
			
			<label style="position:relative">Costo</label>
			<input type="number"step="any" required="" style="height:30px;position:relative"name="costo" min="0">
			
			<label>Cantidad</label>
			<input type="number" required="" style="height:30px"name="cantidad" min="1">
			<br><br>
			</div>
			<label>Financiamiento de recurso.</label><br>
			<input type="radio" name="recurso" value="Federal"><n3>Federal </n3>
			<input type="radio" name="recurso" value="Estatal"><n3>Estatal </n3>
			<br><br>
			<label>Marca: </label><input type="text" required="" style="height:30px"name="marca"placeholder="Introduzca  una Marca"><br><br>
			<label>Modelo: </label><input type="text"  required=""style="height:30px"name="modelo" placeholder="Introduzca un Modelo"><br><br>
			<label>No° de Serie: </label><input type="text" required="" style="height:30px"name="serie" placeholder="Introduzca un No° de Serie"><br><br>

			<button name="bien">Agregar bien</button>
			
			<button name="factura">Cerrar factura</button>
		</form>
	
	
 </div>
    </main>

</body>
<script>
	function btagrega(){
		var texto=document.getElementById("agregabien").value;
		document.getElementById("browsers").value=texto;
	} 
</script>
<?php  ?>
</html>