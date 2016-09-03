<?php
	require('../conexion.php');
	
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: ../welcome.php");
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
			
			header("location: ../welcome.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>




<html>
    <link rel="stylesheet" href="style.css" type="text/css" />
	<head>
		<title>Login</title>
	</head>
	
	<body>
            
            <label>Registro De Escrituras </label>
            <br>
            <br>
            <section>
               
                <div id="body">
	<div id="content">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <table align="center">
    <tr>
        <td><input id="usuario" name="usuario" type="text" placeholder="Nombre de Usuario" required/></td>
    </tr>
    <tr>
    <td><input id="password" name="password" type="password" placeholder="Contraseña" required/></td>
    </tr>
   
    <tr>
    <td><button type="submit" name="login"><strong>Iniciar</strong></button></td>
    </tr>
    <tr> <a href="registroUsuario.php">Registrarse</a></tr>
    <tr>
    <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
    </tr>
    </table>
    </form>
    </div>
               
            
            </body>
</html>		