<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo3.css" rel="stylesheet">
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
    </nav>        <header id="imagen-fondo" style="height: 100vh;width:250vh; background-image: url('imgs/imgfondo.jpg'); background-size: cover; background-position: center;">
</header>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $server = "sql111.infinityfree.com";
    $user = "if0_36286967";
    $pass = "jhonnys1204";
    $db = "if0_36286967_libreria";

    $conn = new mysqli($server, $user, $pass, $db);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    // Validar campos obligatorios
    if (empty($nombre) || empty($correo) || empty($asunto) || empty($mensaje)) {
        echo '<div class="alert alert-danger" role="alert">Los campos obligatorios deben ser completados.</div>';
    } else {
        // consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO contactos (nombre, correo, asunto, mensaje) VALUES ('$nombre', '$correo', '$asunto', '$mensaje')";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            // Mostrar mensaje de éxito
            echo '<div class="alert alert-success" role="alert">Tu mensaje ha sido enviado con éxito.</div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Cerrar la conexión
    $conn->close();
}
?>
<div class="container">
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="cta-inner bg-faded rounded">
                <!-- Container para pantallas grandes -->
                <div class="container d-none d-md-block">
                    <h2 class="section-heading text-center mb-3">
                        <span class="section-heading-upper mb-1">¿Tienes preguntas?</span>
                        <span class="section-heading-lower">¡Contáctanos!</span>
                    </h2>
                </div>

                <!-- Container para pantallas móviles -->
                <div class="container d-md-none">
                    <h2 class="section-heading text-center mb-3">
                        <span class="section-heading-upper mb-1">¿Tienes preguntas?</span>
                        <span class="section-heading-lower" style="font-size: 30px">¡Contáctanos!</span>
                    </h2>
                </div>
                <div class="alert alert-danger d-none" id="error-message" role="alert">
                    Los campos obligatorios deben ser completados.
                </div>
                <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="text-center">
                        <label class="mb-4">
                            <small><em>Llena los campos para enviar un correo electrónico. Todos los campos con el asterisco ('*') son obligatorios.</em></small>
                        </label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <label for="nombre">Nombre <sup>*</sup></label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre *" maxlength="20" minlength="3"> 

                    </div>
                
                    <div class="form-floating mb-3 mt-3">
                        <label for="correo">Correo electrónico <sup>*</sup></label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electrónico *"> 
                    </div>
                    
                    <div class="form-floating mb-3 mt-3">
                        <label for="asunto">Asunto <sup>*</sup></label>
                        <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto *" maxlength="50"> 
                    </div>

                    <div class="form-floating mb-4 mt-3">
                        <label for="message">Mensaje <sup>*</sup></label>
                        <textarea class="form-control" id="messagebox" name="mensaje" placeholder="Mensaje *" maxlength="500" style="height: 200px"></textarea> 
                    </div>

                    <div class="text-center">
                        <button class="btn btn-outline-dark btn-lg" type="button" name="Guardar" id="enviarButton">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--footer-->
<footer class="footer">
    <div class="footer-content">
        <img src="imgs/biblioteca-en-linea.png" alt="Icono" class="footer-icon">
        <div class="footer-text">
            <p class="m-0 small">Biblioteca Jhon</p>
            <p class="m-0 small">Copyright ©2024 - Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<!-- Modal de Agradecimiento -->
<div class="modal fade" id="agradecimientoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¡Gracias por tu mensaje!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tu mensaje ha sido enviado con éxito.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#enviarButton').click(function() {
            if ($('#nombre').val() == '' || $('#correo').val() == '' || $('#asunto').val() == '' || $('#messagebox').val() == '') {
                $('#error-message').removeClass('d-none');
            } else {
                $('#error-message').addClass('d-none');
                $('#contact-form').submit();
                $('#agradecimientoModal').modal('show');
            }
        });
    });
</script>

</body>
</html>
