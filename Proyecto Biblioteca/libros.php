<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
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
    <!-- Contenido de la página -->
    <div class="container">
        <div class="row">
            <?php
            $server = "sql111.infinityfree.com";
            $user = "if0_36286967";
            $pass = "jhonnys1204";
            $db = "if0_36286967_libreria";

            // conexión
            $conn = new mysqli($server, $user, $pass, $db);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Consulta SQL para obtener todos los títulos
            $query = "SELECT * FROM titulos";
            $result = $conn->query($query);

            // Verificar si se obtuvieron resultados
            if ($result->num_rows > 0) {
                // Iterar sobre los resultados y generar tarjetas HTML
                while ($row = $result->fetch_assoc()) {
                    // Generar una tarjeta para cada libro
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="imgs/libro1.jpg" alt="libro" class="img-card3" style="display: block; margin: 0 auto;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['titulo'] . '</h5>';
                    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-tipo="' . $row['tipo'] . '" data-avance="' . $row['avance'] . '" data-precio="' . $row['precio'] . '">Ver Información</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No se encontraron resultados.";
            }

            // Cerrar conexión
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información del Libro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Tipo:</strong> <span id="tipo"></span></p>
                    <p><strong>Avance:</strong> <span id="avance"></span></p>
                    <p><strong>Precio:</strong> <span id="precio"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
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
