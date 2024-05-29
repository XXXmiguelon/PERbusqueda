<?php
// Verificar si se han enviado datos por POST
if(isset($_POST['usuario']) && isset($_POST['contraseña'])) {
    // Asignar los valores de los campos del formulario a variables
    $USUARIO = $_POST['usuario'];
    $CONTRASEÑA = $_POST['contraseña'];

    // Aquí va tu código de conexión a la base de datos y de validación de las credenciales
    // Asegúrate de realizar las consultas a la base de datos de manera segura para prevenir inyecciones SQL
    // y de cifrar las contraseñas antes de almacenarlas en la base de datos
    
    // Ejemplo de conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "dbpolicia");
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Consulta SQL para verificar las credenciales
    $consulta = "SELECT * FROM unpolicia WHERE usuario = '$USUARIO' AND contraseña = '$CONTRASEÑA'";
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si se encontró algún resultado
    if (mysqli_num_rows($resultado) > 0) {
        header("Location: consultaCroto.php");
        exit(); // Importante: detener la ejecución del script después de redirigir
    } else {
        echo "<center> <h1>ERROR DE AUTENTIFICACION</h1> </center>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    // Si no se enviaron los datos por POST, mostrar un mensaje de error
    echo "<center><h1>Error: Datos de inicio de sesión no recibidos</h1></center>";
}
?>