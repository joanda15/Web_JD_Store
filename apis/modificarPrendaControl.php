<?php
// Incluir archivo de conexión a la base de datos
include "conexionDB.php";

// Verificar si se recibieron los datos del formulario
if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio'])) {
    // Sanitizar y asignar los valores recibidos
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    
    // No es recomendable almacenar imágenes directamente en la base de datos, por lo que no se incluye en la actualización

    // Preparar la consulta SQL para actualizar los datos
    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=? WHERE id=?";
    
    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);
    
    // Vincular los parámetros
    $stmt->bind_param("ssii", $nombre, $descripcion, $precio, $id);
    
    // Ejecutar la sentencia
    if($stmt->execute()) {
        // La actualización fue exitosa
        echo "Los datos de la prenda han sido actualizados correctamente.";
    } else {
        // Error al ejecutar la sentencia
        echo "Error al intentar actualizar los datos: " . $stmt->error;
    }
    
    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
} else {
    // Si no se recibieron todos los datos esperados
    echo "Todos los campos son requeridos.";
}
?>
