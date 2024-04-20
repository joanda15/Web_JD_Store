<?php
    // Variables para conexion base de datos
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dataBase = "tiendas_jd";
    $port = 3306;
    // Linea Conexion a la base de datos
    $conexion = new mysqli ($serverName , $userName, $password, $dataBase, $port);
    // Condicion que me muestra si la conexion es exitosa o no
    if ($conexion->connect_error) {
        die ("La conexion fallo: " . $conexion->connect_error);
    } else {
        echo "";
    }
?>