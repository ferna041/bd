<?php include("../templates/cabecera.php");
include("../config.php");
include("../conexionbd.php");

function remover_simple ($valor,$arr)
{
    if (($key = array_search($valor, $arr)) !== false) 
    {
    unset($arr[$key]);
    }
    return $arr;
}
?>

<?php 
$hoteles_dispo=$conexion->query("SELECT * FROM productos INNER JOIN hoteles WHERE productos.producto_id=hoteles.productos_id ORDER BY hoteles.hoteles_habitacionesdisp DESC LIMIT 4");
$paquetes_dispo=$conexion->query("SELECT * FROM productos INNER JOIN paquetes WHERE productos.producto_id=paquetes.productos_id ORDER BY paquetes.paquetes_disponibles DESC LIMIT 4");

$hoteles_dispo=$hoteles_dispo->fetch_all(MYSQLI_ASSOC);
$paquetes_dispo=$paquetes_dispo->fetch_all(MYSQLI_ASSOC);
$i=4;

while($i>0){
    $temporal=999;
    $producto_temporal="";
    
    foreach($hoteles_dispo as $hotel){
        if($hotel["hoteles_habitacionesdisp"]<$temporal){
            $temporal=$hotel["hoteles_habitacionesdisp"];
            $producto_temporal=$hotel;   
        }
    }
    foreach($paquetes_dispo as $paquete){
        if($paquete["paquetes_disponibles"]<$temporal){
            $temporal=$paquete["paquetes_disponibles"];
            $producto_temporal=$paquete;
        }
    }

    $tipo= $producto_temporal["producto_tipo"];
    if($tipo==1){
        $hoteles_dispo=remover_simple($producto_temporal,$hoteles_dispo);
    } else{
        $paquetes_dispo=remover_simple($producto_temporal,$paquetes_dispo);
    }
$i=$i-1;}?>


<?php
$encuesta_hoteles=[];
$hoteles=$conexion->query("SELECT productos_id,hoteles_nombre FROM hoteles");

foreach($hoteles as $hotel){
    $comprobacion=$conexion->query("SELECT * FROM reseñas_hoteles WHERE productos_id=$hotel[productos_id]");

    if($comprobacion->fetch_object()){
        $reseñas_hotels=$conexion->query("SELECT productos_id,AVG(limpieza),AVG(servicio),AVG(decoración),AVG(calidad_camas) FROM reseñas_hoteles WHERE productos_id=$hotel[productos_id]");
        $reseñas_hotels=$reseñas_hotels->fetch_all(MYSQLI_ASSOC);
        $reseñas_hotels["promedio"]=($reseñas_hotels[0]["AVG(limpieza)"]+$reseñas_hotels[0]["AVG(servicio)"]+$reseñas_hotels[0]["AVG(decoración)"]+$reseñas_hotels[0]["AVG(calidad_camas)"])/4;
        $reseñas_hotels["hoteles_nombre"]=$hotel["hoteles_nombre"];

        $encuesta_hoteles[]=$reseñas_hotels;
}}
array_multisort(array_column($encuesta_hoteles, "promedio"), SORT_DESC, $encuesta_hoteles);

?>


<?php
$encuesta_paquetes=[];
$paquetes=$conexion->query("SELECT productos_id,paquetes_nombre FROM paquetes");

foreach($paquetes as $paquete){
    $comprobacion=$conexion->query("SELECT * FROM reseñas_paquetes WHERE productos_id=$paquete[productos_id]");

    if($comprobacion->fetch_object()){
        $reseñas_paquets=$conexion->query("SELECT productos_id,AVG(calidad_hoteles),AVG(transporte),AVG(servicio),AVG(precio_calidad) FROM reseñas_paquetes WHERE productos_id=$paquete[productos_id]");
        $reseñas_paquets=$reseñas_paquets->fetch_all(MYSQLI_ASSOC);
        $reseñas_paquets["promedio"]=($reseñas_paquets[0]["AVG(calidad_hoteles)"]+$reseñas_paquets[0]["AVG(transporte)"]+$reseñas_paquets[0]["AVG(servicio)"]+$reseñas_paquets[0]["AVG(precio_calidad)"])/4;
        $reseñas_paquets["paquetes_nombre"]=$paquete["paquetes_nombre"];

        $encuesta_paquetes[]=$reseñas_paquets;
}}
array_multisort(array_column($encuesta_paquetes, "promedio"), SORT_DESC, $encuesta_paquetes);
?>

<?php
if(!empty($_POST["btn-desc"])){

    $des=$conexion->query("INSERT INTO carrito VALUES ($user_id,0,0)");
}
?>

<?php 

$prob=random_int(1,10);
$descuento=$conexion->query("SELECT * FROM carrito WHERE productos_id=0 AND usuario_id=$user_id");
$bandera=true;
if($descuento=$descuento->fetch_all(MYSQLI_ASSOC)){$bandera=false;}

if($prob<4 && $bandera){

?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ><b>QUE SUERTE!</b></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Haz conseguido un descuento del 10% en tu proxima compra gracias al codigo: <b>10%xPRESTIGUE</b></p>
                
                <form method="post">
                    <div class="row text-center">
                    <div class="col-md-6">
                    <input type="submit" name="btn-desc" class="close bg-success" value="Aceptar descuento"> 
                    </div>
                    </form>

                    <div class="col-md-6">
                    <button type="submit" class="close bg-danger" data-dismiss="modal">Rechazar descuento</button>
                    </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>

<?php 
}
?>
<div>
        <div class="d-none d-sm-block">
    </br>
        </div>
    </div>
<?php 
if(true){ ?>
    
    <div class="card bg-primary text-left text-white">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
        <h4 class="card-title">Productos con mayor disponibilidad</h4>
    </div>
    </div>
    <?php foreach($hoteles_dispo as $hotel){?> 
    
    <div class="col-md-3">
    
    <div class="card">
        <img class="card-img-top" src="https://images7.alphacoders.com/362/362619.jpg" alt="">
        <div class="card-body">
            <h6 class="card-Viaje"> <b><?php echo $hotel["hoteles_nombre"]; ?></b></h6>
            <p class="small"><?php  echo "disponibilidad: ".$hotel["hoteles_habitacionesdisp"];  ?></p>

            <div class="text-center">
                <a class="btn btn-primary" href="../detalle_hoteles.php?id=<?php echo $hotel["productos_id"];?>&token=<?php
                echo hash_hmac("sha1",$hotel["productos_id"],KEY_TOKEN);?>">Ver detalles</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<?php foreach($paquetes_dispo as $paquete){?> 
    
    
    <div class="col-md-3">
        
        <div class="card">
            <img class="card-img-top" src="https://images2.alphacoders.com/946/946565.jpg" alt="">
            <div class="card-body">
            
                <h6 class="card-Viaje text-center"> <b><?php echo $paquete["paquetes_nombre"]; ?></b></h6>
                </br>
                <p class="small"><?php  echo "disponibilidad: ".$paquete["paquetes_disponibles"];  ?></p>
                </br>
                <div class="text-center">
                    <a class="btn btn-primary" href="../detalle_paquetes.php?id=<?php echo $paquete["productos_id"];?>&token=<?php
                    
                    echo hash_hmac("sha1",$paquete["productos_id"],KEY_TOKEN);?>">Ver detalles</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


    <div>
        <div class="d-none d-sm-block">
    </br><br/>
        </div>
    </div>





    <div class="row">

<div class="col-md-6">

<div class="card bg-primary text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
    <h4 class="card-title text-white">Mejores Hoteles (votados por la comunidad)</h4>
    </br>
    
<div class="row">
<?php 
$contador=0;
foreach($encuesta_hoteles as $hotel){
    if($contador==10) break;?> 

<div class="col-sm-6">



<div class="card">
    <img class="card-img-top" src="https://images7.alphacoders.com/362/362619.jpg" alt="">
    <div class="card-body">
        <h6 class="card-Viaje"> <b><?php echo $hotel["hoteles_nombre"]; ?></b></h6>
        <p class="small"><?php  echo "promedio calificciones: ".$hotel["promedio"];  ?></p>
        
        <div class="text-center">
            <a class="btn btn-primary" href="../detalle_hoteles.php?id=<?php echo $hotel[0]["productos_id"];?>&token=<?php
            echo hash_hmac("sha1",$hotel[0]["productos_id"],KEY_TOKEN);?>">Ver detalles</a>
        </div>
    </div>
</div>

</br>

</div>


<?php $contador=$contador+1;} ?>


</div>
</div>
</div>
</div>



<div class="col-md-6">
<div class="card bg-primary text-left">
<img class="card-img-top" src="holder.js/100px180/" alt="">
<div class="card-body">
<h4 class="card-title text-white">Mejores Paquetes (votados por la comunidad)</h4>
</br>
<div class="row">
<?php 
$contador=0;
foreach($encuesta_paquetes as $paquet){
if($contador==10) break;?> 

<div class="col-sm-6">

<div class="card">
<img class="card-img-top" src="https://images2.alphacoders.com/946/946565.jpg" alt="">
<div class="card-body">
    <h6 class="card-Viaje"> <b><?php echo $paquet["paquetes_nombre"]; ?></b></h6></br>
    <p class="small"><?php  echo "promedio calificciones: ".$paquet["promedio"];  ?></p>
    </br>
    <div class="text-center">
    <a class="btn btn-primary" href="../detalle_paquetes.php?id=<?php echo $paquet[0]["productos_id"];?>&token=<?php     
                    echo hash_hmac("sha1",$paquet[0]["productos_id"],KEY_TOKEN);?>">Ver detalles</a>
    </div>
</div>
</div>
</br>
</div>

<?php $contador=$contador+1;} ?>
</div>
</div>
</div>
</div>
</div>

<?php } ?>






<?php include("../templates/pie.php");?>