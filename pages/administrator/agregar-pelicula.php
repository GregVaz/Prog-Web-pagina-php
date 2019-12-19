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

$carpetaDestino = "../../assets/peliculas";

if(empty($nombre) || empty($genero) || empty($fechaRealizacion) || empty($categoria) || empty($fechaEstreno) || empty($sinopsis)){
    redireccionar('Datos no validos', 'add-page.php');
    return;
}

$sql = include('../../config/database.php');

$consulta = "INSERT INTO `pelicula`(`peli_nombre`, `peli_genero`, `peli_fechaCreacion`, `peli_categoria`, `peli_fechaEstreno`, `peli_sinopsis`) 
            VALUES ('$nombre', '$genero', '$fechaRealizacion', '$categoria', '$fechaEstreno', '$sinopsis')";

$resultado = mysqli_query($sql, $consulta);

if($resultado) {
    $resultado = mysqli_query($sql,"SELECT * FROM pelicula WHERE peli_nombre = '$nombre'");
    if(empty($resultado)){
        redireccionar("Pelicula agregada correctamente<br>pero tuvimos un problema en guardar tu imagen. Por favor actualiza la informacion de imagen", "principal-page.php");
    }
    $id = $resultado->fetch_assoc();

    //if (subir_fichero($carpetaDestino,"poster",$id['peli_id']))
        // echo 'Imagen guardada correctamente';
    subir_fichero($carpetaDestino,"poster",$id['peli_id']);

    redireccionar("Pelicula agregada correctamente", "principal-page.php");   
} else {
    redireccionar('Houston tenemos un problema: ' . mysqli_error($conexion), 'add-page.php');
}

mysqli_close( $sql );

?>