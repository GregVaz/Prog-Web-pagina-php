<?php
    include('includes/utilerias.php');

    if( acceso() ) {
        return;
    }
    
    include('includes/header.php');
?>
<link rel="stylesheet" href="../../styles/add.css">


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
      <form action="agregar-pelicula.php" enctype="multipart/form-data" method="POST">
        
        <div class="datos">
          
          <div class="informacion">
            <label for="">Nombre:</label>
            <input type="text" placeholder="Nombre de la pelicula" name="nombre">
          </div>
          
          <div class="informacion"> 
            <label for="">Genero:</label>
            <select name="genero">
              <option value="Terror">Terror</option>
              <option value="Historias de la vida">Historias de la vida</option>
              <option value="Drama">Drama</option>
              <option value="Historico">Historico</option>
              <option value="Suspenso">Suspenso</option>
            </select> 
          </div>

          <div class="informacion"> 
            <label for="">Fecha de realizacion:</label>
            <input type="date" name="fechaCreacion">
          </div>

          <div class="informacion"> 
            <label for="">Categoria</label>
          </div>

          <div class="informacion categoria"> 
            <label for="">AA</label>
            <input type="radio" name="categoria" value="AA" checked>
            <label for="">A</label>
            <input type="radio" name="categoria" value="A">
            <label for="">B15</label>
            <input type="radio" name="categoria" value="B15">
            <label for="">C</label>
            <input type="radio" name="categoria" value="C">
          </div>

          <div class="informacion">
            <label for="">Fecha de estreno:</label>
            <input type="date" name="fechaEstreno">
          </div>

          <div class="informacion" id="sinopsis">
            <label for="">Sinopsis:</label>
            <input type="text" placeholder="Escribe una sinopsis" name="sinopsis">
          </div>
          
        </div>

        <div class="carga-imagen">
          <input type="file" name="poster">

            <input type="submit" value="Guardar pelicula" id="guardar">
            <input type="reset" value="Descartar" id="descartar">  

        </div>
      
      </form>

    </div>

  </div>

<?php
  include('includes/footer.php');
?>
