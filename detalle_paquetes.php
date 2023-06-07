<?php

include("templates/cabecera.php");

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

<?php

        if(!empty($_POST["btn-atw"])){
                
            $sql=$conexion->query("INSERT INTO wishlist VALUES ($user_id,$id)");  
            echo '<div class="alert alert-success"> Agregado a la wishlist! </div>';

        } else if(!empty($_POST["btn-dtw"])){

            $sql=$conexion->query("DELETE FROM wishlist WHERE producto_id=$id AND usuario_id=$user_id");
            echo '<div class="alert alert-success"> Borrado de la wishlist! </div>';

        }

?> 

<?php

        if(!empty($_POST["btn-atc"])){
            
            $qlp=$conexion->query("SELECT * FROM carrito WHERE usuario_id=$user_id AND productos_id=$id");

            if(sizeof($qlp->fetch_all(MYSQLI_ASSOC)) > 0){
                $sqll=$conexion->query("UPDATE carrito SET cantidad=cantidad+1 WHERE usuario_id=$user_id AND productos_id=$id"); 
            }
            else{
            $sqll=$conexion->query("INSERT INTO carrito VALUES ($user_id,$id,1)"); 
            }
            



            echo '<div class="alert alert-success"> Agregado al carrito! </div>';

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

            <?php
                $sql=$conexion->query("SELECT * FROM compras WHERE usuario_id=$user_id AND productos_id=$id"); 
                if($sql->fetch_all()){ ?>
                    <br>
                    <br/>
                    <h4><a class="btn btn-dark" href="reseñas_paquetes.php?id=<?php echo $id;?>&token=<?php
                echo hash_hmac("sha1",$id,KEY_TOKEN);?>">Dejar Reseña</a></h4>
                    
                <?php } ?>


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

            <?php 

                $sql33=$conexion->query("SELECT * FROM carrito WHERE productos_id=$id AND usuario_id=$user_id");
                $sql33=$sql33->fetch_all(MYSQLI_ASSOC);

                if((sizeof($sql33))>0){ 

                    $cant = $sql33;
                    
                    if(($cant[0]["cantidad"])<3){?>
                        <form method="post">
                        <br/>
                        <input name="btn-atc" class="btn btn-dark" type="submit" value="Agregar al carrito">
                    </form>
                    <?php } else {
                        echo '<a name="" id="" class="btn btn-light" href="#" role="button">Máxima cantidad de este producto en el carrito</a>';
                    
                    } ?>
            <?php } else { ?>
                <form method="post">
                        <br/>
                        <input name="btn-atc" class="btn btn-dark" type="submit" value="Agregar al carrito">
                    </form>

                <?php } ?>
            <?php 

                $sql3=$conexion->query("SELECT * FROM wishlist WHERE producto_id=$id AND usuario_id=$user_id");
            
                if(!($datos=$sql3->fetch_object())){ ?>
                    <form method="post">
                        <br/>
                        <input name="btn-atw" class="btn btn-dark" type="submit" value="Agregar a Wishlist">
                    </form>


            <?php } 
                else{ ?>

                    <form method="post">
                        <br/>
                        <input name="btn-dtw" class="btn btn-dark" type="submit" value="Eliminar de wishlist">
                    </form>


            <?php } ?>
            
            

        </div>

    </div>
    
</div>


</div>





<?php include("templates/pie.php"); ?>