<?php
// Obtener el total de la factura de la URL si se proporciona
$totalPagar = isset($_GET['total']) ? $_GET['total'] : 0;

// Datos del cliente
$nombre = "Joan David";
$apellido = "Gomezjurado";
$email = "jogo@soy.sena.edu.co";
$direccion = "Prados norte calle 21";

// Calcular el subtotal y el IVA (asumiendo un 19%)
$subtotal = $totalPagar / 1.19;
$iva = $totalPagar - $subtotal;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titulo, autor e icono -->
    <title>Factura generada</title>
    <meta name="author" content="Joan David Gomezjurado Sánchez">
    <link rel="icon" href="imgs/img/logo.png" type="icono">
    <!-- Links externos -->
    <link rel="stylesheet" href="styles/carritoCompras.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/72c5de2413.js" crossorigin="anonymous"></script>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="imgs/img/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
            </a>
            Factura generada
        </div>
    </nav>
    <div class="textoInformativo">
        <h1>Su factura</h1>
    </div>
    <!-- Factura -->

    <div class="m-3">
    <h2>Factura de Pago</h2>

    <!-- Datos del cliente -->
    <div>
        <p><strong>Nombre del Cliente:</strong> <?php echo $nombre . " " . $apellido; ?></p>
        <p><strong>Correo Electrónico:</strong> <?php echo $email; ?></p>
        <p><strong>Dirección:</strong> <?php echo $direccion; ?></p>
    </div>

    <br>

    <table>
        <thead>
        <table>
    <thead>
        <tr>
            <th>Nombre Producto</th>
            <th>Cantidad</th>
            <th>IVA</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tacones Lisos</td>
            <td>1</td>
            <td>$16,150</td>
            <td>$68,850.00</td>
            <td>$85,000.00</td>
        </tr>
    </tbody>
    <tbody>
        <tr>
            <td>Tacones Lisos</td>
            <td>1</td>
            <td>$16,150</td>
            <td>$68,850.00</td>
            <td>$85,000.00</td>
        </tr>
    </tbody>
</table>

        </thead>
        <tbody>
            <!-- Aquí puedes generar dinámicamente las filas de la tabla con los productos del carrito -->
        </tbody>
    </table>

    <br>

    <div>
        <p><strong>Total a Pagar:</strong> <?php echo $totalPagar; ?></p>
    </div>

    <br>

    <button onclick="enviarCorreo()"><i class="fa-regular fa-share-from-square"></i></button>
    <button onclick="imprimir()"><i class="fa-solid fa-print"></i></button>
</div>



    <script>
        function enviarCorreo() {
            // Dirección de correo electrónico
            var destinatario = 'correo@ejemplo.com';
            // Asunto del correo
            var asunto = 'Factura de Pago';
            // Cuerpo del correo (contenido)
            var cuerpo = `
                Hola,

                Adjunto encontrarás la factura de pago.

                Saludos,
                [Tu Nombre]
            `;
            // Construye el enlace mailto con los datos
            var enlace = 'mailto:' + destinatario + '?subject=' + encodeURIComponent(asunto) + '&body=' + encodeURIComponent(cuerpo);
            // Abre el cliente de correo predeterminado con los datos proporcionados
            window.location.href = enlace;
        }

        function imprimir() {
            // Código para imprimir la factura
            window.print();
        }
    </script>
</body>
</html>
