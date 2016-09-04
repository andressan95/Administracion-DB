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
    <link rel="stylesheet" href="style.css" type="text/css" />
	<head>
		<title>Login</title>
                <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	</head>
	
	<body>
            
            <label>Registro De Escrituras </label>
            <br>
            <br>
            <section>
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
        <div class="input-field col s45">
            <input id="password" type="password" name="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
                    <div class="input-field col s45 ">
                        <label>Contraseña :</label></br>
                        <input type="password" name="password" id="password" required /></br>
                    </div>  
                </div>
                <button class="btn-large waves-effect waves-light btn #81d4fa light-blue lighten-3"
                        type="submit" id="submit" name="login"> Iniciar Sesion<i class="mdi-content-send right"></i></button>
                
                <label> O </label>

                <a href="registro_usuario.php" class="btn-large waves-effect waves-light btn #81d4fa light-blue lighten-3">Registrarse <i class="mdi-content-send right"></i></a>
            </form>
             <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
        </div>
    </div>
         
                
               
            
            </body>
</html>		