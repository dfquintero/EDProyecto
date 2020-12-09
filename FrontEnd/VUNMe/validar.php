<?php
include ("cn.php");
    session_start();
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    $_SESSION['usuario'] = $usuario;
    //conectar a la base
    $consulta="SELECT * FROM perfil WHERE email='$usuario' and contrasena='$clave'";
    $resultado=mysqli_query($conn, $consulta);

    $identificador="SELECT ID_USUARIO FROM estudiante WHERE ID_USUARIO=(SELECT ID_USUARIO FROM perfil WHERE email='$usuario')";
    $compara1=mysqli_query($conn, $identificador);
    
    $filas=mysqli_num_rows($resultado);
    
    if ($filas>0){
        //inicia sesion
        $filas=mysqli_num_rows($compara1);
        if ($filas>0){
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
    mysqli_close($conn);
?>
