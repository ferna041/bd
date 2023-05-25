<?php

if(!empty($_POST["btncrear"])){
        
    if(empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["fecha"])){
        echo '<div class="alert alert-danger"> INGRESA LOS DATOS SOLICITADOS CORRECTAMENTE </div>';
    }  else {

        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $email=$_POST["email"];
        $clave=$_POST["password"];
        $fecha=$_POST["fecha"];

        $sql2=$conexion->query("SELECT * FROM usuarios WHERE usuario_email='$email'");
        
        if (!($datos=$sql2->fetch_object())){
            
            $sql=$conexion->query("INSERT INTO usuarios (usuario_nombre,usuario_apellido,usuario_email,usuario_fechanacimiento,usuario_clave) VALUES ('$nombre','$apellido','$email','$fecha','$clave')");
            header("location:iniciar.php");
            
        } else{
            
            echo '<div class="alert alert-danger"> El email registrado ya posee una cuenta! </div>';

        }

    }


}

?>