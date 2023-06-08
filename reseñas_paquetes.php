<?php
include("templates/cabecera.php");

include("conexionbd.php");
include("config.php");


$id=isset($_GET["id"])? $_GET["id"]:'';
$token=isset($_GET["token"])? $_GET["token"]:'';
$i=1;


if(!empty($_POST["btn-atr"])){
                 
    $datos_calidad_hoteles=$_POST["calidad_hoteles"];
    $datos_transporte=$_POST["transporte"];
    $datos_servicio=$_POST["servicio"];
    $datos_precio_calidad=$_POST["precio_calidad"];
    $datos_reseña=$_POST["reseña"];
    date_default_timezone_get();
    $fecha_actual = Date("Y-m-d"); 

    $sql=$conexion->query("UPDATE reseñas_paquetes SET calidad_hoteles=$datos_calidad_hoteles, transporte=$datos_transporte,
    servicio=$datos_servicio, precio_calidad=$datos_precio_calidad, reseña='$datos_reseña', reseña_fecha='$fecha_actual' WHERE productos_id=$id AND usuario_id=$user_id");
    
    echo '<div class="alert alert-success"> Gracias por darnos tu opinión! </div>';
}


if(!empty($_POST["btn-dr"])){

    $sql=$conexion->query("UPDATE reseñas_paquetes SET calidad_hoteles=null, transporte=null,
    servicio=null, precio_calidad=null, reseña=null WHERE productos_id=$id AND usuario_id=$user_id");
    
    echo '<div class="alert alert-success"> reseña eliminada.</div>';
}



if($id==''||$token==''){

    echo 'Error al procesar';
    exit;

} else{

    $token_tmp=hash_hmac('sha1',$id,KEY_TOKEN);

    if($token==$token_tmp){
        
        $info=$conexion->query("SELECT * FROM reseñas_paquetes WHERE usuario_id=$user_id AND productos_id=$id");
        $info2=$conexion->query("SELECT * FROM paquetes WHERE productos_id=$id");
        $datos=$info->fetch_all(MYSQLI_ASSOC);

        if ($datos && $datos2=$info2->fetch_object()){

            $nombre=$datos2->paquetes_nombre;
            $reseña=$datos[0]["reseña"];
            $calidad_hoteles=$datos[0]["calidad_hoteles"];
            $transporte=$datos[0]["transporte"];
            $servicio=$datos[0]["servicio"];
            $precio_calidad=$datos[0]["precio_calidad"];
        }
    } else{
        echo 'Error al procesar';
        exit;
    }   
    
    
};




?>




<div class="card bg-primary text-center text-white text-left">
  <div class="card-body">

    <div class="row">
        <div class="col">
        <br/>
            <h4 class="card-title"><b><?php echo $nombre; ?></b></h4>
            <img src="https://images7.alphacoders.com/362/362619.jpg" witdh="250" height="250">
            <br></br>
        </div>
        
<div class="col text-left">
<br/><br/>


<h4><b> CALIFICACIONES:</b></h4>

<?php

if(($calidad_hoteles)==""){ ?> 
     
     <form method="post">
        <h6 ><b text-left> CALIDAD HOTELES: 
        <input type="number" min="1" max="5" name="calidad_hoteles" placeholder="Ingrese" required>
    </b></h6>

        <h6 ><b text-left>TRANSPORTE:
        <input type="number" min="1" max="5" name="transporte" placeholder="Ingrese" required>
    </b></h6>

        <h6 ><b text-left>SERVICIO:
        <input type="number" min="1" max="5" name="servicio" placeholder="Ingrese" required>
    </b></h6>
    <h6 ><b text-left>PRECIO-CALIDAD:
        <input type="number" min="1" max="5" name="precio_calidad" placeholder="Ingrese" required>
    </b></h6>
        <h6 ><b>
        <textarea type="text" rows="4" cols="30" minlength=1  maxlength=200 name="reseña"></textarea>
    </b></h6>

    <input name="btn-atr" class="bg-success" type="submit" value="Guardar Reseña">
</form>
<?php } else {?>
    <form method="post">
        <h6 ><b text-left> CALIDAD HOTELES:
        <input type="number" min="1" max="5" name="calidad_hoteles" value="<?php echo $calidad_hoteles ?>" required>
    </b></h6>
    <h6 ><b text-left>TRANSPORTE:
        <input type="number" min="1" max="5" name="transporte" value="<?php echo $transporte ?>" required>
    </b></h6>

        <h6 ><b text-left>SERVICIO:
        <input type="number" min="1" max="5" name="servicio" value="<?php echo $servicio ?>"required>
    </b></h6>
    <h6 ><b text-left>PRECIO-CALIDAD:
        <input type="number" min="1" max="5" name="precio_calidad" value="<?php echo $precio_calidad ?>" required>
    </b></h6>
        <h6 ><b>
        <textarea type="text" rows="4" cols="30" minlength=1  maxlength=200 name="reseña"><?php echo$reseña?></textarea>
    </b></h6>
    <input name="btn-atr"  class="bg-success" type="submit" value="Actualizar Reseña">
    <input name="btn-dr" class="bg-danger" type="submit" value="Eliminar Reseña">
<?php 

} ?> 

</div>
</div>
</div>
</div>




 
<?php include("templates/pie.php"); ?>