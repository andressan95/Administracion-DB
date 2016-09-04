<?php
require('../conexion.php');

        session_start();
        if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
        if ($_SESSION['tipo_usuario'] == 2) {
            header("Location: usuario.php");
        }


$sql = "SELECT id, tipo FROM tipo_usuario";
$result = $mysqli->query($sql);

$bandera = false;

if (!empty($_POST)) {
    $nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $tipo_usuario = $_POST['tipo_usuario'];
    $sha1_pass = sha1($password);

    $error = '';

    $sqlUser = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
    $resultUser = $mysqli->query($sqlUser);
    $rows = $resultUser->num_rows;

    if ($rows > 0) {
        $error = "El usuario ya existe";
    } else {

        $sqlPerson = "INSERT INTO personal (nombre) VALUES('$nombre')";
        $resultPerson = $mysqli->query($sqlPerson);
        $idPersona = $mysqli->insert_id;

        $sqlUsuario = "INSERT INTO usuarios (usuario, password, id_personal, id_tipo) VALUES('$usuario','$sha1_pass','$idPersona','$tipo_usuario')";
        $resultUsuario = $mysqli->query($sqlUsuario);

        if ($resultUsuario > 0)
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
        <title>CRUD Operations With PHP and MySql - By Coding Cage</title>
        <script>
            function validarNombre()
            {
                valor = document.getElementById("nombre").value;
                if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
                    alert('Falta Llenar Nombre');
                    return false;
                } else {
                    return true;
                }
            }

            function validarUsuario()
            {
                valor = document.getElementById("usuario").value;
                if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
                    alert('Falta Llenar Usuario');
                    return false;
                } else {
                    return true;
                }
            }

            function validarPassword()
            {
                valor = document.getElementById("password").value;
                if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
                    alert('Falta Llenar Password');
                    return false;
                } else {
                    valor2 = document.getElementById("con_password").value;

                    if (valor == valor2) {
                        return true;
                    } else {
                        alert('Las contraseña no coinciden');
                        return false;
                    }
                }
            }

            function validarTipoUsuario()
            {
                indice = document.getElementById("tipo_usuario").selectedIndex;
                if (indice == null || indice == 0) {
                    alert('Seleccione tipo de usuario');
                    return false;
                } else {
                    return true;
                }
            }

            function validar()
            {
                if (validarNombre() && validarUsuario() && validarPassword() && validarTipoUsuario())
                {
                    document.registro.submit();
                }
            }

        </script>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <center>

            <div id="header">
                <div id="content">
                    <label>CRUD Operations With PHP and MySql - <a href="http://www.codingcage.com" target="_blank">By Coding Cage</a></label>
                </div>
            </div>
            <div id="body">
                <div id="content">
                    <form method="post" id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
                        <table align="center">
                            <tr>
                                <td align="center"><a href="index.php">Inicio</a></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="nombre" placeholder="Nombre Completo" required /></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="usuario" placeholder="Nombre de Usuario" required /></td>
                            </tr>
                            <tr>
                                <td><input type="password" name="password" placeholder="Password" required /></td>
                            </tr>
                            <tr>
                                <td><input type="password" name="con_password" placeholder="Confirmar password" required /></td>
                            </tr>
                            <tr> <td> <label>Tipo Usuario:</label>
                                    <select id="tipo_usuario" name="tipo_usuario">
                                                           <?php while ($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['id']; ?>" selected><?php echo $row['tipo']; ?></option>
                                                           <?php } ?>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

        </center>
    </body>
</html>