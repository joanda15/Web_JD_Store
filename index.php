<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadato de simbolo universal y escala -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titulo, autor e icono -->
    <title>Tienda de Ropas JD Store</title>
    <meta name="author" content="Joan David Gomezjurado Sánchez">
    <link rel="icon" href="imgs/img/logo.png" type="icono">
    <!-- Links externos -->
    <link rel="stylesheet" href="styles/styleIndex.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-light fixed-top sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="imgs/img/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-danger me-2">Menu</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="navbar-brand text-dark" href="#Nosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand text-dark" href="#Promociones">Promociones</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="navbar-brand dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catalogo
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#shorts">Shorts</a></li>
                            <li><a class="dropdown-item" href="#vestidos">Vestidos</a></li>
                            <li><a class="dropdown-item" href="#calzado">Calzado</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand text-dark" href="#Contactos">Contactos</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand text-dark" role="button" data-bs-toggle="modal" data-bs-target="#modalAdmin">Administrador</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="Search">
                    <button class="btn btn-outline-danger me-2" type="submit">Buscar</button>
                </form>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <img src="imgs/icons/BotonUser.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
                </button>
            </div>
        </div>
    </nav>
    <!-- Modal ingreso Admin-->
    <div class="modal fade" id="modalAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresa las credencias</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form id="ingresoAdmin" action="apis/ingresarAdmin.php" method="POST" class="border-bottom border-secondary-emphasis pb-3">
                        <div class="mb-3">
                            <label for="idAdmin" class="form-label">Identificacion</label>
                            <input type="text" class="form-control" id="idAdmin" name="idAdmin" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="passAdmin" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="passAdmin" name="passAdmin" required>
                        </div>
                        <button class="btn btn-danger">Ingresar</button>
                    </form>  

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Registro e ingreso Usuario -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Bienvenido, por favor registrate o ingresa para eralizar compras</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Registro e ingreso Usuario -->
                <div class="modal-body text-center">
                    <!-- Registro Usuario -->
                    <h1 class="TextoTitulo text-light">Regístrate</h1>
                    <form id="formularioRegistro" class="needs-validation border-bottom border-secondary-emphasis pb-3" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" autocomplete="name" aria-label="Nombre" required>
                            <div class="invalid-feedback">Por favor ingresa tu nombre.</div>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" aria-label="Apellido" required>
                            <div class="invalid-feedback">Por favor ingresa tu apellido.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" autocomplete="email" aria-describedby="emailHelp" required>
                            <div class="invalid-feedback">Por favor ingresa un email válido.</div>
                        </div>
                        <div class="mb-3">
                            <label for="adress" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="adress" aria-label="Dirección" required>
                            <div class="invalid-feedback">Por favor ingresa tu dirección.</div>
                        </div>
                        <div class="mb-3">
                            <label for="passC" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="passC" required>
                            <div class="invalid-feedback">Por favor ingresa tu contraseña.</div>
                        </div>
                        <button type="submit" class="btn btn-danger">Registrarse</button>
                    </form>
                    <!-- Ingreso -->
                    <div class="ingreso">
                        <h1 class="TextoTitulo text-light">Ingresa</h1>
                        <form id="loginForm" action="apis/ingresarPerfilUsuario.php" method="POST" class="border-bottom border-secondary-emphasis pb-3">
                            <div class="mb-3">
                                <label for="correo" class="form-label">Email</label>
                                <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <button class="btn btn-danger">Ingresar</button>
                        </form>            
                        <a class="text-danger text-decoration-none" href="" data-bs-toggle="modal" data-bs-target="#Modalrecuperacion">¿Olvidaste tú contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal actualizar contraseña -->
    <div class="modal fade" id="Modalrecuperacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="margin: auto;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Para recuperar tu contraseña por favor ingresa tu Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="apis/actualizarPassword.php" method="POST">
                        <div class="mb-3">
                            <label for="emailRecuperacion" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailRecuperacion" name="emailRecuperacion" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Imagen de presentacion -->
    <div class="Nosotros d-flex align-items-center" id="Nosotros">
        <h1 class="text-light text-center">Somos la tienda virtual de prendas líder en el mercado virtual</h1>
        <img src="imgs/img/PresentacionImg.png" alt="portada">
    </div>
    <!-- Carrousel -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imgs/prendas/calzado3.webp" class="d-block w-100" alt="Tacones">
            </div>
            <div class="carousel-item">
                <img src="imgs/prendas/short2.jpg" class="d-block w-100" alt="Short">
            </div>
            <div class="carousel-item">
                <img src="imgs/prendas/vestido3.webp" class="d-block w-100" alt="Vestido">
            </div>
        </div>
    </div>
    <!-- Promociones -->
    <div class="Promociones" id="Promociones">
        <div class="textoPromociones">
            <a href="#promocionesLista">Rebajas</a>
            <br>
            <a href="#promocionesLista">%</a>
            <br>
            <a href="#promocionesLista">Promociones</a>
        </div>
        <img style="width: 50%;" src="imgs/img/PromocionesImg.png" alt="imgPromociones">
    </div>
    <!-- Calatalogo -->
    <div class="CatalogoImg" id="CatalogoImg">
        <a href="#shorts">
            <img src="imgs/icons/Shorts.png" alt="">
        </a>
        <a href="#vestidos">
            <img src="imgs/icons/Vestidos.png" alt="">
        </a>
        <a href="#calzado">
            <img src="imgs/icons/Calzado.png" alt="">
        </a>
    </div>
    <!-- Componente de Promociones -->
    <div class="TextoTitulo" id="promocionesLista">
        <h1>Promociones</h1>
    </div>
    <!-- Tarjeta prenda-->
    <div class="card-group">
        <!-- Tarjeta 1 -->
        <div class="card" style="width: 18rem;">
            <div class="prendaCard">
                <?php
                // Inclusion productoCard.php
                include 'productoCard.php';
                ?>
            </div>
        </div>
        <!-- Tarjeta 2 -->     
    </div>
    <!-- Componente de Catalogo -->
    <div class="TextoTitulo">
        <h1>Catologo</h1>
    </div>
    <!-- Tarteja prenda -->

    <!-- Shorts -->
    <H1 class="tituloCatalogo" id="shorts">Shorts</H1>
    <!-- Vestidos -->
    <H1 class="tituloCatalogo" id="vestidos">Vestidos</H1>
    <!-- Calzado -->
    <H1 class="tituloCatalogo" id="calzado">Calzado</H1>
    <!-- Contactos -->
    <div class="TextoTitulo">
        <h1>Contactos</h1>
    </div>
    <div class="Contactos" id="Contactos">
        <img src="imgs/img/logo.png" alt="">
        <div class="ItemsContactos">
            <div class="Redes">
                <a href="https://web.whatsapp.com/" target="_blank"><img src="imgs/icons/BtnWhatsaap.png" alt="WhatsApp"></a>
                <a href="https://maps.app.goo.gl/MivjpRBbmzjmNhDZ6" target="_blank"><img src="imgs/icons/BtnLocalizacion.png" alt="Localización"></a>
                <a href="https://www.instagram.com/" target="_blank"><img src="imgs/icons/BtnInstagram.png" alt="Instagram"></a>
            </div>
            <div class="Mensajes">
                <!-- Formulario de mensajes -->
                <form class="Formulario" id="formularioMensajes">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nameMensaje" name="name" autocomplete="name" placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailMensaje" name="email" autocomplete="email" placeholder="Ingrese su email" required>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment" placeholder="Escriba su mensaje" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="Footer">
        <img src="imgs/img/logoDev.png" alt="">
        <h4>eCommerce jD Store - Software desarrollado por DevFile Joan David Gomezjurado Sánchez</h3>
    </div>
    <!-- Archivos script externos -->
    <script src="scripts/index.js"></script>
    <script src="scripts/registroPerfilUsuario.js"></script>
    <script src="scripts/modeloObjetoTarjeta.js"></script>
    <script src="scripts/registrarTarjeta.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>