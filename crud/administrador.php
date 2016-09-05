<?php
	
	session_start();
	require '../conexion.php';
	
        if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
        if ($_SESSION['tipo_usuario'] == 2) {
            header("Location: usuario.php");
        }

        
	$idUsuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT u.id, p.nombre FROM usuarios AS u INNER JOIN personal AS p ON u.id_personal=p.id WHERE u.id = '$idUsuario'";
	$result=$mysqli->query($sql);
	
	$row = $result->fetch_assoc();
?>

<html>
	<head>
		<title>Administrador</title>
                <link rel="stylesheet" href="style.css" type="text/css" />

	</head>
	
	<body>
		<?php 
                if($_SESSION['tipo_usuario']==2){
                      header("Location: usuario.php");
                  } ?>
            
	<?php if($_SESSION['tipo_usuario']==1){?>
            
            <center>
                <div id="header">
                    <div id="content">
                        <label><?php echo 'Bienvenid@ ' . utf8_decode($row['nombre']); ?></label>
                        <label><a href="logout.php">Cerrar Sesi&oacute;n</a> </label>
                    </div>
                </div>
                
                <div id="body">
                    <div id="content">
                        <table>
                            <tr>
                                <td> <a class="waves-effect waves-light btn" href="registro.php">
                                        <i class="material-icons right">cloud</i>Registrar Usuarios</a>
                                </td>                  
                        </tr>
                        <tr>
                            <td><a class="waves-effect waves-light btn" href="usuarios.php">
                                        <i class="material-icons right" >cloud</i>Usuarios Registrados</a></td>                  
                        </tr>
                        </table>
                    </div>
                </div>
            </center>

            <?php } ?>
	
	</body>
</html>