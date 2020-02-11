<?php
  $mysqli = new mysqli('localhost', 'root', '', 'basesalubridad');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
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
      ordenarSelect('Departamento');
    });
  </script>
    <title>Document</title>
</head>
<body>
  <form action="asignara.php"method="POST">
  <label>Selecciona el bien:</label>
  <select name="bien" id=""style="height: 30px;width:400px">
  <?php
          $query = $mysqli -> query ("SELECT * FROM bienes");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idProducto].'">'.$valores[nombreBien]." - ".$valores[serie].'</option>';
          }
        ?>
  </select><br>
    <label>Selecciona el departamento del personal:</label>
    <select id="Departamento"class="campos" style="height: 35px;width:200px"name="departamento">
        <option disabled="disabled" selected="selected">.Selecciona un Departamento.</option>
        <option value="4">Coordinación Informática</option>
        <option value="3">Coordinación Administrativa</option>
        <option value="2">Secretaría Técnica</option>
        <option value="1">Secretaría Particular</option>
        <option value="7">Coordinación de Emergencias</option>
        <option value="6">Enlace Federal</option>
        <option value="5">Asesor Jurídico</option>
    </select><br>
    <div id="select2"></div>
    <button name="asignar">Asignar</button>
    </form>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		//$('#lista1').val(1);
		recargarLista();

		$('#Departamento').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"asigno.php",
			data:"depa=" + $('#Departamento').val(),
			success:function(r){
				$('#select2').html(r);
			}
		});
	}
</script>