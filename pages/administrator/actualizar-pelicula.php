<?php

include('includes/utilerias.php');


if( acceso() ) {
    return;
}

if(empty($_POST)){
    redireccionar('No existe informacion para guardar', 'principal-page.php?pagina=0');
}

$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$fechaRealizacion = $_POST['fechaCreacion'];
$categoria = $_POST['categoria'];
$fechaEstreno = $_POST['fechaEstreno'];
$sinopsis = $_POST['sinopsis'];
$id = $_POST['id'];

$carpetaDestino = "../../assets/peliculas";

if(empty($nombre) || empty($genero) || empty($fechaRealizacion) || empty($categoria) || empty($fechaEstreno) || empty($sinopsis)){
    redireccionar('Datos no validos', 'add-page.php');
    return;
}

$sql = include('../../config/database.php');

$consulta = "UPDATE `pelicula` SET `peli_nombre` = '$nombre', `peli_genero` = '$genero', `peli_fechaCreacion` = '$fechaRealizacion', `peli_categoria` = '$categoria', 
                                    `peli_fechaEstreno` = '$fechaEstreno', `peli_sinopsis` = '$sinopsis' WHERE peli_id = $id";

$resultado = mysqli_query($sql, $consulta);

if($resultado) {
    $resultado = mysqli_query($sql,"SELECT * FROM pelicula WHERE peli_id = $id");
    if(empty($resultado)){
        redireccionar("Pelicula agregada correctamente<br>pero tuvimos un problema en guardar tu imagen. Por favor actualiza la informacion de imagen", "principal-page.php");
    }
    $id = $resultado->fetch_assoc();

    //if (subir_fichero($carpetaDestino,"poster",$id['peli_id']))
        // echo 'Imagen guardada correctamente';
    subir_fichero($carpetaDestino,"poster",$id['peli_id']);

    redireccionar("Pelicula actualizada correctamente", "principal-page.php");   
} else {
    redireccionar('Houston tenemos un problema: ' . mysqli_error($sql), 'principal-page.php');
}

mysqli_close( $sql );

?>