<?php

$id_producto=$paquete["productos_id"];
$usuario_id=$_SESSION['usuario_id'];

if(!empty($_POST["btnwish"])){
        

        $sql3=$conexion->query("SELECT * FROM wishlist WHERE producto_id=$id_producto");
        
        if (!($datos=$sql3->fetch_object())){
            
            $sql3=$conexion->query("INSERT INTO wishlist VALUES ($usuario_id,$id_producto)");
            echo '<div class="alert alert-succes"> Agregado a la wishlist! </div>';

            
        } else{
            
            echo '<div class="alert alert-danger"> Ya agregaste esto a la wishlist! </div>';

        }

}

?>