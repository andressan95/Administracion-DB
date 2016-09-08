<?php
	require_once('../modelo/db_modelo.php');
	require_once('../modelo/usuarios_modelo.php');
	$dbhost = "ca-cdbr-azure-central-a.cloudapp.net"; 
	$dbuser = "be00176cf03501";
	$dbname = "db_administracion";
	$bases = $_POST["bases"];
	$conexion = mysql_connect($dbhost,$dbuser);
	mysql_select_db($dbname, $conexion);	
	$tablas = mysql_list_tables($dbname);
	echo "<h2>"."<br>".$_POST["bases"]."<br></h2>";
	$tabla = mysql_query("SELECT * FROM $bases");
	while ($registro = mysql_fetch_array($tabla)) {
		<?php
	echo '<div>'; 
	echo '<span>Numero de articulo: ' . $registro['articulo'] . '<br></span>'; 
	echo '<h3>Nombre: ' . $registro['nombre'] . '<br></h3>'; 
	echo '<p>Descripcion: ' . $registro['descripcion'] . '<br></p>'; 
	echo '<p>Precio: ' . $registro['precio'] . '€'.'<br></p>'; 
	echo '</div>';
?>
	} 			
	mysql_free_result($tablas); 
	mysql_close($conexion);
?>