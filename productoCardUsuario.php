<?php
// Lógica para recuperar información o procesar datos
$nombreProducto = "Elije tú";
$precioProducto = "Prenda";
?>

<div class="producto">
    <h2><?php echo $nombreProducto; ?></h2>
    <p><?php echo $precioProducto; ?></p>
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
                    <table class="table bg-secondary border-1">
                        <tr class="grid gap-3">
                            <td class="text-light">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Nombre:</span>
                                    <?= $datos->nombre ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="grid gap-3">
                        <td class="bg-gradient text-light">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Imagen:</span>
                                    <div class="flex-column">
                                        <img src="apis/imagen.php?imagen=<?= urlencode($datos->imagen) ?>" alt="Prenda" width="200">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="grid gap-3">
                            <td class="bg-gradient text-light">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Descripción:</span>
                                    <?= $datos->descripcion ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="grid gap-3">
                            <td class="bg-gradient text-light">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">Precio:</span>
                                    <?= $datos->precio ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="grid gap-3">
                            <td class="d-flex">
                                <!-- Formulario envio a carritp -->
                                <form action="carritoCompras.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $datos->id ?>">
                                    <input type="hidden" name="nombre" value="<?php echo urlencode($datos->nombre) ?>">
                                    <input type="hidden" name="imagen" value="<?php echo urlencode($datos->imagen) ?>">
                                    <input type="hidden" name="descripcion" value="<?php echo urlencode($datos->descripcion) ?>">
                                    <input type="hidden" name="precio" value="<?php echo $datos->precio ?>">
                                    <button type="submit" class="m-1 btn btn-small btn-warning">
                                        <i class="fa-solid fa-cart-shopping"></i> Añadir al carrito
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php }
            ?>
        </tbody>
    </table>
    <!-- Scripts -->
    <script>
    </script>

</body>
</html>