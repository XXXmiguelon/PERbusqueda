<?php
include("conPoliciadb.php");
if(isset($_POST['registrer'])) {
    if (strlen($_POST['name']) >= 1 &&  strlen($_POST['dni']) >= 1 && strlen($_POST['user']) >= 1 && strlen($_POST['password']) >= 1){
        $name = trim($_POST['name']);
        $dni = trim($_POST['dni']);
        $user = trim($_POST['user']);
        $password = trim($_POST['password']);
        $consulta = "INSERT INTO unpolicia (nombreyapellido,dni, usuario,contraseña) VALUES ('$name','$dni','$user','$password')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado) {
            ?>
            <h3 class="ok"> correcta inscripcion </h3>
            <?php
        }     

    }
}
?>