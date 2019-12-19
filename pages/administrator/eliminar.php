<?php

    include('includes/utilerias.php');  

    if( acceso() ){
        return;
    }

    if(empty($_GET)){
        redireccionar('No existe informacion para guardar', 'principal-page.php?pagina=0');
    }

    $dato = $_GET['id'];

    
    $sql = include('../../config/database.php');

    $consulta = "DELETE FROM pelicula WHERE peli_id = '$dato'";

    $resultado = mysqli_query($sql, $consulta);

    if(!$resultado){
      redireccionar('Sin resultados de pelicula, pongase en contacto con soporte', 'principal-page.php');
    } else {
        redireccionar('Pelicula eliminada correctamente', 'principal-page.php');
    }
?>