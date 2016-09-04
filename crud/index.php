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
		
		$sql = "SELECT id, id_tipo FROM usuarios WHERE usuario = '$usuario' AND password = '$sha1_pass'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['id'];
			$_SESSION['tipo_usuario'] = $row['id_tipo'];
			
			header("location: administrador.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>




<html>
	<head>
		<title>Login</title>
                <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
                <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
                <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
                <script type="text/javascript" src="materialize/js/materialize.js"></script>

	</head>
	
	<body>
            
            
            <br>
            <br>
            <section>
                                    <h1>Registro De Escrituras </h1>

                <div class="container"><!--Inicio de Sesion -->
                    <div class="main">
                        <h2>Iniciar Sesión</h2>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" id="sesion" name="iniciosesion" >
                            <div class="row" id="content">
                                <div class="input-field col s45 ">
                                    <label>Usuario:</label></br>
                                    <input type="text" name="usuario" id="username" required /></br>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" name="password" required="" class="validate">
                                        <label for="password">Password</label>
                                    </div>
      </div>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" id="submit" name="login">Iniciar Sesion
                                <i class="material-icons right"></i></button>

                            
                            <label> O </label>

                            <a href="registro_usuario.php" class="btn waves-effect waves-light">Registrarse <i class="mdi-content-send right"></i></a>
                        </form>

                        <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : ''; ?></div>
                    </div>
                </div>
            </section>   
                
               
            
            </body>
</html>		