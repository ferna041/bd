<?php include("template/cabecera.php");?>


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
            <h6 class="card-Viaje"><?php echo $paquete["paquetes_nombre"]; ?></h6>
            <a name="" id="" class="btn btn-primary" href="#" role="button">Compra ya!</a>
        </div>
    </div>
    <br/>

</div>

<?php } ?>






<?php include("template/pie.php");?>