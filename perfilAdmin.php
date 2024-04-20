<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadato de simbolo universal y escala -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titulo, autor e icono -->
    <title>Jd Store Admnistrador</title>
    <meta name="author" content="Joan David Gomezjurado Sánchez">
    <link rel="icon" href="imgs/img/logo.png" type="icono">
    <!-- Links externos -->
    <link rel="stylesheet" href="styles/perfilAdmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="Index.php">
                <img src="imgs/img/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
            </a>
            Bienvenido al perfil del Administrador
        </div>
    </nav>
    <!-- Panel de control -->
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3 bg-light text-danger p-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <h1>Panel de control</h1>
            <button class="nav-link active text-dark" id="v-pills-Usuario-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Usuario" type="button" role="tab" aria-controls="v-pills-Usuario" aria-selected="true">Usuario</button>
            <button class="nav-link text-dark" id="v-pills-prendas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-prendas" type="button" role="tab" aria-controls="v-pills-prendas" aria-selected="false">Prendas</button>
            <button class="nav-link text-dark" id="v-pills-ventas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ventas" type="button" role="tab" aria-controls="v-pills-ventas" aria-selected="false">Ventas</button>
            <button class="nav-link text-dark" id="v-pills-factura-tab" data-bs-toggle="pill" data-bs-target="#v-pills-factura" type="button" role="tab" aria-controls="v-pills-factura" aria-selected="false">Reporte de facturacion</button>
            <button class="nav-link text-dark" id="v-pills-cerrar-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cerrar" type="button" role="tab" aria-controls="v-pills-cerrar" aria-selected="false">Cerrar seccion</button>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-Usuario" role="tabpanel" aria-labelledby="v-pills-Usuario-tab" tabindex="0">Usuario</div>
            <div class="tab-pane fade" id="v-pills-prendas" role="tabpanel" aria-labelledby="v-pills-prendas-tab" tabindex="0">
                Prendas
                <!-- Registro de prenda nueva -->
                <form class="p-3" action="apis/registrarTarjeta.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la prenda</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Busca la imagen de la prenda</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Ingrese una breve descripcion de la prenda</label>
                        <textarea name="descripcion" class="form-control" id="descripcion" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio de la prenda</label>
                        <input type="number" step="1" class="form-control" id="precio" name="precio" aria-describedby="emailHelp" required>
                    </div>
                    <button type="submit" class="btn btn-danger" value="Guardar Producto">Guardar prenda</button>
                </form>
                <!-- Tabla prenda -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Referencia</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>            
                        <?php
                        include "apis/conexionDB.php";
                        $sql = $conexion->query("SELECT * FROM productos");
                        while ($datos = $sql->fetch_object()) {?>
                            <tr>
                                <td><?= $datos->id ?></td>
                                <td><?= $datos->nombre ?></td>
                                <td><?= $datos->imagen ?></td>
                                <td><?= $datos->descripcion ?></td>
                                <td><?= $datos->precio ?></td>
                                <td>
                                    <a href="modificarPrenda.php?>id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-nib"></i></a>
                                    <a href="" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="v-pills-ventas" role="tabpanel" aria-labelledby="v-pills-ventas-tab" tabindex="0">Ventas</div>
            <div class="tab-pane fade" id="v-pills-factura" role="tabpanel" aria-labelledby="v-pills-factura-tab" tabindex="0">Facturacion</div>
            <div class="tab-pane fade" id="v-pills-cerrar" role="tabpanel" aria-labelledby="v-pills-cerrar-tab" tabindex="0">
                <a href="index.php">Cerrar</a>
            </div>
        </div>
    </div>
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/72c5de2413.js" crossorigin="anonymous"></script>
</body>
</html>