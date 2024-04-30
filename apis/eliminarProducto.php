<?php
// Incluir archivo de conexión a la base de datos
include "conexionDB.php";

// Verificar si se recibió el ID del producto a eliminar
if(isset($_GET['id'])) {
    // Obtener el ID del producto desde la URL
    $id = $_GET['id'];

    // Preparar y ejecutar la consulta para eliminar el registro
    $sql = "DELETE FROM productos WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Verificar si la eliminación fue exitosa
    if ($stmt->affected_rows > 0) {
        // Redirigir al usuario a perfilAdmin.php después de un breve retraso
        echo '<script>alert("Producto eliminado correctamente.");
                window.location = "../perfilAdmin.php";
                </script>';
    } else {
        // Ocurrió un error al eliminar
        echo "<div>Error al eliminar</div>";
    }

    // Cerrar la conexión y la sentencia preparada
    $stmt->close();
    $conexion->close();
} else {
    // No se proporcionó el parámetro "id" en la URL
    echo "";
}
?>
