<?php
    include('includes/utilerias.php');

    if( acceso() ) {
        return;
    }

    if(empty($_GET)){
      redireccionar("No se obtuvo el identificador del dato a actualizar<br>Intentelo nuevamente mas tarde", 'principal-page.php');
    }
    $dato = $_GET['id'];

    $sql = include('../../config/database.php');

    $consulta = "SELECT * FROM pelicula WHERE peli_id = '$dato'";

    $resultado = mysqli_query($sql, $consulta);

    if(!$resultado){
      redireccionar('Sin resultados de pelicula, pongase en contacto con soporte', 'principal-page.php');
    } else {
      $data = $resultado->fetch_assoc();
      
      $nombre = $data['peli_nombre'];
      $genero = $data['peli_genero'];
      $fechaRealizacion = $data['peli_fechaCreacion'];
      $categoria = $data['peli_categoria'];
      $fechaEstreno = $data['peli_fechaEstreno'];
      $sinopsis = $data['peli_sinopsis'];
    }
    
    include('includes/header.php');
?>
<link rel="stylesheet" href="../../styles/add.css">


  <div class="container">

    <div class="cuerpo">
      <form action="actualizar-pelicula.php" enctype="multipart/form-data" method="POST">
        
        <div class="datos">
          <?php 
          echo "<div class='informacion'>
            <label for=''>Nombre:</label>
            <input type='text' placeholder='Nombre de la pelicula' name='nombre' value='$nombre'>
          </div>
          
          <div class='informacion'> 
            <label for=''>Genero:</label>
            <select name='genero' value='$genero'>
              <option value='Terror'>Terror</option>
              <option value='Historias de la vida'>Historias de la vida</option>
              <option value='Drama'>Drama</option>
              <option value='Historico'>Historico</option>
              <option value='Suspenso'>Suspenso</option>
            </select> 
          </div>

          <div class='informacion'> 
            <label for=''>Fecha de realizacion:</label>
            <input type='date' name='fechaCreacion' value='$fechaRealizacion'>
          </div>

          <div class='informacion'> 
            <label for=''>Categoria</label>
          </div>";

          if($categoria=="AA") {
            echo "<div class='informacion categoria'> 
            <label for=''>AA</label>
            <input type='radio' name='categoria' value='AA' checked>
            <label for=''>A</label>
            <input type='radio' name='categoria' value='A'>
            <label for=''>B15</label>
            <input type='radio' name='categoria' value='B15'>
            <label for=''>C</label>
            <input type='radio' name='categoria' value='C'>
            </div>";
          } else if($categoria=="A") {
            echo "<div class='informacion categoria'> 
            <label for=''>AA</label>
            <input type='radio' name='categoria' value='AA' >
            <label for=''>A</label>
            <input type='radio' name='categoria' value='A' checked>
            <label for=''>B15</label>
            <input type='radio' name='categoria' value='B15'>
            <label for=''>C</label>
            <input type='radio' name='categoria' value='C'>
            </div>";
          } else if($categoria=="B15") {
            echo "<div class='informacion categoria'> 
            <label for=''>AA</label>
            <input type='radio' name='categoria' value='AA' >
            <label for=''>A</label>
            <input type='radio' name='categoria' value='A' >
            <label for=''>B15</label>
            <input type='radio' name='categoria' value='B15' checked>
            <label for=''>C</label>
            <input type='radio' name='categoria' value='C'>
            </div>";
          } else if($categoria=="C") {
            echo "<div class='informacion categoria'> 
            <label for=''>AA</label>
            <input type='radio' name='categoria' value='AA' >
            <label for=''>A</label>
            <input type='radio' name='categoria' value='A' >
            <label for=''>B15</label>
            <input type='radio' name='categoria' value='B15'>
            <label for=''>C</label>
            <input type='radio' name='categoria' value='C' checked>
            </div>";
          }
          
          

          echo "<div class='informacion'>
            <label for=''>Fecha de estreno:</label>
            <input type='date' name='fechaEstreno' value='$fechaEstreno'>
          </div>

          <div class='informacion' id='sinopsis'>
            <label for=''>Sinopsis:</label>
            <input type='text' placeholder='Escribe una sinopsis' name='sinopsis' value='$sinopsis'>
          </div>
          
        </div>

        <input type='text' name='id' value='$dato' hidden=true>
        
        <div class='carga-imagen'>
          <input type='file' name='poster'>

            <input type='submit' value='Actualizar pelicula' id='guardar'>
            <input type='reset' value='Descartar cambios' id='descartar'>  

        </div>";
        ?>

        
      
      </form>

    </div>

  </div>

<?php
  include('includes/footer.php');
?>
