<?php
session_start();
    if(!empty($_POST["btniniciosesion"])){
        if (empty($_POST["email"]) or empty($_POST["password"])) {
            echo '<div class="alert alert-danger"> COMPLETA LOS CAMPOS SOLICITADOS </div>';

        } else {
            
            $email=$_POST["email"];
            $clave=$_POST["password"];
            $sql=$conexion->query("SELECT * FROM usuarios WHERE usuario_email='$email' AND usuario_clave='$clave'");

            if ($datos=$sql->fetch_object()) {

                $_SESSION["usuario_id"]=$datos->usuario_id;
                $_SESSION["usuario_nombre"]=$datos->usuario_nombre;
                $_SESSION["usuario_apellido"]=$datos->usuario_apellido;
                $_SESSION["usuario_email"]=$datos->usuario_email;
                $_SESSION["usuario_fechanacimiento"]=$datos->usuario_fechanacimiento;



                header("location:./users/index.php");

            } else {
                
                echo '<div class="alert alert-danger"> No posees una cuenta en nuestra pagina. Registrate! </div>';

            }
            

        }
        
    }

?>
