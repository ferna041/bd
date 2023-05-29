<?php include("users/templates/cabecera.php");
include("config.php");?>

<?php

include("conexionbd.php");

$sentenciaSQL= $conexion->query("SELECT * FROM hoteles INNER JOIN productos ON hoteles.productos_id=productos.producto_id INNER JOIN wishlist 
                                                ON productos.producto_id=wishlist.producto_id AND usuario_id=$user_id AND producto_tipo=1");
$hoteles_deseados = $sentenciaSQL->fetch_all(MYSQLI_ASSOC);

$sentenciaSQL2= $conexion->query("SELECT * FROM paquetes INNER JOIN productos ON paquetes.productos_id=productos.producto_id INNER JOIN wishlist
                                                ON productos.producto_id=wishlist.producto_id AND usuario_id=$user_id AND producto_tipo=2");
$paquetes_deseados = $sentenciaSQL2->fetch_all(MYSQLI_ASSOC);

?>
<div class="card bg-primary text-left text-white">
  <img class="card-img-top" src="holder.js/100px180/" alt="">
  <div class="card-body">
    <h4 class="card-title">Paquetes Deseados</h4>
    

  </div>
</div>

<div>
    <div class="d-none d-sm-block">
</br>
    </div>
</div>

<?php if ($paquetes_deseados==null){ ?>
  <div class="card bs-gray-800 text-center">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
    </br>      
      <p class="card-text">No posees Paquetes Deseados por el momento...</p>
</br>
    </div>
  </div>
<?php } ;?>

<?php foreach($paquetes_deseados as $paquet){?> 
    
    <div class="col-md-3">
    
    <div class="card">
        <img class="card-img-top" src="https://images2.alphacoders.com/946/946565.jpg" alt="">
        <div class="card-body">

            <h6 class="card-Viaje text-center"><?php echo $paquet["paquetes_nombre"]; ?></h6>

            <div class="text-center">
                <a class="btn btn-primary" href="detalles.php?id=<?php echo $paquet["productos_id"];?>&token=<?php
                echo hash_hmac("sha1",$paquet["productos_id"],KEY_TOKEN);?>">Ver detalles</a>
                <br><br/>
                <a name="" id="" class="btn btn-dark" href="#" role="button">Agregar a la wishlist</a>
            </div>

        </div>
    </div>
    <br/>

</div>

<?php } ?>
            

<div>
    <div class="d-none d-sm-block">
</br>
    </div>
</div>


<div class="card bg-primary text-left text-white">
  <img class="card-img-top" src="holder.js/100px180/" alt="">
  <div class="card-body">
    <h4 class="card-title">Hoteles Deseados </h4>
           
  </div>
</div>

<div>
    <div class="d-none d-sm-block">
</br>
    </div>
</div>

<?php if ($hoteles_deseados==null){ ?>
  <div class="card bs-gray-800 text-center">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
    </br>      
      <p class="card-text">No posees Hoteles Deseados por el momento...</p>
</br>
    </div>
  </div>

<?php } ;?>

    <?php foreach($hoteles_deseados as $hotell){?> 
    
    <div class="col-md-3">
    
    <div class="card">
        <img class="card-img-top" src="https://images7.alphacoders.com/362/362619.jpg" alt="">
        <div class="card-body">
            <h6 class="card-Viaje"><?php echo $hotell["hoteles_nombre"]; ?></h6>
            <p class="small"><?php  echo "Ubicacion: ".$hotell["hoteles_ciudad"];  ?></p>
            <a name="" id="" class="btn btn-primary" href="#" role="button">Compra ya!</a>
        </div>
    </div>
    <br/>

</div>
<?php } ?>
      
<?php include("template/pie.php");?>