<?php
include_once 'dbconfig.php';
session_start();
require '../conexion.php';

session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: index.php");
}
if ($_SESSION['tipo_usuario'] == 2) {
    header("Location: usuario.php");
}

if (isset($_GET['edit_id'])) {
    $sql_query = "SELECT usuarios.id, usuarios.usuario, usuarios.password, personal.nombre, tipo_usuario.tipo
                    FROM usuarios
                    inner JOIN personal
                    ON usuarios.id_personal=personal.id
                    inner join tipo_usuario
                    on usuarios.id_tipo = tipo_usuario.id where usuarios.id =". $_GET['edit_id'];
    $result_set = mysql_query($sql_query);
    $fetched_row = mysql_fetch_array($result_set);
}
if (isset($_POST['btn-update'])) {
    // variables for input data
    $nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $tipo_usuario = $_POST['tipo_usuario'];
    $sha1_pass = sha1($password);

    $error = '';

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
                         tipo_usuario.id = '$tipo_usuario'
                      where usuarios.id=".$_GET['edit_id'];
        // sql query for update data into database

    // sql query execution function
    if (mysql_query($sql_query)) {
        ?>
        <script type="text/javascript">
            alert('Data Are Updated Successfully');
            window.location.href = 'edit_data.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert('error occured while updating data');
        </script>
        <?php
    }
    // sql query execution function
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
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
//                            var radioButElegido = false;
//                            for (var i=0; i<radioButElegido.length; i++) {
//                                  if (radioButElegido[i].checked == true) { radioButElegido=true;} }
//                                    if (radioButElegido == false)
//                                    {msgValidacion = msgValidacion+alert('Seleccione tipo de usuario');}

//
				administrador = document.getElementById("idadministrador").checked;
                                usuario = document.getElementById("idusuario").checked;
				if( usuario == null || administrador == null) {
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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Actualizar</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
         <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    </head>
    <body>
        <center>

            <div id="header">
                <div id="content">
                    <label>Actualizar</label>
                </div>
            </div>
            <div class="row">
                <form class="col s12" method="POST">
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

                    
                    <button class="btn waves-effect waves-light" type="submit" value="actualizar" id="submit" name="btn-update" onClick="validar();" >Actualizar
                        <i class="material-icons right"></i>
                    </button>
                    <a class="waves-effect waves-light btn" href="usuarios.php">
                                        <i class="material-icons right"></i>Cancelar</a></td> 
                    </button>

                </form>

            </div>




        </center>
    </body>
</html>