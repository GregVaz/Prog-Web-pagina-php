<?php
    include('includes/utilerias.php');

    if( acceso() ) {
        return;
    }
    
    include('includes/header.php');
?>
<link rel="stylesheet" href="../../styles/information.css">

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
        <div class="title">
          <h2>Equipo</h2>
          <p>No puedes ser uno entre un millón, porque eso significaría que eres como otros siete millones de personas en este mundo.</p>
        </div>
        <div class="team">
          <div class="member">
            <div class="pic"><img src="../../assets/equipo/team1.jpg" alt=""></div>
              <h4>Gregorio Vazquez Ya;ez</h4>
              <span>Programador</span>
              <div class="social">
                <a href="error-page.php"><i class="fab fa-twitter"></i></a>
                <a href="https://www.facebook.com/gregvazya"><i class="fab fa-facebook"></i></a>
                <a href="error-page.php"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>

            <div class="member">
            <div class="pic"><img src="../../assets/equipo/team2.jpeg" alt=""></div>
              <h4>Juan Francisco Valle Salas</h4>
              <span>Programador</span>
              <div class="social">
                <a href="error-page.php"><i class="fab fa-twitter"></i></a>
                <a href="error-page.php"><i class="fab fa-facebook"></i></a>
                <a href="error-page.php"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>

          <div class="member">
            <div class="pic"><img src="../../assets/equipo/team3.jpeg" alt=""></div>
              <h4>Omar Bigvai Villegas Diaz</h4>
              <span>Programador</span>
              <div class="social">
                <a href="error-page.php"><i class="fab fa-twitter"></i></a>
                <a href="error-page.php"><i class="fab fa-facebook"></i></a>
                <a href="error-page.php"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
        </div>

          
    </div>
  </div>
  <?php
    include('includes/footer.php');
?>
