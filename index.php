<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGINA PRINCIPAL</title>
    <link rel="stylesheet" href="inicioSesionstyle.css">
</head>
<body>
    <header>
        <div class="policia-container">
            <form method="post" action="validar.php" class="form-policia">
                <h2>Inicio Sesion</h2>
                <!-- text box y label del ingreso de usuario -->
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario">
                <!-- text box y label del ingreso de la contraseña -->
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña">
                <!-- pagina para crear cuenta -->
                <div class="rember">
                    <a href="crearcuenta.php">Crear Cuenta</a>
                </div>
                <!-- pagina para recuperar la contraseña   
                    <div class="rember"> 
                    <a href="olvidecuenta.php">Olvide Contraseña</a>
                    </div>              
                -->
                <input type="submit" name="enviar" value="ingresar">
            </form>
        </div>
        <?php
        ?>
    </header>
</body>
</html>

