<?php
include('concrotosdb.php');

// Verificar si se ha enviado un nombre para editar
if(isset($_GET['nombreyapellido'])) {
    $nombre = $_GET['nombreyapellido'];
    
    // Consulta para obtener los datos de la persona por su nombre
    $query = mysqli_query($conex, "SELECT * FROM unpersona WHERE nombreyapellido = '$nombre'");
    if (!$query) {
        die("Error en la consulta: " . mysqli_error($conex));
    }

    // Verificar si se encontraron resultados
    if(mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        
        // Verificar si se ha enviado un formulario para procesar la edición
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nuevo_nombre = $_POST['nombreyapellido'];
            $nuevo_apodo = $_POST['apodo'];
            $nuevo_dni = $_POST['dni'];
            
            // Verificar si se cargó una nueva foto
            if ($_FILES['foto']['name']) {
                $foto_tmp = $_FILES['foto']['tmp_name'];
                $foto = addslashes(file_get_contents($foto_tmp));
                // Actualizar la foto en la base de datos
                $actualizar_query = mysqli_query($conex, "UPDATE unpersona SET nombreyapellido = '$nuevo_nombre', apodo = '$nuevo_apodo', dni = '$nuevo_dni', imagen = '$foto' WHERE nombreyapellido = '$nombre'");
            } else {
                // Si no se cargó una nueva foto, actualizar solo los otros campos
                $actualizar_query = mysqli_query($conex, "UPDATE unpersona SET nombreyapellido = '$nuevo_nombre', apodo = '$nuevo_apodo', dni = '$nuevo_dni' WHERE nombreyapellido = '$nombre'");
            }
            
            if ($actualizar_query) {
                echo "Los datos se actualizaron correctamente.";
            } else {
                echo "Error al actualizar los datos: " . mysqli_error($conex);
            }
        }
        
        // Mostrar el formulario de edición
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Persona</title>
            <link rel="stylesheet" href="editarPersonaStyle.css">
        </head>
        <body>
            <header class="encabezado">
                <a href="consultaCroto.php"class="nav-link" >Listados</a>
                <a href=" "class="nav-link" >Salir</a>
            </header>
            <form action="" method="POST" enctype="multipart/form-data">
                <h1 class="titulo-form"> Editar Persona </h1>
                <label for="nombreyapellido">Nombre y Apellido:</label>
                <input type="text" name="nombreyapellido" value="<?php echo $data['nombreyapellido']; ?>"><br>
                <label for="apodo">Apodo:</label>
                <input type="text" name="apodo" value="<?php echo $data['apodo']; ?>"><br>
                <label for="dni">DNI:</label>
                <input type="text" name="dni" value="<?php echo $data['dni']; ?>"><br>
                <label for="foto">Foto:</label>
                <input type="file" name="foto"><br>
                <!-- Agrega más campos según sea necesario -->
                <input type="submit" value="Guardar Cambios">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontraron resultados para el nombre proporcionado.";
    }
} else {
    echo "No se proporcionó un nombre para editar.";
}
?>



