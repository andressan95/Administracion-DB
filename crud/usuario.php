<?php
	
	session_start();
	require '../conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
        
	$idUsuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT u.id, p.nombre FROM usuarios AS u INNER JOIN personal AS p ON u.personal_id=p.id WHERE u.id = '$idUsuario'";
	$result=$mysqli->query($sql);
	
	$row = $result->fetch_assoc();
?>

<html>
	<head>
		<title>Administrador</title>
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
            <a href="#!" class="brand-logo left-align"><?php echo 'Bienvenid@ ' . utf8_decode($row['nombre']); ?> </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="usuario.php">Panel Usuarios</a></li>
                <li><a href="registro_escritura.php">Registrar Escritura</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="logout.php">Cerrar Sesion</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="usuario.php">Panel Usuarios</a></li>
                <li><a href="registro_escritura.php">Registrar Escritura</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="logout.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>
	<body>
		
            
	<?php if($_SESSION['tipo_usuario']==2){?>
            
            <center>
               
                
                <div id="body">
                    <div id="content">
                        <table>
                            <tr>
                                <td><button value="Registro_Escritura"><strong>Registro de Escritura</strong><a href="registro_escritura.php"></a></button></td>                  
                        </tr>
                        <tr>
                            <td><button value="Perfil"><strong>Perfil</strong><a href="perfil.php"></a></button></td>                  
                        </tr>
                        </table>
                    </div>
                </div>
            </center>

            <?php } ?>
	
	</body>
</html>