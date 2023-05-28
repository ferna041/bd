<?php

include("template/cabecera.php");

include("conexionbd.php");
include("config.php");

$id=isset($_GET["id"])? $_GET["id"]:'';
$token=isset($_GET["token"])? $_GET["token"]:'';
$i=1;



if($id==''||$token==''){

    echo 'Error al procesar';
    exit;

} else{

    $token_tmp=hash_hmac('sha1',$id,KEY_TOKEN);

    if($token==$token_tmp){

        $sql=$conexion->query("SELECT paquetes_nombre,paquetes_airida,paquetes_airvuelta,paquetes_preciopp,paquetes_maxpp FROM paquetes WHERE productos_id=$id");
        
        if ($datos=$sql->fetch_object()){

            $nombre=$datos->paquetes_nombre;
            $vueloida=$datos->paquetes_airida;
            $vuelovuelta=$datos->paquetes_airvuelta;
            $preciopp=$datos->paquetes_preciopp;
            $maxpp=$datos->paquetes_maxpp;

            $sql2=$conexion->query("SELECT * FROM hoteles INNER JOIN hoteles_paquetes ON hoteles.productos_id=hoteles_paquetes.hoteles_id AND 
                                    paquetes_id=$id;");

            $hoteles=$sql2->fetch_all(MYSQLI_ASSOC);

        }

    } else{

        echo 'Error al procesar';
        exit;

    }

}


?>



<div class="card bg-primary text-center text-white text-left">
  <div class="card-body">

    <div class="row">

        
        <div class="col">
            
            <br/>
            <h4 class="card-title"><?php echo $nombre; ?></h4>
            <br/>
            <img src="https://images2.alphacoders.com/946/946565.jpg" witdh="160" height="160">

        </div>

        <div class="col">

            <br/>

            <?php
            
                foreach($hoteles as $hotel){

                    echo "<h6><b> Destino $i</b></h6>";

                    echo "<p class=small> Hotel: ".$hotel["hoteles_nombre"]." </p>";

                    echo "<p class=small> Ciudad: ".$hotel["hoteles_ciudad"]." </p>";

                    $i++;
                }

            ?>
                 
        </div>

        <div class="col">

            <br/>

            <h6><b> Vuelo ida: </b></h6>
            <?php  echo "<p class=small>".$vueloida."</p>"  ?>

            <h6><b> Vuelo vuelta: </b></h6>
            <?php  echo "<p class=small>".$vuelovuelta."</p>"  ?>

            <h6><b> Personas por paquete:</b></h6>
            <?php  echo "<p class=small>".$maxpp."</p>"  ?>

            <h6><b> Valor por persona:</b></h6>
            <?php  echo "<p class=small>$".$preciopp."</p>"  ?>

            <a name="" id="" class="btn btn-light" href="#" role="button">Agregar al carrito</a>

        </div>


    </div>

</div>


</div>




<?php include("template/pie.php"); ?>