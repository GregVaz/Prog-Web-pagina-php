<?php
    include('includes/utilerias.php');

    if(!verificarAcceso()){
        redireccionar('Ya haz iniciado sesion', 'principal-page.php');
        return;
    }

    $user = $_POST['user'];
    $pass = $_POST['password'];

    $sql = include('../../config/database.php');
        
    $consulta = "SELECT * FROM usuario where user_id = '$user'";

    if (!$resultado = $sql->query($consulta)) {
        include('error-page.php');
        exit;
    }

    if ($resultado->num_rows === 0) {
        redireccionar("Usuario y/o contrasena incorrectos", "access-page.php");
        exit;
    }

    $usuario = $resultado->fetch_assoc();

    if($usuario['user_password'] == $pass){
        redireccionar("Bienvenido<br>Administrador", "principal-page.php");
        $_SESSION['usuario'] = $usuario['user_name'];
    } else {
        redireccionar("Usuario y/o contrasena incorrectos", "access-page.php");
    }
        
    mysqli_close( $sql );


?>