<?php
include("templates/cabecera.php");
include("conexionbd.php");
include("config.php");


$id=isset($_GET["id"])? $_GET["id"]:'';
$token=isset($_GET["token"])? $_GET["token"]:'';
$i=1;


if(!empty($_POST["btn-atr"])){
                 
    $datos_limpieza=$_POST["limpieza"];
    $datos_servicio=$_POST["servicio"];
    $datos_decoracion=$_POST["decoracion"];
    $datos_camas=$_POST["camas"];
    $datos_reseña=$_POST["reseña"];
    
    date_default_timezone_get();
    $fecha_actual = Date("Y-m-d"); 

    $sql=$conexion->query("UPDATE reseñas_hoteles SET limpieza=$datos_limpieza, servicio=$datos_servicio, decoración=$datos_decoracion,calidad_camas=$datos_camas,Reseña='$datos_reseña', fecha_reseña='$fecha_actual' WHERE productos_id=$id AND usuario_id=$user_id");
    
    echo '<div class="alert alert-success"> Gracias por darnos tu opinión! </div>';
}

if(!empty($_POST["btn-dr"])){

    $sql=$conexion->query("UPDATE reseñas_hoteles SET limpieza=null, servicio=null, decoración=null,calidad_camas=null,Reseña=null,fecha_reseña=null WHERE productos_id=$id AND usuario_id=$user_id");
    echo '<div class="alert alert-success"> reseña eliminada.</div>';
}


if($id==''||$token==''){

    echo 'Error al procesar';
    exit;

} else{

    $token_tmp=hash_hmac('sha1',$id,KEY_TOKEN);

    if($token==$token_tmp){
        
        $info=$conexion->query("SELECT * FROM reseñas_hoteles WHERE usuario_id=$user_id AND productos_id=$id");
        $info2=$conexion->query("SELECT * FROM hoteles WHERE productos_id=$id");
        $datos=$info->fetch_all(MYSQLI_ASSOC);

        if ($datos && $datos2=$info2->fetch_object()){

            $nombre=$datos2->hoteles_nombre;
            $ciudad=$datos2->hoteles_ciudad;
            $reseña=$datos[0]["Reseña"];
            $limpieza=$datos[0]["limpieza"];
            $servicio=$datos[0]["servicio"];
            $decoracion=$datos[0]["decoración"];
            $calidad_camas=$datos[0]["calidad_camas"];
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
            <h5 class="card-title"><?php echo $ciudad; ?></h5>
        </div>
        
<div class="col text-left">
<br/><br/>


<h4><b> CALIFICACIONES:</b></h4>

<?php

if(($limpieza)==""){ ?> 
     
     <form method="post">
        <h6 ><b text-left> LIMPIEZA: 
        <input type="number" min="1" max="5" name="limpieza" placeholder="Ingrese" required>
    </b></h6>

        <h6 ><b text-left>SERVICIO:
        <input type="number" min="1" max="5" name="servicio" placeholder="Ingrese" required>
    </b></h6>

        <h6 ><b text-left>DECORACIÓN:
        <input type="number" min="1" max="5" name="decoracion" placeholder="Ingrese" required>
    </b></h6>
    <h6 ><b text-left>CALIDAD DE CAMAS:
        <input type="number" min="1" max="5" name="camas" placeholder="Ingrese" required>
    </b></h6>
        <h6 ><b>
        <textarea type="text" rows="4" cols="30" minlength=1  maxlength=200 name="reseña"></textarea>
        
    </b></h6>

    <input name="btn-atr" class="bg-success" type="submit" value="Guardar Reseña">
</form>
<?php } else {?>
    <form method="post">
        <h6 ><b text-left> LIMPIEZA: 
        <input type="number" min="1" max="5" name="limpieza" value="<?php echo $limpieza ?>" required>
    </b></h6>
    <h6 ><b text-left>SERVICIO:
        <input type="number" min="1" max="5" name="servicio" value="<?php echo $servicio ?>" required>
    </b></h6>

        <h6 ><b text-left>DECORACIÓN:
        <input type="number" min="1" max="5" name="decoracion" value="<?php echo $decoracion ?>"required>
    </b></h6>
    <h6 ><b text-left>CALIDAD DE CAMAS:
        <input type="number" min="1" max="5" name="camas" value="<?php echo $calidad_camas ?>" required>
    </b></h6>
        <h6 ><b>
        <textarea type="text" rows="4" cols="30" minlength=1  maxlength=200 name="reseña" ><?php echo$reseña;?></textarea>   
    </b></h6>
    <input name="btn-atr"  type="submit" class="bg-success" value="Actualizar Reseña">
    <input name="btn-dr" class="bg-danger" type="submit" value="Eliminar Reseña">

<?php 

} ?> 

</div>
</div>
</div>
</div>




 
<?php include("templates/pie.php"); ?>