<?php
	require_once('../modelo/db_modelo.php');
	require_once('../modelo/usuarios_modelo.php');

	$usuarios = new usuarios_modelo();

	$tipo = $_POST['tipo'];
	$codigo = $_POST['codigo'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$nacimiento = $_POST['nacimiento'];
	$sexo = $_POST['sexo'];

	switch ($tipo) {
		case 'registrar':
			$estado = $usuarios->registrar($codigo, $nombres, $apellidos, $nacimiento, $sexo);
		break;
		
		case 'editar':
			$estado = $usuarios->editar($codigo, $nombres, $apellidos, $nacimiento, $sexo);
		break;
	}
	
	echo $estado;

?>
