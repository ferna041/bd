<?php


if(!empty($_POST["btnact"])){

        
    if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["fecha"])){
        
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $email=$_POST["email"];
        $clave=$_POST["password"];
        $fecha=$_POST["fecha"];
        
        $sql=$conexion->query("UPDATE usuarios SET usuario_nombre='$nombre', usuario_apellido='$apellido', usuario_email='$email', usuario_fechanacimiento='$fecha', usuario_clave='$clave' WHERE usuario_id=$user_id");
        
        if($sql==true){

            $_SESSION["usuario_nombre"]=$nombre;
            $_SESSION["usuario_apellido"]=$apellido;
            $_SESSION["usuario_email"]=$email;
            $_SESSION["usuario_fechanacimiento"]=$fecha;
            $_SESSION["usuario_clave"]=$clave;

            header("location:perfil.php");
        }
            
            
      
    } else{ 

        echo '<div class="alert alert-danger"> Ingresa todos los campos solicitados </div>';

     }

}
