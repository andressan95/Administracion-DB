<?php
$conexion = mysql_connect('127.0.0.1', 'root', 'root');
mysql_select_db('sesiones', $conexion);
session_start();
?>