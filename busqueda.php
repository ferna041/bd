<?php include("templates/cabecera.php")?>


<?php

include("conexionbd.php");
include("config.php");
$querypaquetes=$conexion->query("SELECT DISTINCT Paquete,NombrePaquete FROM busqueda");
$queryhoteles=$conexion->query("SELECT * FROM hoteles");


if(isset($_POST["btnsearch"])){

    $nombre=$_POST["nombre"];
    $ciudad=$_POST['Ciudad'];
    $inicio=$_POST['fechainicio'];
    $termino=$_POST['fechatermino'];

    if(!empty($_POST['nombre']) && !empty($_POST['Ciudad']) && !empty($_POST['fechainicio']) && !empty($_POST['fechatermino'])){

        $querypaquetes=$conexion->query("SELECT * FROM busqueda WHERE NombrePaquete LIKE '%$nombre%' AND Ciudad='$ciudad' AND Ida >= '$inicio'
        AND Vuelta<= '$termino'");

    } else if(!empty($_POST['nombre']) && !empty($_POST['Ciudad']) && !empty($_POST['fechainicio'])){

        $querypaquetes=$conexion->query("SELECT * FROM busqueda WHERE NombrePaquete LIKE '%$nombre%' AND Ciudad='$ciudad' AND Ida >= '$inicio'");

    } else if(!empty($_POST['nombre']) && !empty($_POST['Ciudad']) && !empty($_POST['fechavuelta'])){

        $querypaquetes=$conexion->query("SELECT * FROM busqueda WHERE NombrePaquete LIKE '%$nombre%' AND Ciudad='$ciudad' AND Vuelta >= '$termino'");

    } else if(!empty($_POST['fechainicio']) && !empty($_POST['fechatermino'])){

        $querypaquetes=$conexion->query("SELECT * FROM busqueda WHERE  Ida >= '$inicio' AND Vuelta<= '$termino'");

    } else if(!empty($_POST['fechainicio'])){

        $querypaquetes=$conexion->query("SELECT * FROM busqueda WHERE  Ida >= '$inicio'");

    } else if(!empty($_POST['fechatermino'])){

        $querypaquetes=$conexion->query("SELECT * FROM busqueda WHERE  Vuelta<= '$termino'");

    } else if(!empty($_POST['nombre']) && !empty($_POST['Ciudad'])){

        $querypaquetes=$conexion->query("SELECT * FROM busqueda WHERE NombrePaquete LIKE '%$nombre%' AND Ciudad='$ciudad'");
        $queryhoteles=$conexion->query("SELECT * FROM hoteles WHERE hoteles_nombre LIKE '%$nombre%' AND hoteles_ciudad='$ciudad'");

    } else if(!empty($_POST['nombre'])){

        $querypaquetes=$conexion->query("SELECT DISTINCT Paquete,NombrePaquete FROM busqueda WHERE NombrePaquete LIKE '%$nombre%'");
        $queryhoteles=$conexion->query("SELECT * FROM hoteles WHERE hoteles_nombre LIKE '%$nombre%'");

    } else if (!empty($_POST['Ciudad'])){

        $querypaquetes=$conexion->query("SELECT * FROM busqueda WHERE Ciudad='$ciudad'");
        $queryhoteles=$conexion->query("SELECT * FROM hoteles WHERE hoteles_ciudad='$ciudad'");

    } 

    
    
}

$hoteles=$queryhoteles->fetch_all(MYSQLI_ASSOC);
$paquetes=$querypaquetes->fetch_all(MYSQLI_ASSOC);


?>

<div class="card bg">

    <div class="card-header"><h2>Busqueda</h2></div>

    <div class="card-body">

        <form method="post">

            <div class="row">

                <div class="col-1-sm-3">

                    <input class="form-control" type="text" placeholder="Nombre hotel o paquete." name="nombre">
                    <br/>

                </div>

                <div class="col-2-sm-3">

                    <input class="form-control" type="text" placeholder="Ciudad" name="Ciudad">
                    <br/>

                </div>


                <div class="col-3-sm-2">

                    <p>Fecha inicio:</p>
                    <input class="form-control" type="date" name="fechainicio">
                    <br/>

                </div>

                <div class="col-4-sm-2">

                    <p>Fecha termino:</p>
                    <input class="form-control" type="date" name="fechatermino">
                    <br/>

                </div>

                <div class="col-4-sm-2 text-center">

                    <a href="busquedaavanzada.php">Busqueda Avanzada</a>
                    <br/>

                </div>


                <div class="col-4-sm-2 text-center">
                    <br/>

                    <input name="btnsearch" class="btn btn-primary" type="submit" value="Buscar">
                    <br/>

                </div>



            </div>



        </form>
        
    </div>

</div>


<?php foreach($paquetes as $paquete){?> 
    
    <div class="col-md-3">
        <br/><br/>
        
        <div class="card small">
            <img class="card-img-top" src="https://images2.alphacoders.com/946/946565.jpg" alt="">
            <div class="card-body">
                
                <h6 class="card-Viaje text-center"><?php echo $paquete["NombrePaquete"]; ?></h6>

                <div class="text-center">
                    <a class="btn btn-dark" href="detalle_paquetes.php?id=<?php echo $paquete["Paquete"];?>&token=<?php
                    echo hash_hmac("sha1",$paquete["Paquete"],KEY_TOKEN);?>">Ver detalles</a>

                
                </div>

            </div>
        </div>


    <br/>


    </div>

<?php } ?>


<?php foreach($hoteles as $hotel){?> 
    
    <div class="col-md-3">
    <br/><br/>
    
    <div class="card">
        <img class="card-img-top" src="https://images7.alphacoders.com/362/362619.jpg" weight="500" height="145">
        <div class="card-body">
            <h6 class="card-Viaje"><?php echo $hotel["hoteles_nombre"]; ?></h6>

            <div class="text-center">

                <a class="btn btn-primary" href="detalle_hoteles.php?id=<?php echo $hotel["productos_id"];?>&token=<?php
                echo hash_hmac("sha1",$hotel["productos_id"],KEY_TOKEN);?>">Ver detalles</a>
                
            </div>

        </div>
    </div>
    <br/>

</div>

<?php } ?>

<?php include("templates/pie.php")?>