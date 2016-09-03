<?php
	
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
        
	$idUsuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT u.id, p.nombre FROM usuarios AS u INNER JOIN personal AS p ON u.id_personal=p.id WHERE u.id = '$idUsuario'";
	$result=$mysqli->query($sql);
	
	$row = $result->fetch_assoc();
?>

<html>
	<head>
		<title>Administrador</title>
	</head>
	
	<body>
	
	<h1><?php echo 'Bienvenid@ '.utf8_decode($row['nombre']); ?></h1>
	
	<?php if($_SESSION['tipo_usuario']==1) { ?>
	<center>

<div id="header">
	<div id="content">
    <label>Bienvenido <h1><?php echo 'Bienvenid@ '.utf8_decode($row['nombre']); ?></h1>  <a href="logout.php">Cerrar Sesi&oacute;n</a> </label>
    </div>
</div>
<div id="body">
	<div id="content">
    
    <td><button value="Registros"><a href="registro.php">Registarse<strong>Registro Usuarios</strong></a></button></td>
   
    </div>
</div>
	<a href="registro.php">Registarse</a>
	<br />
	<?php } ?>
	
	<a href="logout.php">Cerrar Sesi&oacute;n</a>
	
	</body>
</html>