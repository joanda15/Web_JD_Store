<?php
// Incluir archivo de conexión a la base de datos
include "apis/conexionDB.php";

// Verificar si se recibió el ID del producto a editar
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Preparar la consulta SQL para seleccionar los datos del producto con el ID dado
    $sql = "SELECT * FROM productos WHERE id=?";
    
    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);
    
    // Verificar si la preparación de la sentencia fue exitosa
    if ($stmt) {
        // Vincular el parámetro
        $stmt->bind_param("i", $id);
        
        // Ejecutar la sentencia
        $stmt->execute();
        
        // Obtener el resultado de la consulta
        $result = $stmt->get_result();
        
        // Verificar si se encontraron resultados
        if($result->num_rows > 0) {
            // Se encontraron resultados, mostrar el formulario de modificación
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Prenda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Modificar Prenda</h2>
        <form action="apis/procesarModificacion.php" method="post">
            <?php while($datos = $result->fetch_object()) { ?>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->nombre ?>">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="text" class="form-control" id="imagen" name="imagen" value="<?= $datos->imagen ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion"><?= $datos->descripcion ?></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio" value="<?= $datos->precio ?>">
            </div>
            <input type="hidden" name="id" value="<?= $id ?>">
            <?php } ?>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
<?php
        } else {
            // No se encontró ningún producto con el ID proporcionado
            echo "No se encontró ningún producto con el ID proporcionado.";
        }
        
        // Cerrar la sentencia
        $stmt->close();
    } else {
        // Error al preparar la sentencia
        echo "Error al preparar la consulta SQL.";
    }
} else {
    // Si no se recibió el ID del producto a editar
    echo "Se requiere el ID del producto para realizar la edición.";
}
?>
