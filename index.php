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
.classname {
/*    opacity: 0.33; border:solid 1px #2d2d2d;  text-align:center; background:#575757; padding:100px 50px 100px 50px;  -moz-border-radius: 5px;  -webkit-border-radius: 5px; border-radius: 5px;
*/
background-color: #ffffff;
border: 2px solid #999999;
-moz-border-radius: 38px;
-webkit-border-radius: 38px;
border-radius: 38px;
/*IE 7 AND 8 DO NOT SUPPORT BORDER RADIUS*/
-moz-box-shadow: 0px 0px 20px #000000;
-webkit-box-shadow: 0px 0px 20px #000000;
box-shadow: 0px 0px 20px #000000;
/*IE 7 AND 8 DO NOT SUPPORT BLUR PROPERTY OF SHADOWS*/
opacity: 0.41;
-ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity = 41);
/*-ms-filter must come before filter*/
filter: alpha(opacity = 41);
/*INNER ELEMENTS MUST NOT BREAK THIS ELEMENTS BOUNDARIES*/
/*All filters must be placed together*/
}

/* =Your Generated css 
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*.classname{-moz-box-shadow: 7px  8px  18px  #000000;-webkit-box-shadow: 7px  8px  18px  #000000;box-shadow: 7px  8px  18px  #000000;}
/* End of Your Generated css 
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
body{width:90%;margin:auto;min-width:600px;max-width:2000px}
/* background */
body
{
background-image: url(<?php echo $imageURL;?>);
}



.form{opacity: 1;}
    
  
</style>
<html>
	<head>
		<title>Login</title>
	</head>
	
	<body>
            <div class="classname">
            <label>Registro De Escrituras </label>
            <br>
            <br>
            <section>
                
                <form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
                    <div><label>Usuario:</label><input id="usuario" name="usuario" type="text" required ></div>
			<br />
                        <div><label>Password:</label><input id="password" name="password" type="password" required></div>
			<br />
			<div><input name="login" type="submit" value="login"></div> 
		</form> 
		
		<br />
		
		<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
            </section>
            
            </div>
            <section>
                <a href="registroUsuario.php">Registrarse</a>
            </section>
            
            </body>
</html>		