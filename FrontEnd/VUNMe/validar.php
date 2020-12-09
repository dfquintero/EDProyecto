<?php
include ("cn.php");
    session_start();
    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    $_SESSION['usuario'] = $usuario;
    //conectar a la base
<<<<<<< HEAD
    $consulta="SELECT * FROM perfil WHERE email='$usuario' and contrasena='$clave'";
    $resultado=mysqli_query($conn, $consulta);
=======
    $conexion=mysqli_connect("localhost","root","","vunme");
    $consulta="SELECT * FROM perfil WHERE nombre='$usuario' and contrasena='$clave'";
    $resultado=mysqli_query($conexion, $consulta);
>>>>>>> 0b172396a74d23c88dbaf9130a502992aa125909

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
