<?php
// Incluir archivo de conexión a la base de datos
include "apis/conexionDB.php";

// Verificar si se recibió el parámetro "id" en la URL
if (!empty($_GET["id"])) {
    // Obtener el ID de la URL y sanitizarlo para evitar inyecciones SQL
    $id = $_GET["id"];
    
    // Preparar y ejecutar la consulta para eliminar el registro
    $sql = $conexion->query("DELETE FROM registro WHERE id=$id");
    
    // Verificar si la eliminación fue exitosa
    if ($sql === TRUE) {
        // Se eliminó correctamente
        echo "<div>Cuenta eliminada</div>";
        
        // Redirigir al usuario a index.html después de un breve retraso
        echo '<script>
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 2000); // Redirigir después de 2 segundos
              </script>';
    } else {
        // Ocurrió un error al eliminar
        echo "<div>Error al eliminar</div>";
    }
} else {
    // No se proporcionó el parámetro "id" en la URL
    echo "";
}
?>
