<?php
$imageURL = 'imagenes/background.jpg';

	require('conexion.php');
	
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: welcome.php");
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
			
			header("location: welcome.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>


<style type="text/css">
body{ font-size:18px; color:#FFF; }
a { color:#FFF}
.classname { border:solid 1px #2d2d2d;  text-align:center; background:#575757; padding:100px 50px 100px 50px;  -moz-border-radius: 5px;  -webkit-border-radius: 5px; border-radius: 5px;}

/* =Your Generated css 
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
.classname{-moz-box-shadow: 8px  10px  27px  #000000;-webkit-box-shadow: 8px  10px  27px  #000000;box-shadow: 8px  10px  27px  #000000;}
/* End of Your Generated css 
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
body
{
background-image: url(<?php echo $imageURL;?>);
}
  
</style>
<html>
	<head>
		<title>Login</title>
	</head>
	
	<body>
            
            <label>Registro De Escrituras </label>
            <br>
            <br>
            <section>
                <div class="classname">
                <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
                    <div><label>Usuario:</label><input id="usuario" name="usuario" type="text" required ></div>
			<br />
                        <div><label>Password:</label><input id="password" name="password" type="password" required></div>
			<br />
			<div><input name="login" type="submit" value="login"></div> 
		</form> 
		</div>
		<br />
		
		<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
            </section>
            
       
            <section>
                <a href="registroUsuario.php">Registrarse</a>
            </section>
            
            </body>
</html>		