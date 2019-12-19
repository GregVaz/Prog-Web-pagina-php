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
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="carrusel.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        #boton {background: rgb(32, 31, 31);
                float: left;
                position: absolute;
                padding: 1em 2em 1em 2em;
                text-transform: uppercase;
                border: 1px solid rgb(53, 43, 82);
                cursor: pointer;
                }
        img{float: left;
            align-content: center;}   

        #video {
            display: flex;
            align-items: center;
            justify-content: center;
}
        #caja-comentarios{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #btn{
            padding: 1em 2em 1em 2em;
            text-transform: uppercase;
            border: 1px solid rgb(218, 200, 217);
            cursor: pointer;
            margin: 1.5em 0em 1.5em 0em;
            background: beige;
            width: 150px;
            height: 50px;
            font-size:15px;       
            
        }
        .item a {
            color:white; 
            font-size: 1.2em; 
            text-decoration: none;
            padding: 0.5em;
        }

        .item a:hover{
            background: white;
            color: black;
            border-radius: 10px;
            padding: 0.5em;
        }
    </style>

</head>
<body>
  <header>
    <div class="titulo">
      <h2><a href="index.php?pagina=0">TusPeliculasGratis</a></h2>
    </div>

    <div class='area-notificacion'>
        <div class='item'>
          <a href='pages/administrator/access-page.php' >Iniciar sesion</a>
        </div>
    </div>
    
  </header>

        <?php
            $sql = include('config/database.php');

            $id = $_GET['id'];

            $consulta = "SELECT * FROM pelicula WHERE peli_id = '$id'";
            
            $resultado = mysqli_query($sql, $consulta);
            
            if ($resultado->num_rows === 0) {
                echo "No exiten registros de peliculas";
                exit;
            }

            $data = $resultado->fetch_assoc();
      
            $nombre = $data['peli_nombre'];
            $genero = $data['peli_genero'];
            $fechaRealizacion = $data['peli_fechaCreacion'];
            $categoria = $data['peli_categoria'];
            $fechaEstreno = $data['peli_fechaEstreno'];
            $sinopsis = $data['peli_sinopsis'];
            echo "
            
                <div class='contenedor'>
                    
                <div class='descripcion'>
                    <div class='texto'>
                        <h1>$nombre</h1>
                        <h3>Fecha de estreno: $fechaEstreno (México)</h3>
                        <h4>Genero: $genero</h4>
                        <h4>Categoria: $categoria</h4>
                        <p>Sinopsis: $sinopsis</p>
                                
                    </div>
                    <div class='botones'>
                            <a href='http://www.facebook.com' target='_blank'><img alt='Siguenos en Facebook' src='https://lh3.googleusercontent.com/-NSLbC_ztNls/T6VX0g6z8AI/AAAAAAAAA0A/_vyIBrmZbuY/s48/facebook48.png' width=48 height=48  /></a>
                            <a href='https://www.youtube.com/watch?v=XpbswZaTHfI' target='_blank'><img alt='Siguenos en YouTube' src='https://lh6.googleusercontent.com/-Atgpy-x_OwI/T6mYkA18hYI/AAAAAAAAA1U/qksUJ5uBq3c/s48/youtube48.png' width=48 height=48  /></a>
                    </div>
                </div>
            
                <div class='div-carrusel'>
                    <div class='carrusel'>
                        <div class='ventana'>
                            <div id='renglon'>
                                <img  src='assets/peliculas/$id.jfif' style='width:100%'>                          
                            </div>
                        </div>   
                    </div>   
                </div>       
            </div> 
            ";
                
            mysqli_close( $sql );
            
        ?>

        



  <footer>
    <p>Derechos reservados</p>
</footer>

</body>
</html>