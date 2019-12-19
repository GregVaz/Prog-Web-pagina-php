<?php
    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio - TusPeliculasGratis</title>
    <link rel="stylesheet" href="../../styles/header.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

</head>
<body>
  <header>
    <div class="titulo">
      <h2><a href="principal-page.php?pagina=0">TusPeliculasGratis</a></h2>
    </div>
    <?php
      if(isset($_SESSION['usuario']) && $_SERVER['REQUEST_URI']!='/proyecto/pages/administrator/access-page.php' && $_SERVER['REQUEST_URI']!='/proyecto/pages/administrator/acceso.php'){
      echo "
      <div class='area-notificacion'>
        <div class='item'>
          <a href='salir.php'>Cerrar sesion</a>
        </div>
        <div class='item'>
          <i class='fas fa-user-alt'></i>
          <i class='fas fa-angle-down arrow'></i>
        </div>
        <div class='item'>
          <i class='fas fa-bell'></i>
          <i class='fas fa-angle-down arrow'></i>
        </div>
        <div class='item'>
          <i class='fas fa-envelope'></i>
          <i class='fas fa-angle-down arrow'></i>
        </div>
      </div>" ;
      }
    ?>
    
  </header>
