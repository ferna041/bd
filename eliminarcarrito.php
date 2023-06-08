<?php

if(!empty($_GET["id"])){

    $id=$_GET["id"];
    $sql=$conexion->query("DELETE FROM carrito WHERE usuario_id=$user_id AND productos_id=$id");

    if($sql){
        header("location:carrito.php");
    } else{
            
        echo '<div class="alert alert-danger"> Error al eliminar </div>';

    }

}

?>