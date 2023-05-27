<?php include("template/cabecera.php");?>


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
            <a name="" id="" class="btn btn-primary" href="#" role="button">Compra ya!</a>
        </div>
    </div>
    <br/>

</div>

<?php } ?>






<?php include("template/pie.php");?>