<?php
include_once 'dbconfig.php';
session_start();
	require '../conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
         session_start();
        if ($_SESSION['tipo_usuario'] == 2) {
            echo '<script language="javascript">alert("No tienes acceso, Redireccionando");</script>'; 
            header("Location: usuario.php");
        }
// delete condition
if(isset($_GET['delete_id']))
{
	$sql_query="DELETE FROM usuarios WHERE id=".$_GET['delete_id'];
	mysql_query($sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}
// delete condition

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRUD</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"></link>
        <script> 
        
         $( document ).ready(function(){
              $(".button-collapse").sideNav();
         }) 
        </script>
<script type="text/javascript">
function edt_id(id)
{
	if(confirm('Desea editar ?'))
	{
		window.location.href='edit_data2.php?edit_id='+id;
	}
}
function delete_id(id)
{
	if(confirm('Desea eliminar?'))
	{
		window.location.href='usuarios.php?delete_id='+id;
	}
}
</script>
</head>
<body>

  <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo left-align">Usuarios Registrados </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="administrador.php">Panel Administrador</a></li>
                <li><a href="usuarios.php">Usuarios</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="logout.php">Cerrar Sesion</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="administrador.php">Panel Administrador</a></li>
                <li><a href="usuarios.php">Usuarios</a></li>
                <li><a href="registro.php">Registro</a></li>
                <li><a href="logout.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
<center>

    
            <table align="center"  class="responsive-table highlight bordered" >

                <thead>
                    <tr>

                        <th class="card-panel cyan accent-3 blue-text text-lighten-5" data-field="usuario">Usuario</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="password">Password</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="nombre">Nombres</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="apellido">Apellidos</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="cedula">Cedula</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="ciudad">Ciudad</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="direccion">Direccion</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="provincia">Provincia</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="sector">Sector</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="correo">Correo</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="telefono">Telefono</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="tipo_usuario"> Tipo de Usuario</th>
                        <th class="card-panel cyan accent-3 blue-text text-lighten-5"data-field="operaciones" colspan="2">Operaciones</th>

                    </tr>
                </thead>  
  <?php
	$sql_query="SELECT usuarios.id, usuarios.usuario, usuarios.password, personal.nombre, personal.apellido, personal.cedula,
                        personal.ciudad, personal.direccion, personal.provincia, personal.sector,
                        personal.correo, personal.telefono, tipo_usuario.tipo
                        FROM usuarios
                        inner JOIN personal
                        ON usuarios.id_personal=personal.id
                        inner join tipo_usuario
                        on usuarios.id_tipo = tipo_usuario.id ;";
	$result_set=mysql_query($sql_query);
	if(mysql_num_rows($result_set)>0)
	{
        while($row=mysql_fetch_row($result_set))
		{
		?>
                <tr >
                <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><?php echo $row[6]; ?></td>
            <td><?php echo $row[7]; ?></td>
            <td><?php echo $row[8]; ?></td>
            <td><?php echo $row[9]; ?></td>
            <td><?php echo $row[10]; ?></td>
            <td><?php echo $row[11]; ?></td>
            <td><?php echo $row[12]; ?></td>

            <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="b_edit.png" align="EDIT" /></a></td>
            <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="b_drop.png" align="DELETE" /></a></td>
            </tr>
        <?php
		}
	}
	else
	{
		?>
        <tr>
        <td colspan="5">No hay Usuarios Registrados</td>
        </tr>
        <?php
	}
	?>
    </table>
   

</center>
</body>
</html>