<?php
include_once 'dbconfig.php';
if(isset($_GET['edit_id']))
{
	$sql_query="SELECT * FROM usuarios WHERE id=".$_GET['edit_id'];
	$result_set=mysql_query($sql_query);
	$fetched_row=mysql_fetch_array($result_set);
}

$sql = "SELECT id, tipo FROM tipo_usuario";
	$result=$mysqli->query($sql);
	
	
if(isset($_POST['btn-update']))
{
	// variables for input data
              $nombre = $_POST['nombre'];
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$tipo_usuario = $_POST['tipo_usuario'];
		$sha1_pass = sha1($password);
		$error = '';
                
			$sql_query = "UPDATE users SET first_name='$first_name',last_name='$last_name',user_city='$city_name' WHERE id=".$_GET['edit_id'];

		
	// variables for input data
	
	// sql query for update data into database
               
			
			$sqlPerson = "UPDATE personal SET nombre='$nombre' INSERT INTO personal (nombre) VALUES('$nombre')";
			$resultPerson=$mysqli->query($sqlPerson);
			$idPersona = $mysqli->edit_id;
			
			$sqlUsuario = "INSERT INTO usuarios (usuario, password, id_personal, id_tipo) VALUES('$usuario','$sha1_pass','$idPersona','$tipo_usuario')";
			$resultUsuario = $mysqli->query($sqlUsuario);
			
			if($resultUsuario>0)
			$bandera = true;
			else
			$error = "Error al Registrar";
		
		
                
                
	// sql query for update data into database
	
	// sql query execution function
	if(mysql_query($sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Data Are Updated Successfully');
		window.location.href='index.php';
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


		<script>
			function validarNombre()
			{
				valor = document.getElementById("nombre").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Nombre');
					return false;
				} else { return true;}
			}
			
			function validarUsuario()
			{
				valor = document.getElementById("usuario").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Usuario');
					return false;
				} else { return true;}
			}
			
			function validarPassword()
			{
				valor = document.getElementById("password").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Password');
					return false;
					} else { 
					valor2 = document.getElementById("con_password").value;
					
					if(valor == valor2) { return true; }
					else { alert('Las contraseña no coinciden'); return false;}
				}
			}
			
			function validarTipoUsuario()
			{
				indice = document.getElementById("tipo_usuario").selectedIndex;
				if( indice == null) {
					alert('Seleccione tipo de usuario');
					return false;
				} else { return true;}
			}
			
			function validar()
			{
				if(validarNombre() && validarUsuario() && validarPassword() && validarTipoUsuario())
				{
					document.registro.submit();
				}
			}
			
		</script>
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
    <form method="post">
    <table align="center">
        
         <tr>
    <td><input type="text" name="nombre" placeholder="Nombre Completo" value="<?php echo $fetched_row['nombre']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="usuario" placeholder="Nombre de Usuario" value="<?php echo $fetched_row['usuario']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="password" name="password" placeholder="Password" required value="<?php echo $fetched_row['password']; ?>" /></td>
    </tr>
         <tr>
    <td><input type="password" name="con_password" placeholder="Confirmar password" value="<?php echo $fetched_row['password']; ?>" required  /></td>
    </tr>
        <tr> <td> <label>Tipo Usuario:</label>
                            <select id="tipo_usuario" name="tipo_usuario">
					<?php while($row = $result->fetch_assoc()){ ?>
                                <option value="<?php echo  $fetched_row['id']; ?>" selected><?php echo $fetched_row['tipo']; ?></option>
					<?php }?>
				</select>
            </td>
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