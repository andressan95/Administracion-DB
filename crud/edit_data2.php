<?php
	require('../conexion.php');
        include_once 'dbconfig.php';
if(isset($_GET['edit_id']))
{
	   $sql_query = "SELECT usuarios.id, usuarios.usuario, usuarios.password, personal.nombre, tipo_usuario.tipo
                    FROM usuarios
                    inner JOIN personal
                    ON usuarios.id_personal=personal.id
                    inner join tipo_usuario
                    on usuarios.id_tipo = tipo_usuario.id where usuarios.id =".$_GET['edit_id'];
	$result_set=mysql_query($sql_query);
	$fetched_row=mysql_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{
	// variables for input data
        $nombre =  $_POST['nombre'];
    $usuario =  $_POST['usuario'];
    $password =  $_POST['password'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $sha1_pass = sha1($password);
    
    $error = '';

	

                        $sql_query = "update usuarios inner join personal on usuarios.id_personal = personal.id                       
                        set  
                         usuarios.usuario = '$usuario',
                         usuarios.password = '$password',
                         personal.nombre = '$nombre',
                         usuarios.id_tipo = $tipo_usuario
                      where usuarios.id=".$_GET['edit_id'];
                        
			$resultUsuario = $mysqli->query($sqlUsuario);
			
			if($resultUsuario>0)
			$bandera = true;
			else
			$error = "Error al Registrar";
			
		
	// sql query for update data into database
//      $sql_query = "update usuarios
//                        inner join personal 
//                        on usuarios.id_personal = personal.id                       
//                        set  
//                         usuarios.usuario = '$usuario',
//                         usuarios.password = '$password',
//                         personal.nombre = '$nombre',
//                         usuario.id_tipo = '$tipo_usuario'
//                      where usuarios.id=".$_GET['edit_id']+";";// sql query for update data into database
	
	// sql query execution function
	if(mysql_query($sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Datos actualizados Correctamente');
            window.location.href = 'usuarios.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('Error al Registrar');
            window.location.href = 'usuarios.php';

		</script>
		<?php
	}
	// sql query execution function
}
if(isset($_POST['btn-cancel']))
{
	header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</head>
<body>
<center>

<div id="header">
	<div id="content">
    <label>Edit</label>
    </div>
</div>

<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
    <div class="row">
                        <div class="input-field col s6">
                            <input id="nombre" name="nombre" type="text" class="validate" value="<?php echo $fetched_row['nombre']; ?>" required>
                                <label for="nombre">Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="usuario" name="usuario" type="text" class="validate" value="<?php echo $fetched_row['usuario']; ?>" required>
                                <label for="usuario">Usuario</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="password" type="password" name="password" class="validate" value="<?php echo $fetched_row['password']; ?>" required>
                                <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="con_password" type="password" name="con_password" class="validate" value="<?php echo $fetched_row['password']; ?>" required>
                                <label for="con_password">Confirmar Password</label>
                        </div>
                    </div>

                    <form action="#">
                        <p>
                            <input name="tipo_usuario" type="radio" id="idadministrador" value="1" />
                            <label for="idadministrador">Administrador</label>
                        </p>
                        <p>
                            <input name="tipo_usuario" type="radio" id="idusuario" value="2" />
                            <label for="idusuario">Usuario</label>
                        </p>

                    </form>

    <td>  
        
        <button type="submit" name="btn-update"><strong>UPDATE</strong></button> <br>
    <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
    </td>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>