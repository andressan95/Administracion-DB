<?php
	require('../conexion.php');
	
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: administrador.php");
	}
	
	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);
		$error = '';
		
		$sha1_pass = sha1($password);
		
		$sql = "SELECT id, tipo_usuario_id FROM usuarios WHERE usuario = '$usuario' AND password = '$sha1_pass'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['id'];
			$_SESSION['tipo_usuario'] = $row['tipo_usuario_id'];
			
			header("location: administrador.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>




<html>
    <link rel="stylesheet" href="style.css" type="text/css" />
	<head>
		<title>Login</title>
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
	
	<body>
            <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo left-align">Registro de Escrituras </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
               
                <li><a href="registro_usuario.php">Registrarse</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
             <li><a href="registro_usuario.php">Registrarse</a></li>

            </ul>
        </div>
    </nav>
            <br>
            <br>
            <section>
                <div class="container"><!--Inicio de Sesion -->
        <div class="main">
            <h2>Iniciar Sesión</h2>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" id="sesion" name="iniciosesion" >
                <div class="row" id="content">
              
                        <div class="input-field col s45 ">
                            <input id="usuario" type="text" name="usuario" class="validate" required />
                        <label for="usuario">Usuario:</label>
                    </div>
                        <div class="input-field col s45">
                            <input id="password" type="password" name="password" class="validate" required="">
                            <label for="password">Password</label>
                        </div>
                

                </div>
  <button class="btn waves-effect waves-light" type="submit" id="submit" name="login" >Iniciar Sesion
    <i class="material-icons right"></i>
  </button>
                       
                <label> O </label>


                <a href="registro_usuario.php" class="btn waves-effect waves-light">Registrarse <i class="mdi-content-send right"></i></a>
            </form>
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
            
              <div class="preloader-wrapper small active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-yellow">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-green">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
        
             <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?>  
             
             <div class="progress">
                <div class="indeterminate"></div>
            </div>
             </div>
        </div>
    </div>
         
                
               
            
            </body>
</html>		