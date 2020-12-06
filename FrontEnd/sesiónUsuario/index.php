<?php
    session_start();
    $varsesion = $_SESSION['usuario']
    error_reporting(0);
    if($varsesion==null || $varsesion = ''){
        echo 'usuario no registrado';
        die();
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    </head>

    <body>
        <h1>Bienvenido: <?php echo $_SESSION['usuario'] ?> </h1>
        <a href="cerrar.php">Cerrar sesión</a>
    </body>
</html>