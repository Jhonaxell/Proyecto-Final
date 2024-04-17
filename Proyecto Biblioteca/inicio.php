<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="imgs/biblioteca-en-linea.png">

</head>
<body>
<div class="container-fluid">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">Biblioteca Jhon</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="libros.php">Ver Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="autores.php">Ver Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactanos.php">Contactanos</a>
                    </li>
                    <!-- Agrega el botón de cerrar sesión -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <header id="imagen-fondo" style="height: 100vh;width:250vh; background-image: url('imgs/imgfondo.jpg'); background-size: cover; background-position: center;">
</header>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ver Libros</h5>
                        <img src="imgs/libros.jpg" alt="libro" class="img-card" >
                        <p></p>
                        <p class="card-text">Haz clic para ver todos los libros disponibles en la biblioteca.</p>
                        <a href="libros.php" class="btn btn-primary">Ir a Ver Libros</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ver Autores</h5>
                        <img src="imgs/autor.jpg" alt="autor" class="img-card2" >
                        <p class="card-text">Haz clic para ver todos los autores disponibles en la biblioteca.</p>
                        <a href="autores.php" class="btn btn-primary">Ir a Ver Autores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<<footer class="footer2">
    <div class="footer-content">
        <img src="imgs/biblioteca-en-linea.png" alt="Icono" class="footer-icon">
        <div class="footer-text">
            <p class="m-0 small">Biblioteca Jhon</p>
            <p class="m-0 small">Copyright ©2024 - Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
</body>
</html>
