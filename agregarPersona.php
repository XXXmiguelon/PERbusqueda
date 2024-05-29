<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Persona</title>
    <link rel="stylesheet" href="agregarPersonaStyle.css">
</head>
<!-- tabla para agregar personas nuevas -->
<body>
    <header class="encabezado">
        <!-- navegador para el listado o para salir de la pagina  -->
        <div class="links">
            <a href="consultaCroto.php" class="nav-link">Listados</a>
            <a href="salir.php" class="nav-link">Salir</a>
        </div>
    </header>
    <div class="container">
        <!--formulario de ingreso de la persona a registrar -->
        <form method="post" enctype="multipart/form-data" class="form-container">
            <h2>Agregar Persona</h2>
            <!--todos los inputs box y texts de las personas -->
            <input type="text" name="name" placeholder="Nombre y Apellido">
            <input type="text" name="apodo" placeholder="Apodo">
            <input type="text" name="dni" placeholder="DNI" >
            <input type="file" name="imagen" placeholder="Fotografia">
            <input type="submit" name="registrer">
        </form>
    </div>
    <!--accion para guardar la persona cargada  -->
    <?php
    include("registrarCroto.php")
    ?>
</body>
</html>