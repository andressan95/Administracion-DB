<?php
include_once 'dbconfig.php';
session_start();
	require '../conexion.php';
	
         session_start();
        if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
        if ($_SESSION['tipo_usuario'] == 2) {
            header("Location: usuario.php");
        }

if(isset($_GET['edit_id']))
{
	$sql_query="SELECT usuarios.id, usuarios.usuario, usuarios.password, personal.nombre, tipo_usuario.tipo
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
	 $nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $tipo_usuario = $_POST['tipo_usuario'];
    $sha1_pass = sha1($password);

    $error = '';

    $sqlUser = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
    $resultUser = $mysqli->query($sqlUser);
    $rows = $resultUser->num_rows;

    if ($rows > 0) {
        $error = "El usuario ya existe";
    } else {
	// variables for input data
	
	// sql query for update data into database
	$sql_query = "update usuarios
                        inner join personal 
                        on usuarios.id_personal = personal.id
                        inner join tipo_usuario
                        on usuarios.id_tipo= tipo_usuario.id
                        set  
                         usuarios.usuario = '$usuario',
                         usuarios.password = '$password',
                         personal.nombre = '$nombre',
                         tipo_usuario.tipo = '$tipo_usuario'
                      where usuarios.id=".$_GET['edit_id'];
	// sql query for update data into database
        
        
	 if ($resultUsuario > 0)
            $bandera = true;
        else
            $error = "Error al Registrar";
    }
    
	// sql query execution function
	if(mysql_query($sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Data Are Updated Successfully');
		window.location.href='edit_data.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('error occured while updating data');
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
<title>CRUD Operations With PHP and MySql - By Coding Cage</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
	<div id="content">
    <label>CRUD</label>
    </div>
</div>

    <div id="body">
                <div id="content">
                    <form method="post" id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                        <table align="center">
                            <tr>
                                <td align="center"><a href="index.php">Inicio</a></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="nombre" placeholder="Nombre Completo" value="<?php echo $fetched_row['nombre']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="usuario" placeholder="Nombre de Usuario" value="<?php echo $fetched_row['usuario']; ?>"required /></td>
                            </tr>
                            <tr>
                                <td><input type="password" name="password" placeholder="Password" value="<?php echo $fetched_row['password']; ?>" required /></td>
                            </tr>
                            <tr>
                                <td><input type="password" name="con_password" placeholder="Confirmar password"  value="<?php echo $fetched_row['password']; ?>"required /></td>
                            </tr>
                            <tr> <td> <label>Tipo Usuario:</label>
                                    <select id="tipo_usuario" name="tipo_usuario">
                                                           <?php while ($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $fetched_row['id']; ?>" selected><?php echo $fetched_row['tipo']; ?></option>
                                                           <?php } ?>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
                                <button name="btn-cancel"><strong>Cancel</strong></button>
                               </tr>
                        </table>
                    </form>
                </div>
            </div>
    
    
    
<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td><input type="text" name="first_name" placeholder="First Name" value="<?php echo $fetched_row['usuario']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" placeholder="Last Name" value="<?php echo $fetched_row['password']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="city_name" placeholder="City" value="<?php echo $fetched_row['id_personal']; ?>" required /></td>
    </tr>
    <tr>
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
    <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
    </td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>