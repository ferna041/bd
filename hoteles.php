<?php 

include("templates/cabecera.php");
include("config.php");

?>


<?php

include("conexionbd.php");
$selectSQL= $conexion->query("SELECT * FROM hoteles");
$hoteles=$selectSQL->fetch_all(MYSQLI_ASSOC);

?>

<?php foreach($hoteles as $hotel){?> 
    
    <div class="col-md-3">
    
    <div class="card">
        <img class="card-img-top" src="https://images7.alphacoders.com/362/362619.jpg" alt="">
        <div class="card-body">
            <h6 class="card-Viaje"><?php echo $hotel["hoteles_nombre"]; ?></h6>
            <p class="small"><?php  echo "Ubicacion: ".$hotel["hoteles_ciudad"];  ?></p>

            <div class="text-center">

                <a class="btn btn-primary" href="detalle_hoteles.php?id=<?php echo $hotel["productos_id"];?>&token=<?php
                echo hash_hmac("sha1",$hotel["productos_id"],KEY_TOKEN);?>">Ver detalles</a>
                
            </div>

        </div>
    </div>
    <br/>

</div>

<?php } ?>






<?php include("templates/pie.php");?>