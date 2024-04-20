<?php
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "tiendas_jd");
    // Verificar la conexión
    if (!$conexion) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }
    // Procesar los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    // Procesar la imagen
    $imagen = $_FILES['imagen']['name'];
    $ruta_imagen = "C:/xampp/htdocs/Projects_web/webJDStore/imgs/prendas/" . $imagen; // Ruta de imagen
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen);
    // Insertar datos en la base de datos
    $sql = "INSERT INTO productos (nombre, imagen, descripcion, precio) VALUES ('$nombre', '$ruta_imagen', '$descripcion', '$precio')";
    // Condicion
    if (mysqli_query($conexion, $sql)) {
        echo '<script>alert("Producto guardado correctamente.");
                window.location = "../perfilAdmin.php";
                </script>';
    } else {
        echo "Error al guardar el producto: " . mysqli_error($conexion);
    }
    // Cerrar la conexión
    mysqli_close($conexion);
?>
