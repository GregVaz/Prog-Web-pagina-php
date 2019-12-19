<?php
    include('includes/utilerias.php');

    if(!verificarAcceso()){
        redireccionar('Ya haz iniciado sesion', 'principal-page.php');
        return;
    }


    include('includes/header.php');
?>
<link rel="stylesheet" href="../../styles/access.css">

    <section class="cuerpo-background">
        <div class="loginForm">
            <h2>Bienvenido</h2>
            <form action="acceso.php" method="post">
                <p><input type="text" name="user" id="user" class="fieldsForm" placeholder="Nombre de usuario"></p>
                <p><input type="password" name="password" class="fieldsForm" placeholder="Contrasena"></p>
                <input type="submit" id="boton" value="Ingresar">
            </form>
            <p><a href="#">Forgot your password?</a></p>
        </div>
    </section>

<?php
    include('includes/footer.php');
?>
