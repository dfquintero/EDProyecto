<?php
    session_start();
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    $_SESSION['usuario'] = $usuario;
    //conectar a la base
    $conexion=mysqli_connect("localhost","root","","RecidenciaB");
    $consulta="SELECT * FROM perfil WHERE nombre='$usuario' and contrasena='$clave'";
    $resultado=mysqli_query($conexion, $consulta);

    $filas=mysqli_num_rows($resultado);
    if ($filas>0){
        //inicia sesion
        $identificador="SELECT ID_USUARIO FROM perfil WHERE email='$usuario'";
        $valor="SELECT ID_USUARIO FROM estudiante WHERE ID_USUARIO='$identificador'";
        if ($valor=$identificador){
            header("location:estudiante.html");
        }
        else{
            header("location:propietario.html");
        }
    }
    else{
        //error de autenticacion
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>
