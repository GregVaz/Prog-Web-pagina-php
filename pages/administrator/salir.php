<?php

    include('includes/utilerias.php');

    session_start();
    
    if(isset($_SESSION['usuario'])){
        redireccionar('Que tenga un buen dia', 'access-page.php');
        $_SESSION = array();
        session_destroy();
    } else {
        redireccionar('Acceso denegado', 'access-page.php'); 
    }

?>