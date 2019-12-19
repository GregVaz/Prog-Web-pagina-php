<?php
    include('includes/utilerias.php');

    if( acceso() ) {
        return;
    }
    
    include('includes/header.php');
?>
<link rel="stylesheet" href="../../styles/principal.css">


  <div class="container">
    <div class="menu">
      <div class="opcion" id="menu-opcion">
        <i class="far fa-file"></i>
        <h3><a href="add-page.php">Agregar</a></h3>
      </div>
      <div class="opcion" id="menu-opcion">
        <i class="fas fa-chart-pie"></i>
        <h3><a href="statistics-page.php">Estadisticas</a></h3>
      </div>
      <div class="opcion" id="menu-opcion">
        <i class="fas fa-info-circle"></i>
        <h3><a href="information-page.php">Informacion</a></h3>
      </div>
    </div>
    <div class="cuerpo">
        <?php
            $sql = include('../../config/database.php');

            $consulta = "SELECT * FROM pelicula";
            
            $resultado = $sql->query($consulta);
            
            if ($resultado->num_rows === 0) {
                echo "No exiten registros de peliculas";
                exit;
            }
            
            if(!isset($_GET['pagina'])){
              header("url='principal-page.php?pagina=0'");
              $param = 0;
            } else {
              $param = $_GET['pagina'];
            }

            

            $peliculas = $resultado->fetch_all();
            //echo count($peliculas);
            $counter = 0;

            $suma = $peliculas[0][0];
            
            $inicio = $param*6 + $suma; //1  -  7  -  13
            $fin = ($param+1)*6 + $suma - 1;    //6  -  12

            for($i = $inicio; $i<=$fin; $i++){
                if($counter == 0){
                    echo '<div class="lista">';
                }

                
                echo "
                <div class='containered'>
                    <img src='../../assets/peliculas/$i.jfif' alt='' class='image' >
                    <div class='middle'>  
                        <form action='formactualizar-page.php' method='get' id='form$i'>
                          <input type='text' name='id' value='$i' hidden='true'>
                        </form>
                        <form action='eliminar.php' method='get' id='form$i+'>
                          <input type='text' name='id' value='$i' hidden='true'>
                        </form>
                        <button class='button' id='actualizar' type='submit' form='form$i'>Actualizar</button>
                        <button class='button' id='eliminar' type='submit' form='form$i+'>Eliminar</button>
                    </div>
                </div>
                ";
                if($counter == 2){
                    echo '</div>';
                    $counter = -1;
                }
                if($i == count($peliculas)){
                  echo '</div>';
                  break;
                }

                $counter++;
            }

            $num = count($peliculas)/6;

            echo '<div class="control">
            <ul class="pagination">';

            for($e=0; $e<$num; $e++){
              if($param == $e){
                echo "<li class='active'>
                        <a href='principal-page.php?pagina=$e'>$e</a>
                    </li>";
              } else {
                echo "<li class='pagination-item'>
                        <a href='principal-page.php?pagina=$e'>$e</a>
                    </li>";
            }
            }
            echo '</ul>
                    </div>';
                
            mysqli_close( $sql );
        ?>
        
        
    </div>
  </div>

  <?php
    include('includes/footer.php');
?>
