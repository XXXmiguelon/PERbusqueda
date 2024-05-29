<?php
include('concrotosdb.php');
// Verificar si se ha enviado un término de búsqueda
if(isset($_POST['buscar'])) {
    $buscar = $_POST['buscar'];
    // Consulta modificada para filtrar por el término de búsqueda
    $query = mysqli_query($conex, "SELECT * FROM unpersona WHERE nombreyapellido LIKE '%$buscar%' OR apodo LIKE '%$buscar%' OR dni LIKE '%$buscar%'");
    if (!$query) {
        die("Error en la consulta: " . mysqli_error($conex));
    }
} else {
    // Consulta sin filtro
    $query = mysqli_query($conex, "SELECT * FROM unpersona");
    if (!$query) {
        die("Error en la consulta: " . mysqli_error($conex));
    }
}

// Verificar si se ha enviado un formulario para insertar o modificar datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí puedes manejar la inserción o modificación de datos
    // Por ejemplo, puedes obtener los datos del formulario y ejecutar una consulta SQL correspondiente
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>personajes de Victoria</title>
    <link rel="stylesheet" href="consultaCrotoStyles.css">
</head>    
<body>
    <!-- encabezado de redireccion para salir o agregar una persona -->
    <header class="encabezado">
        <a href="agregarPersona.php" class="nav-link">Cargar Persona</a>
        <a href="salir.php" class="nav-link">Salir</a>
    </header> 
    <h1>INFORMACION</h1>
    <form action="consultaCroto.php" method="POST" class="form-consulta">
        <!-- caja de busqueda de las personas -->
       <input type="text" name="buscar" class="box-buscar">
       <input type="submit" value="Buscar" class="btn-buscar">
    </form>
    <table class="tabla">
        <thead>
            <tr>
                <!-- Columna relacional donde se ve toda la parte de adelante -->
                <th>Nombre y Apellido</th>
                <th>Apodo</th>
                <th>dni</th>
                <th>Fotografia</th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
            <?php
                // Verificar si $query está definido y no es nulo
                if (isset($query) && $query) {
                    $resultado = mysqli_num_rows($query);
                    if ($resultado > 0){
                        while($data = mysqli_fetch_array($query)){
                            ?>
                            <!-- mostrar INFORMACION de todas las personas -->
                            <tr align="center">
                                <td><?php echo $data['nombreyapellido'] ?></td>
                                <td><?php echo $data['apodo'] ?></td>
                                <td><?php echo $data['dni'] ?></td>
                                <td><img height="250px" width="250px" src="data:image/jpg;base64, <?php echo base64_encode($data['imagen'])?>"></td>
                                    <!-- modificar esto y que sea un btn no un link por el resto esta bien -->
                                <td>
                                    <a href="editarPersona.php?nombreyapellido=<?php echo urlencode($data['nombreyapellido']); ?>" class="btn-editar" >Editar</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron resultados</td></tr>";
                    }
                } else {
                    echo "La consulta no se realizó correctamente.";
                }
            ?>
        </tbody>
    </table>  
</body>
</html>
