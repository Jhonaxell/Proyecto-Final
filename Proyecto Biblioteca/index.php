<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/stiloindex.css">
    <style>
        .password-toggle-btn {
            position: relative;
            width: 50px;
            font-size: 12px;

        }
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var passwordVisibilityButton = document.getElementById("passwordVisibility");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordVisibilityButton.textContent = "Ocultar";
            } else {
                passwordInput.type = "password";
                passwordVisibilityButton.textContent = "Ver";
            }
        }

        function validarFormulario() {
            var username = document.getElementsByName("username")[0].value.trim();
            var password = document.getElementsByName("password")[0].value.trim();
            var errorMessages = document.getElementsByClassName("error-message");

            // Ocultar mensajes de error anteriores
            for (var i = 0; i < errorMessages.length; i++) {
                errorMessages[i].style.display = "none";
            }

            var isValid = true;

            if (username === '') {
                document.getElementById("username-error").style.display = "block";
                isValid = false;
            }

            if (password === '') {
                document.getElementById("password-error").style.display = "block";
                isValid = false;
            }

            return isValid;
        }
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validarFormulario()">
            <input type="text" name="username" placeholder="Nombre de usuario" >
            <div class="error-message" id="username-error" style="display: none;">Por favor ingresa algo valido.</div>
            <div style="position: relative;">
                <input type="password" name="password" id="password" placeholder="Contraseña" >
                <div class="error-message" id="password-error" style="display: none;">Por favor ingresa tu contraseña.</div>

                <button type="button" id="passwordVisibility" class="password-toggle-btn" onclick="togglePassword()">Ver</button>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>

    <?php
    session_start();

    // Verificar si el usuario ha enviado el formulario
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

        // Obtener el nombre de usuario y contraseña enviados por el formulario
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Consulta SQL para verificar las credenciales del usuario
        $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Inicio de sesión exitoso
            $_SESSION["username"] = $username;
            header("Location: inicio.php"); // Redirigir al usuario a la página de inicio después del inicio de sesión exitoso
        } else {
            // Nombre de usuario o contraseña incorrectos
            echo '<script>alert("Nombre de usuario o contraseña incorrectos");</script>';
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>
</body>
</html>
