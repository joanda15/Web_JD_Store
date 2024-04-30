<?php
// Conexión a la base de datos
include "conexionDB.php";

// Verificar si se proporcionó la ruta de la imagen
if (isset($_GET['imagen'])) {
    // Obtener la ruta de la imagen desde el parámetro GET y decodificarla
    $ruta_imagen = urldecode($_GET['imagen']);

    // Verificar si el archivo existe
    if (file_exists($ruta_imagen)) {
        // Obtener el tipo MIME de la imagen
        $tipo_mime = mime_content_type($ruta_imagen);

        // Enviar encabezados HTTP para indicar que se está enviando una imagen
        header("Content-Type: $tipo_mime");

        // Leer y enviar el contenido del archivo al navegador
        readfile($ruta_imagen);
    } else {
        // Si el archivo no existe, enviar un mensaje de error
        header("HTTP/1.0 404 Not Found");
        echo "Imagen no encontrada";
    }
} else {
    // Si no se proporcionó la ruta de la imagen, enviar un mensaje de error
    header("HTTP/1.0 400 Bad Request");
    echo "Ruta de imagen no proporcionada";
}
?>
