<?php
	require_once('../modelo/db_modelo.php');
	require_once('../modelo/usuarios_modelo.php');

	$usuarios = new usuarios_modelo();
	$codigo = $_POST['codigo'];

	$estado = $usuarios->buscar($codigo);

	$i = 0;

	foreach($estado as $row){
		$nombres = $row['usu_nombres'];
		$apellidos = $row['usu_apellidos'];
		$nacimiento = $row['usu_nacimiento'];
		$sexo = $row['usu_sexo'];

		$i = $i+1;
	}

	if($i > 0){
		$array = array(0 => 1,
					   1 => $nombres,
					   2 => $apellidos,
					   3 => $nacimiento,
					   4 => $sexo);
	}else{
		$array = array(0 => 0,
					   1 => '',
					   2 => '',
					   3 => '',
					   4 => '');
	}

	echo json_encode($array);


?>
