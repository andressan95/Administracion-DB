<?php

	
	require('../conexion.php');
	
	
	$result=$mysqli->query($sql);
	
	
	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);
                		
 $nombre = mysqli_real_escape_string($mysqli,$_POST['nombre']);
 $apellido = mysqli_real_escape_string($mysqli,$_POST['apellido']);
 $cedula= mysqli_real_escape_string($mysqli,$_POST['cedula']);
  $ciudad = mysqli_real_escape_string($mysqli,$_POST['ciudad']);
 $direccion = mysqli_real_escape_string($mysqli,$_POST['direccion']);
 $provincia = mysqli_real_escape_string($mysqli,$_POST['provincia']);
 $sector = mysqli_real_escape_string($mysqli,$_POST['sector']);
 $correo= mysqli_real_escape_string($mysqli,$_POST['correo']);
 $telefono= mysqli_real_escape_string($mysqli,$_POST['telefono']);

		$tipo_usuario = $_POST['tipo_usuario'];
		$sha1_pass = sha1($password);
		
		$error = '';
		
		$sqlUser = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
                $sqlUser = "SELECT id FROM personal WHERE cedula = '$cedula'";
                
		$resultUser=$mysqli->query($sqlUser);
		$rows = $resultUser->num_rows;
                
                $resultPerson = $mysqli->query($sqlUser);
		$rows2 = $resultPerson -> num_rows;
		if($rows > 0) {
			$error = "El usuario ya existe";
			}if($rows2 > 0){
                            $error = "La cedula ya existe";
                        }else {

			$sqlPerson = "INSERT INTO personal (nombre, apellido, cedula, ciudad, direccion, provincia, sector, correo, telefono) VALUES ('$nombre','$apellido','$cedula','$ciudad','$direccion','$provincia','$sector','$correo','$telefono');";
			$resultPerson=$mysqli->query($sqlPerson);
			$idPersona = $mysqli->insert_id;
			
			$sqlUsuario = "INSERT INTO usuarios (usuario, password, id_personal, id_tipo) VALUES('$usuario','$sha1_pass','$idPersona','$tipo_usuario');";
			$resultUsuario = $mysqli->query($sqlUsuario);
			
			if($resultUsuario>0)
			$bandera = true;
			else
			$error = "Error al Registrar usuario";
			
                        }

 
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrar Usuario</title>
<script>
			function validarNombre()
			{
				valor = document.getElementById("nombre").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
                                        swal({  
                                            title: "Ingrese un Nombre", 
                                            text: "Alerta se cerrara en 4 segundos..",  
                                            timer: 4000, 
                                            type:"error",
                                            showConfirmButton: true });
                                        return false;
				} else { return true;}
			}
			
			function validarUsuario()
			{
				valor = document.getElementById("usuario").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					 swal({  
                                            title: "Ingrese Nombre de Usuario", 
                                            text: "Alerta se cerrara en 4 segundos..",  
                                            timer: 4000, 
                                            type:"error",
                                            showConfirmButton: true });
					return false;
				} else { return true;}
			}
			
			function validarPassword()
			{
				valor = document.getElementById("password").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					 swal({  
                                            title: "Ingrese la Contraseña", 
                                            text: "Alerta se cerrara en 4 segundos..",  
                                            timer: 4000, 
                                            type:"error",
                                            showConfirmButton: true });
					return false;
					} else { 
					valor2 = document.getElementById("con_password").value;
					
					if(valor == valor2) { return true; }
					else {  swal({  
                                            title: "Las contraseñas no Coinsiden", 
                                            text: "Alerta se cerrara en 4 segundos..",  
                                            timer: 4000, 
                                            type:"error",
                                            showConfirmButton: true });
                                            return false;}
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
				indice = document.getElementById("idtipo_usuario").checked;
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

  <link rel="stylesheet" href="style.css" type="text/css" />
                        <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"></link>
        <script src="sweetalert/sweetalert.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="sweetalert/sweetalert.css"></link>
        <script> 
        
         $( document ).ready(function(){
              $(".button-collapse").sideNav();
         }) 
        </script>
</head>
    <nav>
 <div class="nav-wrapper">
            <a href="#!" class="brand-logo left-align">Registro </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                               <li><a href="index.php">Inicio</a></li>

            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="index.php">Inicio</a></li>
                
            </ul>
        </div>
    </nav>
<body>
    <div class="row">
    <form class="col s6" id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>Datos Personales</label>
        
      <div class="row">
        <div class="input-field col s6">
          <input id="nombre" name="nombre" type="text" class="validate" length="50">
          <label for="nombre">Nombres</label>
        </div>
          
          <div class="input-field col s6">
              <input id="apellido" name="apellido" type="text" class="validate" length="50">
          <label for="apellido">Apellidos</label>
        </div>
      </div>
       
        <div class="row">
        <div class="input-field col s6">
            <input id="cedula" name="cedula" type="number" class="validate" length="10">
          <label for="cedula">Cedula de Identidad</label>
        </div>  
      </div>
        
        <label>Direccion:</label>
        
        <div class="row">
        <div class="input-field col s6">
          <input id="provincia" name="provincia" type="text" class="validate" length="50">
          <label for="provincia">Provincia</label>
        </div>
          
          <div class="input-field col s6">
              <input id="ciudad" name="ciudad" type="text" class="validate" length="50">
          <label for="ciudad">Ciudad</label>
        </div>
      </div>
          <div class="row">
        <div class="input-field col s6">
          <input id="sector" name="sector" type="text" class="validate" length="50">
          <label for="sector">Sector</label>
        </div>
          
          <div class="input-field col s6">
              <input id="direccion" name="direccion" type="text" class="validate" length="50">
          <label for="direccion">Direccion</label>
        </div>
      </div>
        <label>Contacto:</label>
          <div class="row">
        <div class="input-field col s6">
          <input id="correo" name="correo" type="email" class="validate" length="50">
          <label for="correo">Correo</label>
        </div>
          
          <div class="input-field col s6">
              <input id="telefono" name="telefono" type="number" class="validate" length="10">
          <label for="telefono">Telefono</label>
        </div>
      </div>
        
        <label>Inicio de Sesion</label>
      </div>
        <div class="row">
        <div class="input-field col s6">
          <input id="usuario" name="usuario" type="text" class="validate" length="50">
          <label for="usuario">Nombre de Usuario</label>
        </div>
            
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" name="password" class="validate" length="50">
          <label for="password">Password</label>
        </div>
      </div>
         <div class="row">
        <div class="input-field col s6">
          <input id="con_password" type="password" name="con_password" class="validate" length="50">
          <label for="con_password">Confirmar Password</label>
        </div>
      </div>
        
        <form action="#">
    <p>
        <input name="tipo_usuario" id="idtipo_usuario" type="radio" value="2" checked/>
      <label for="idtipo_usuario">Usuario</label>
    </p>
    
  </form>
       
     
        <button class="btn waves-effect waves-light" type="button" value="Registrar" id="submit" name="registrar" onClick="validar();" >Registrar
        <i class="material-icons right"></i>
        </button>
        
    </form>
        
        
  </div>
          
		<?php if($bandera = false) {   
                    ?>
                         <script type="text/javascript">
                              swal({  
                                            title: "Registro Completado Con Exito", 
                                            text: "Alerta se cerrara en 4 segundos.. Redireccionando", 
                                            type:"success",
                                            timer: 4000, 
                                            showConfirmButton: true, 
                                         },

                                        function(){ 
                                        window.location.href='index.php';
                                        }); 
                                        
                		</script>
			
        		

			<?php }else{ ?>                        
                        <script type="text/javascript">  
        		swal("Usuario no registrado", "<?php echo isset($error) ? utf8_decode($error) : '' ; ?>", "error");
		</script>
                        
			
		<?php } ?>
		
	</body>
</html>