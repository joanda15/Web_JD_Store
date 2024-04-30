<?php
session_start();

// Verificar si se recibieron los datos del producto por POST
if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['imagen']) && isset($_POST['descripcion']) && isset($_POST['precio'])) {
    // Obtener los datos del producto enviados desde el formulario
    $id = $_POST['id'];
    $nombre = urldecode($_POST['nombre']);
    $imagen = urldecode($_POST['imagen']);
    $descripcion = urldecode($_POST['descripcion']);
    $precio = $_POST['precio'];

    // Crear un arreglo asociativo con los datos del producto
    $producto = array(
        'id' => $id,
        'nombre' => $nombre,
        'imagen' => $imagen,
        'descripcion' => $descripcion,
        'precio' => $precio
    );

    // Agregar el producto al carrito almacenado en la variable de sesión
    if(isset($_SESSION['carrito'])) {
        // Si ya hay productos en el carrito, agregar el nuevo producto al arreglo existente
        $_SESSION['carrito'][] = $producto;
    } else {
        // Si no hay productos en el carrito, inicializar el carrito con el nuevo producto
        $_SESSION['carrito'] = array($producto);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titulo, autor e icono -->
    <title>Carrito de compras</title>
    <meta name="author" content="Joan David Gomezjurado Sánchez">
    <link rel="icon" href="imgs/img/logo.png" type="icono">
    <!-- Links externos -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/carritoCompras.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="imgs/img/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
            </a>
            Bienvenido al carrito de compras
        </div>
    </nav>
    <div class="textoInformativo">
        <h1>Lista de prendas</h1>
    </div>

    <!-- Lista de productos en el carrito -->
    <div class="listaProductos d-flex flex-wrap justify-content-center text-center">
        <?php
        // Variable para almacenar el total de precios de los productos en el carrito
        $totalPrecio = 0;

        // Verificar si hay productos en el carrito almacenados en la variable de sesión
        if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            echo '<div class="productos-container">'; // Contenedor de productos
            // Iterar sobre cada producto en el carrito y mostrarlo en la lista
            foreach($_SESSION['carrito'] as $producto) {
                echo "<div class='producto'>";
                echo "<h2>{$producto['nombre']}</h2>";
                // echo "<img src='{$producto['imagen']}' alt='Producto' width='200'>";
                echo "<p>{$producto['descripcion']}</p>";
                echo "<p>Precio: {$producto['precio']}</p>";
                echo "</div>";

                // Sumar el precio del producto al total
                $totalPrecio += $producto['precio'];
            }
            echo '</div>'; // Cierre del contenedor de productos
        } else {
            // Mostrar un mensaje si no hay productos en el carrito
            echo "<p>No hay productos en el carrito</p>";
        }
        ?>
    </div>
    <!-- Informacion de pago -->
    <div class="listaProductos" style="display: flex; justify-content: space-evenly; text-align: center;">
        <!-- Mostrar el total de precios -->
        <div class="totalPrecio">
            <h3>Total:</h3>
            <p>$<?php echo $totalPrecio; ?></p>
        </div>
        <!-- Mostrar el contador del número de prendas -->
        <div class="contadorPrendas">
            <h3>Número de prendas en el carrito:</h3>
            <p><?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?></p>
        </div>
        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#pagoAceptar">Pagar</button>
    </div>
    
    <!-- Modal pago -->
    <div class="modal fade" id="pagoAceptar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="pagoFondo">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h3>Total a pagar</h3>
                <p>$<?php echo $totalPrecio; ?></p>
                <h3>Seleccione su metodo de pago</h3>
                <select class="form-select" aria-label="Default select example">
                    <option value="1">Tarjeta de crédito</option>
                    <option value="2">Efecty</option>
                    <option value="3">Nequi</option>
                </select>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" onclick="generarFactura()">Pagar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Archivos script -->
    <script>
        function agregarAlCarrito(id, nombre, precio) {
    // Realizar la solicitud AJAX para agregar la prenda al carrito
    $.ajax({
        url: 'agregarAlCarrito.php', // URL del script PHP que maneja la adición al carrito
        method: 'POST',
        data: {
            id: id,
            nombre: nombre,
            precio: precio
        },
        success: function(response) {
            // Mostrar un mensaje de alerta cuando la prenda se haya agregado correctamente
            alert('Prenda añadida correctamente al carrito');
        },
        error: function(xhr, status, error) {
            // Manejar errores en caso de que ocurra algún problema durante la solicitud AJAX
            console.error(xhr.responseText);
            alert('Ha ocurrido un error al añadir la prenda al carrito');
        }
        });
        }
    </script>

    <!-- Script pago -->
    <script>
    function generarFactura() {
        // Obtener el total a pagar
        var totalPagar = <?php echo $totalPrecio; ?>;
        
        // Redirigir a la página de factura con los datos necesarios en la URL
        window.location.href = 'facturaPago.php?total=' + totalPagar;
    }
    </script>
    <script src="scripts/validacionPerfilUsuario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
