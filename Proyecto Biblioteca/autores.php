<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estiloautores.css" rel="stylesheet">
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
    </nav></div>
        <header id="imagen-fondo" style="height: 100vh;width:250vh; background-image: url('imgs/imgfondo.jpg'); background-size: cover; background-position: center;">
</header>
<div class="header-container">
    <header class="page-header">
        <h1>Lista de Autores</h1>
    </header>
</div>

<!-- Contenido de la página -->
<section class="container rounded cta about-heading-img mb-3 mb-lg-0">
    <div class="cta">
        <div class="row d-flex justify-content-center scroll-container" style="height: 700px; overflow-y: auto;">
        
            <?php
            $server = "sql111.infinityfree.com";
            $user = "if0_36286967";
            $pass = "jhonnys1204";
            $db = "if0_36286967_libreria";
            
            // Crear conexión
            $conn = new mysqli($server, $user, $pass, $db);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Consulta SQL para obtener todos los autores
            $query = "SELECT * FROM autores";
            $result = $conn->query($query);

            // Verificar si se obtuvieron resultados
            if ($result->num_rows > 0) {
                // Iterar sobre los resultados
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-9 col-sm-2 mt-3 cta-inner d-flex align-items-center justify-content-center bg-faded p-4 rounded mb-3">';
                    echo '<div class="p-1 d-flex align-items-center justify-content-center" style="width: 70px; height: 80px">';
                    echo '<img src="imgs/escritores.png" style="width: 50px">';
                    echo '</div>';
                    echo '<div class="p-2 d-flex align-items-center" style="width: 250px; height: 80px">';
                    echo '<h2 class="section-heading"><span class="section-heading-upper pt-2">' . $row['nombre'] . ' ' . $row['apellido'] . '</span></h2>';
                    echo '</div>';
                    echo '<div class="p-1 d-flex align-items-center justify-content-center" style="width: 130px; height: 80px">';
                    echo '<button type="button" class="btn btn-outline-dark btn p-3 show-author-info" data-toggle="modal" data-target="#exampleModal" data-telefono="' . $row['telefono'] . '" data-direccion="' . $row['direccion'] . '" data-ciudad="' . $row['ciudad'] . '" data-estado="' . $row['estado'] . '" data-pais="' . $row['pais'] . '">Información</button>';
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
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Información del Autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Teléfono:</strong> <span id="telefono"></span></p>
                <p><strong>Dirección:</strong> <span id="direccion"></span></p>
                <p><strong>Ciudad:</strong> <span id="ciudad"></span></p>
                <p><strong>Estado:</strong> <span id="estado"></span></p>
                <p><strong>País:</strong> <span id="pais"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/script2.js"></script>
<!--footer-->
<footer class="footer2">
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