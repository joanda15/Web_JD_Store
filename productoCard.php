<?php
// Lógica para recuperar información o procesar datos
$nombreProducto = "Prendas";
$precioProducto = "Promociones";
?>

<div class="producto">
    <h2><?php echo $nombreProducto; ?></h2>
    <p>Seccion: <?php echo $precioProducto; ?></p>
    <!-- Otro contenido HTML relacionado con el producto -->
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta</title>
    <!-- Links externos -->
    <script src="https://kit.fontawesome.com/72c5de2413.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Tabla prenda -->
    <table class="table">
        <tbody>            
            <?php
            include "apis/conexionDB.php";
            $sql = $conexion->query("SELECT * FROM productos");
            while ($datos = $sql->fetch_object()) {?>
                <!-- Vertical -->
                <div class="table-responsive">
                    <table class="table bg-light border-1">
                        <tr class="grid gap-3">
                            <td class="text-dark">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Nombre:</span>
                                    <?= $datos->nombre ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="grid gap-3">
                            <td class="text-dark">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Imagen:</span>
                                    <img src="<?= $datos->imagen ?>" alt="Imagen del producto">
                                </div>
                            </td>
                        </tr>
                        <tr class="grid gap-3">
                            <td class="bg-gradient text-dark">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Descripción:</span>
                                    <?= $datos->descripcion ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="grid gap-3">
                            <td class="bg-gradient text-dark">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Precio:</span>
                                    <?= $datos->precio ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="grid gap-3">
                            <td class="d-flex">
                                <a href="" class="m-1 btn btn-small btn-warning"><i class="fa-solid fa-cart-shopping"></i></a>
                                <a href="" class="m-1 btn btn-small btn-warning"><i class="fa-solid fa-bag-shopping"></i></a>
                            </td>
                        </tr>
                    </table>
                </div>

            <?php }
            ?>
        </tbody>
    </table>
    <!-- Scripts -->
</body>
</html>