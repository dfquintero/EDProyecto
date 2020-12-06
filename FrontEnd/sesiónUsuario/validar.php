<?php
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    //conectar a la base
    $conexion=mysqli_connect("localhost","root","","RecidenciaB");
    $consulta="SELECT * FROM perfil WHERE nombre='$usuario' and contrasena='$clave'";
    $resultado=mysqli_query($conexion, $consulta);

    $filas=mysqli_num_rows($resultado);
    if ($filas>0){
        //inicia sesion
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("location:index.php")
    }
    else{
        echo "Error de autenticación";
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>