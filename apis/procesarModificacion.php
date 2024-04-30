<?php
// Incluir archivo de conexión a la base de datos
include "conexionDB.php";

// Verificar si se recibieron los datos del formulario de modificación
if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['imagen']) && isset($_POST['descripcion']) && isset($_POST['precio'])) {
    // Sanitizar y asignar los valores recibidos
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Preparar la consulta SQL para actualizar los datos
    $sql = "UPDATE productos SET nombre=?, imagen=?, descripcion=?, precio=? WHERE id=?";
    
    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);
    
    // Verificar si la preparación de la sentencia fue exitosa
    if($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("ssssi", $nombre, $imagen, $descripcion, $precio, $id);
        
        // Ejecutar la sentencia
        if($stmt->execute()) {
            // La actualización fue exitosa
            echo '<script>alert("Los cambios han sido guardados correctamente.");</script>';
            echo '<script>window.location.href = "../perfilAdmin.php";</script>';
        } else {
            // Error al ejecutar la sentencia
            echo "Error al intentar actualizar los datos: " . $stmt->error;
        }
        
        // Cerrar la sentencia
        $stmt->close();
    } else {
        // Error al preparar la sentencia
        echo "Error al preparar la consulta SQL: " . $conexion->error;
    }
} else {
    // Si no se recibieron todos los datos esperados
    echo "Todos los campos son requeridos.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
