<?php 
include("templates/cabecera.php");
include("config.php");
include("conexionbd.php");
?>



<?php
$sentenciaSQL= $conexion->query("SELECT * FROM hoteles INNER JOIN productos ON hoteles.productos_id=productos.producto_id INNER JOIN carrito 
                                                ON productos.producto_id=carrito.productos_id AND usuario_id=$user_id AND producto_tipo=1");
$lista_carrito = $sentenciaSQL->fetch_all(MYSQLI_ASSOC);
?>

<?php

        if(!empty($_POST["btn-buy"])){
            
            $lqs=$conexion->query("SELECT * FROM carrito " );
            $lista_compra= $lqs->fetch_all(MYSQLI_ASSOC);

            foreach($lista_compra as $compra){
                $comprobacion=$conexion->query("SELECT * FROM compras WHERE usuario_id=$compra[usuario_id] AND productos_id=$compra[productos_id]");
                if(!($comprobacion->fetch_object())){
                    $lol=$conexion->query("SELECT * FROM productos WHERE producto_id=$compra[productos_id]");
                    $lol=$lol->fetch_object();
                    
                    if(($lol->producto_tipo)==1){
                        $agrgg=$conexion->query("INSERT INTO reseñas_hoteles VALUES ($compra[productos_id],$user_id,NULL,NULL,NULL,NULL,NULL,NULL)");
                    }
                    if(($lol->producto_tipo)==2){
                        $agrgg=$conexion->query("INSERT INTO reseñas_paquetes VALUES ($compra[productos_id],$user_id,NULL,NULL,NULL,NULL,NULL,NULL)");
                    }  
                }
                $lol=$conexion->query("SELECT * FROM productos WHERE producto_id=$compra[productos_id]");
                $lol=$lol->fetch_object();

                if(($lol->producto_tipo)==1){
                    $cantidades=$conexion->query("UPDATE hoteles SET hoteles_habitacionesdisp=hoteles_habitacionesdisp-$compra[cantidad] WHERE productos_id=$compra[productos_id]");
                }
                if(($lol->producto_tipo)==2){
                    $cantidades=$conexion->query("UPDATE paquetes SET paquetes_disponibles=paquetes_disponibles-$compra[cantidad] WHERE productos_id=$compra[productos_id]");
                }
            }
            $sql=$conexion->query("DELETE FROM carrito WHERE usuario_id=$user_id");  
            echo '<div class="alert alert-success"> COMPRA REALIZADA</div>';
        } 
?>



<?php
$sentenciaSQL= $conexion->query("SELECT * FROM hoteles INNER JOIN productos ON hoteles.productos_id=productos.producto_id INNER JOIN carrito 
                                                ON productos.producto_id=carrito.productos_id AND usuario_id=$user_id AND producto_tipo=1");
$hoteles_carrito = $sentenciaSQL->fetch_all(MYSQLI_ASSOC);

$sentenciaSQL2= $conexion->query("SELECT * FROM paquetes INNER JOIN productos ON paquetes.productos_id=productos.producto_id INNER JOIN carrito
                                                ON productos.producto_id=carrito.productos_id AND usuario_id=$user_id AND producto_tipo=2");
$paquetes_carrito = $sentenciaSQL2->fetch_all(MYSQLI_ASSOC);

$descuento=$conexion->query("SELECT * FROM carrito WHERE productos_id=0 AND usuario_id=$user_id");

$bandera=0;
if($descuento=$descuento->fetch_all(MYSQLI_ASSOC)){$bandera=1;}
?>


<main>  
<?php include("eliminarcarrito.php")?>
    <div class="table-responsive" >
        <table class="table bg-primary text-white">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>subtotal</th> 
                    <th>eliminar</th>
                </tr>
            </thead>
                <tbody >
                    <?php
                    if($paquetes_carrito == null && $hoteles_carrito == null){
                        echo '<tr><td colspan="5" class=text-center"<b> Carrito vacio...</b></td></tr></tbody></table>';
                    }else{
                        $total=0;
                        foreach($paquetes_carrito as $producto){ ?>
                            <td><?php echo $producto["paquetes_nombre"]?></td>
                            <td>$<?php echo $producto["paquetes_maxpp"]*$producto["paquetes_preciopp"]?></td>
                            <td><?php echo $producto["cantidad"] ?></td>
                            <td>$<?php echo $producto["paquetes_maxpp"]*$producto["paquetes_preciopp"]*$producto["cantidad"] ?></td>
                            <td>
                            <form method="post">
                            <a href="carrito.php?id=<?=$producto["productos_id"]?>" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></a>
                            </form>
                        </td>
                            </tbody>
                    <?php $total=$total+$producto["paquetes_maxpp"]*$producto["paquetes_preciopp"]*$producto["cantidad"];} ?>
                    <tbody >
                    <?php
                    foreach($hoteles_carrito as $producto){ ?>
                            <td><?php echo $producto["hoteles_nombre"]?></td>
                            <td>$<?php echo $producto["hoteles_precio"]?></td>
                            <td><?php echo $producto["cantidad"] ?></td>
                            <td>$<?php echo $producto["hoteles_precio"]*$producto["cantidad"] ?></td>
                            <td>
                                
                            <form method="post">
                            <a href="carrito.php?id=<?=$producto["productos_id"]?>" class="btn btn-small btn-danger"><i class="fas fa-trash"></i></a>
                            </form>


                            </td>
                            </tbody>
                    <?php $total=$total+$producto["hoteles_precio"]*$producto["cantidad"];} ?>
                    
                    <tbody>
                        <td></td>
                        <td></td>
                        <td><p class="h3 text-right" id="total"> DESCUENTO=  </td>
                        <td colspan="4" >
                            <p class="h3 text-left" id="total"><?php if($bandera){echo "$".$total*0.1; $total=$total*0.9;}else{echo "$0";}?></p>
                        </td> 

                </tbody>
                <tbody>
                        <td></td>
                        <td></td>
                        <td><p class="h3 text-right" id="total"> TOTAL =  </td>
                        <td colspan="4" >
                            <p class="h3 text-left" id="total"><?php echo "$".$total;?></p>
                        </td> 

                </tbody>
        </table>
                    <?php } ?>
    </div>
   
    <div class="row">
    <div class="col"></div class="col">
    <div class="col"></div class="col">
    <div class="col"></div class="col">
    <div class="col">
   <?php 
$sql3=$conexion->query("SELECT * FROM carrito");

if(($paquetes_carrito=$sql3->fetch_object())){ ?>
    <form method="post">
        <br/>
        <input name="btn-buy" class="btn btn-lg btn-dark" type="submit" value="Comprar!" size="200">
    </form>


<?php }?>

</div class="col">
</div class="row">
</main>    

<?php 
include("templates/pie.php");
?>