<?php
require_once('../modelo/db_modelo.php');
	require_once('../modelo/usuarios_modelo.php');
	$dbhost = "ca-cdbr-azure-central-a.cloudapp.net"; 
	$dbuser = "be00176cf03501";
	$dbname = "db_administracion";

	mysql_connect($dbhost,$dbuser);
	$gtablas = mysql_list_tables($dbname);
	while (list($bases) = mysql_fetch_row($gtablas)) {
		 <?php
				echo '
			<form class="f1" action="controlador/traertablas.php" class="asidenav">
			<input type="text" name="bases" value="'.$bases.'" style="display:none;"> <br>
			<input class="btn_fam" type="submit" name="bases" value="'.$bases.'"> <br>
			</form>
					';
		?>
	}
?>