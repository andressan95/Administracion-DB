<!DOCTYPE html>
<html>
<head>
	<title>Distribucion de Datos</title>
	<link href="publico/css/dom.css" rel="stylesheet">
	<script src="publico/js/jquery.js"></script>
	<script src="publico/js/myjava.js"></script>
	
	<script>
	$(document).ready(function(){			
		$(".enlaceajax").on("click", function(e){
			e.preventDefault();
			$("#contenido").load("traertablas.php");
		});
	});
	$(".f1").on("submit", function(e){
	e.preventDefault();
		$.post("traertablas.php", $(this).serialize(), function(respuesta){
			$("#contenido").html(respuesta);
		});
		});
	</script>

</head>
<body>
	<section>
		<h2>Distribucion de Datos</h2>
		<h3>Ejemplo: Edicion de Usuarios</h3>
		<form id="formUsuarios" formType="registrar">
			<label>Codigo: </label>
			<input type="text" name="codigo" maxlength="8" required>
			<br><br>
			<label>Nombres: </label>
			<input type="text" name="nombres" maxlength="50" required>
			<br><br>
			<label>Apellidos: </label>
			<input type="text" name="apellidos" maxlength="50" required>
			<br><br>
			<label>Fecha de Nacimiento: </label>
			<input type="date" name="nacimiento" required>
			<br><br>
			<label>Sexo: </label>
			<select name="sexo" required>
				<option value="M">Masculino</option>
				<option value="F">Femenino</option>
			</select>
			<br><br>
			<input type="submit" value="Guardar">

			<input type="button" value="consultar" id="btnconsultar" name="consulta">
		</form>
	</section>
<section>
<form id="formConsulta" formType="consultar">
	
	<?php  
//tomamos los datos del archivo conexion.php  
include("conexion.php");  
$link = Conectarse();  
//se envia la consulta  
$result = mysql_query("SELECT * FROM comentarios WHERE  
id_articulo = '$id_articulo' ORDER BY id_comentario ASC", $link);  
//se despliega el resultado  
echo "<table>";  
echo "<tr>";  
echo "<th>Nombre</th>";  
echo "<th>Comentario</th>";  
echo "<th>Fecha</th>";  
echo "</tr>";  
while ($row = mysql_fetch_row($result)){   
    echo "<tr>";  
    echo "<td>$row[5]></td>";  
    echo "<td>$row[7]</td>";  
    echo "<td>$row[4]</td>";  
    echo "</tr>";  
}  
echo "</table>";  
?>  


</form>
</section>

</body>
</html>
