<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="Crearstyle.css">
</head>
<body>
    <!-- formulario para el ingreso de los datos del funcionario -->
    <form method="post">
        <h2>Crear Cuenta</h2>
        <!-- input donde va el nombre y Apellido -->
        <input type="text" name="name" placeholder="Nombre y Apellido">
        <!-- input donde va el el dni -->
        <input type="dni" name="dni" placeholder="DNI">
        <!-- input donde va el usuario -->
        <input type="usuario" name="user" placeholder="Usuario">
        <!-- input donde va la contraseña -->
        <input type="password" name="password" placeholder="Contraseña">
        <!-- unput done va la contraseña policial -->
        <input type="password" name="passwordP" placeholder="Contraseña Policial">
         <!-- pagina para crear cuenta -->
        <div class="rember">
            <a href="inicioSesion.php">Inicio Sesion</a>
        </div>
        <!-- boton de registro -->
        <input type="submit" name="registrer">
    </form>
    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si la contraseña policial es igual a le pedida
        if ($_POST["passwordP"] != "INVESTIGACIONES229") {
            echo "<h3>La contraseña policial es incorrecta. Por favor, inténtalo de nuevo.</h3>";
        } else {
            // Aquí puedes procesar el formulario y registrar al usuario
            // Incluye el archivo que maneja el registro
            include("registrarP.php");
        }
    }
    ?>
</body>
</html>


