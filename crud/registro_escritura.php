<?php

	
	require('../conexion.php');
	session_start();
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
         session_start();
        if ($_SESSION['tipo_usuario'] == 1) {
            echo '<script language="javascript">alert("No tienes acceso, Redireccionando");</script>'; 
            header("Location: usuario.php");
        }
	
	$result=$mysqli->query($sql);
	
	$bandera = false;
	
	if(!empty($_POST))
	{
		$nombre = mysqli_real_escape_string($mysqli,$_POST['nombre']);
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);
		$tipo_usuario = $_POST['tipo_usuario'];
		$sha1_pass = sha1($password);
		
		$error = '';
		
		$sqlUser = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
		$resultUser=$mysqli->query($sqlUser);
		$rows = $resultUser->num_rows;
		
		if($rows > 0) {
			$error = "El usuario ya existe";
			} else {
			
			$sqlPerson = "INSERT INTO personal (nombre) VALUES('$nombre')";
			$resultPerson=$mysqli->query($sqlPerson);
			$idPersona = $mysqli->insert_id;
			
			$sqlUsuario = "INSERT INTO usuarios (usuario, password, id_personal, id_tipo) VALUES('$usuario','$sha1_pass','$idPersona','$tipo_usuario')";
			$resultUsuario = $mysqli->query($sqlUsuario);
			
			if($resultUsuario>0)
			$bandera = true;
			else
			$error = "Error al Registrar";
			
		}
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro</title>
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
</head>

    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo left-align">Registro de Usuarios </a>
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
<body>
    <div class="row">
    <form class="col s12" id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            
                        <div class="centered row">
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="usuario" name="usuario" type="text" class="validate" length="50">
                                        <label for="usuario">Nombre de Usuario</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="password" type="password" name="password" class="validate" length="50">
                                        <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="con_password" type="password" name="con_password" class="validate" length="50">
                                        <label for="con_password">Confirmar Password</label>
                                </div>
                            </div>
                        </div>
                    </div>
               
                        <div class="row center">
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="nombre" name="nombre" type="text" class="validate" length="50">
                                        <label for="nombre">Nombres</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="apellido" type="text" name="apellido" class="validate" length="50">
                                        <label for="apellido">Apellido</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="cedula" type="number" name="cedula" class="validate" length="10">
                                        <label for="cedula">Cedula de Identidad</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="correo" type="email" name="correo" class="validate" length="50">
                                        <label for="correo">Correo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="telefono" type="number" name="telefono" class="validate" length="10">
                                        <label for="telefono">Telefono</label>
                                </div>
                            </div>
                        </div>


                    </div>
                   <div class="center-on-small-only row">
                            <div class="input-field col s4">
                                <input id="ciudad" name="ciudad" type="text" class="validate" length="50">
                                    <label for="ciudad">Ciudad</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="direccion" type="text" name="direccion" class="validate" length="50">
                                    <label for="direccion">Direccion</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="provincia" type="text" name="provincia" class="validate" length="50">
                                    <label for="provincia">Provincia</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="sector" name="sector" type="text" class="validate" length="50">
                                    <label for="sector">Sector</label>
                            </div>
                        </div>

                   

           
                <input name="tipo_usuario" id="idtipo_usuario" type="radio" value="2" checked />
                <label for="idtipo_usuario" >Usuario</label>


            <button class="btn waves-effect waves-light" type="button" value="Registrar" id="submit" name="registrar" onClick="validar();" >Registrar
                <i class="material-icons right"></i>
            </button>
     </form>
     
        <button class="btn waves-effect waves-light" type="button" value="Registrar" id="submit" name="registrar" onClick="validar();" >Registrar
        <i class="material-icons right"></i>
        </button>
        
    </form>
        
        
  </div>
          
		<?php if($bandera) { ?>
			<h1>Registro exitoso</h1>
			<a href="welcome.php">Regresar</a>
			
			<?php }else{ ?>
			<br />
			<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
			
		<?php } ?>
		
	</body>
</html>