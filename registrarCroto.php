<?php
include("concrotosdb.php");
if(isset($_POST['registrer'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['apodo']) >= 1 && strlen($_POST['dni']) >= 1 ){
        $name= trim($_POST['name']);
        $apodo = trim($_POST['apodo']); 
        $dni  = trim($_POST['dni']);
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $consulta = "INSERT INTO unpersona (nombreyapellido, apodo, dni, imagen) VALUES ('$name','$apodo','$dni','$imagen')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado) {
            ?>
            <h3 class="ok">correcta inscripcion</h3>
            <?php
        }
    }
}
?>


