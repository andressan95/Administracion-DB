<!DOCTYPE html>
<html>
<head>
	<title>Distribucion de Datos</title>
	<link href="publico/css/dom.css" rel="stylesheet">
	<script src="publico/js/jquery.js"></script>
	<script src="publico/js/myjava.js"></script>
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
<div id="main">
	<div id="aside">
		<?php include 'controlador/listado_tablas.php';?>
	</div>
	<div id="section">
		<div id="contenido"></div>
	</div>
</div>
</section>

</body>
</html>
