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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
    
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

<link rel="stylesheet" href="styles/principal.css">

    <div class="cuerpo">
        <?php
            $sql = include('config/database.php');

            $consulta = "SELECT * FROM pelicula";
            
            $resultado = $sql->query($consulta);
            
            if ($resultado->num_rows === 0) {
                echo "No exiten registros de peliculas";
                exit;
            }
            
            if(!isset($_GET['pagina'])){
              header("url='index.php?pagina=0'");
              $param = 0;
            } else {
              $param = $_GET['pagina'];
            }

            $cantidad_peliculas = 8;

            

            $peliculas = $resultado->fetch_all();
            //echo count($peliculas);
            $counter = 0;

            $suma = $peliculas[0][0];
            
            $inicio = $param* $cantidad_peliculas + $suma; //1  -  7  -  13
            $fin = ($param+1)* $cantidad_peliculas + $suma - 1;    //6  -  12

            for($i = $inicio; $i<=$fin; $i++){
                if($counter == 0){
                    echo '<div class="lista">';
                }

                
                echo "
                <div class='containered'>
                    <form action='detalles.php' method='get' id='form$i'>
                        <input type='text' name='id' value='$i' hidden='true'>
                    </form>
                    <button class='button' id='actualizar' type='submit' form='form$i' style='background: none; cursor:pointer;'>
                    <img src='assets/peliculas/$i.jfif' alt='' class='image' >
                    </button>
                </div>
                ";
                if($counter == 3){
                    echo '</div>';
                    $counter = -1;
                }
                if($i == count($peliculas)){
                    echo '</div>';
                    break;
                  }

                $counter++;
            }

            $num = count($peliculas)/$cantidad_peliculas;

            echo '<div class="control">
            <ul class="pagination">';

            for($e=0; $e<$num; $e++){
                if($param == $e){
                    echo "<li class='active'>
                            <a href='index.php?pagina=$e'>$e</a>
                        </li>";
                } else {
                    echo "<li class='pagination-item'>
                            <a href='index.php?pagina=$e'>$e</a>
                        </li>";
                }
            }
            echo '</ul>
                    </div>';
                
            mysqli_close( $sql );
        ?>
        
        
    </div>
  </div>



  <footer>
    <p>Derechos reservados</p>
</footer>

</body>
</html>