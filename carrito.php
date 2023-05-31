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
                    $agregar=$conexion->query("INSERT INTO compras VALUES ($compra[productos_id],$compra[usuario_id])");
                }
            }

            $sql=$conexion->query("DELETE FROM carrito");  
            
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
?>






<main>  
    <div class="table-responsive" >
        <table class="table bg-primary text-white">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio total</th>
                    <th>Cantidad</th>
                    <th>descuento</th>
                    <th>subtotal</th> 
                    <th></th>
                </tr>
            </thead>
                <tbody >
                    <?php
                    if($paquetes_carrito == null && $hoteles_carrito == null){
                        echo '<tr><td colspan="5" class=text-center"<b> Carrito vacio...</b></td></tr></tbody></table>';
                    }else{
                        foreach($paquetes_carrito as $producto){ ?>
                            <td><?php echo $producto["paquetes_nombre"]?></td>
                            <td>$<?php echo $producto["paquetes_preciopp"]?></td>
                            <td><?php echo 5 ?></td>
                            <td><?php echo "si" ?></td>
                            <td><?php echo 5*$producto["paquetes_preciopp"] ?></td>
                            </tbody>
                    <?php } ?>
                    <tbody >
                    <?php
                    foreach($hoteles_carrito as $producto){ ?>
                            <td><?php echo $producto["hoteles_nombre"]?></td>
                            <td>$<?php echo $producto["hoteles_nombre"]?></td>
                            <td><?php echo 5 ?></td>
                            <td><?php echo "si" ?></td>
                            <td><?php echo $producto["hoteles_nombre"] ?></td>
                            </tbody>
                    <?php } ?>
                    
                <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><p class="h3 text-right" id="total"> TOTAL =  </td>
                        <td colspan="4" >
                            <p class="h3 text-left" id="total"><?php echo "0"?></p>
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