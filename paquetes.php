<?php 
include("template/cabecera.php");
include("config.php")
?>


<?php

include("conexionbd.php");
$selectSQL= $conexion->query("SELECT * FROM paquetes");
$paquetes=$selectSQL->fetch_all(MYSQLI_ASSOC);

?>

<?php foreach($paquetes as $paquete){?> 
    
    <div class="col-md-3">
    
    <div class="card">
        <img class="card-img-top" src="https://images2.alphacoders.com/946/946565.jpg" alt="">
        <div class="card-body">

            <h6 class="card-Viaje text-center"><?php echo $paquete["paquetes_nombre"]; ?></h6>

            <div class="text-center">
                <a class="btn btn-primary" href="detalles.php?id=<?php echo $paquete["productos_id"];?>&token=<?php
                echo hash_hmac("sha1",$paquete["productos_id"],KEY_TOKEN);?>">Ver detalles</a>
                <br><br/>
                <a name="" id="" class="btn btn-dark" href="#" role="button">Agregar a la wishlist</a>
            </div>

        </div>
    </div>

    <br/>


    </div>

<?php } ?>






<?php include("template/pie.php");?>