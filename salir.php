<?php
session_start(); // Iniciar la sesión si no se ha iniciado aún

if(isset($conex)) {
    mysqli_close($conex);
}

// Finalizar la sesión
session_destroy();

// Redireccionar al usuario al archivo main.php
header("Location: index.php");
exit; // Asegurarse de que el script se detenga después de la redirección
?>
