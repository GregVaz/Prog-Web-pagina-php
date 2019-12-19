<?php

    function redireccionar($mensaje, $direccion){
        include('includes/header.php');
        echo "
        <div id='notfound'>
            <div class='notfound'>
                <h2>$mensaje</h2>
                <img src='../../assets/esperar.gif'>
            </div>
        </div>
        ";
        include('includes/footer.php');
        header("refresh:3, url='$direccion'");
    }

    function acceso(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            redireccionar("Por favor inicia sesion", 'access-page.php');
            return true;
        }
    }

    function verificarAcceso(){

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        
        if (!isset($_SESSION['usuario'])) {
            return true;
        } 

        return false;
    }

    function subir_fichero($directorio_destino, $nombre_fichero, $nombre)
    {
        $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
        //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
        if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
        {
            //$img_file = $_FILES[$nombre_fichero]['name'];
            $img_file = $nombre;
            $img_type = $_FILES[$nombre_fichero]['type'];
            // echo 1;
            // Si se trata de una imagen   
            if (((strpos($img_type, "jfif") || strpos($img_type, "jpeg") ||
                strpos($img_type, "jpg")) || strpos($img_type, "png")))
            {
                //¿Tenemos permisos para subir la imágen?
                echo 2;
                if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file . ".jfif"))
                {
                    return true;
                }
            }
        }
        //Si llegamos hasta aquí es que algo ha fallado
    return false;
}

?>