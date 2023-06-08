<?php

include("../templates/cabecera.php")  ;
include("../conexionbd.php");
include("../config.php");
?>

<?php
if(!empty($_POST["btn-del-acc"])){?>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ><b>Eliminar cuenta</b></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>¿Estas seguro de eliminar para siempre tu cuenta? yo me lo pensaría dos veces</p>
                
                <form method="post">
                    <div class="row text-center">
                    <div class="col-md-6">
                    <input type="submit" name="btn-desc" class="close bg-success" value="Aceptar descuento"> 
                    </div>
                    </form>

                    <div class="col-md-6">
                    <button type="submit" class="close bg-danger" data-dismiss="modal">Rechazar descuento</button>
                    </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>

<?php } ?>

<div class="row">
    
    
    <div class="col">
        
        <br/><br/>

        <div class="card text-left text-white bg-primary">

            
            <div class="card-body">
                
                <img src="../img/user-icon.png" width="70" height="70"">
                <h4> <?php echo "Mi perfil: $username $userlastname"; ?></h4>
                <p class="card-text"><?php echo "Nombre: $username"; ?></p>
                <p class="card-text"><?php echo "Apellido: $userlastname"; ?></p>
                <p class="card-text"><?php echo "Correo: $email" ?></p>
                <p class="card-text"><?php echo "Fecha de nacimiento: $fechanacimiento" ?></p>

                <a href="./modificar.php" class="btn btn-success"> Editar perfil</a>
                <br><br/>
                <form method="post">
                <input name="btn-del-acc" class="bg-danger" type="submit" value="Eliminar Cuenta">
                </form>
            </div>

        </div>

        <br/><br/><br/>

    </div>



</div>
<?php
$reseñas_paquetes=$conexion->query("SELECT * FROM reseñas_paquetes INNER JOIN paquetes ON reseñas_paquetes.productos_id=paquetes.productos_id and reseñas_paquetes.usuario_id=$user_id ORDER BY reseñas_paquetes.reseña_fecha");
$reseñas_paquetes=$reseñas_paquetes->fetch_all(MYSQLI_ASSOC);
?>
<?php
$reseñas_hoteles=$conexion->query("CALL get_resenas_hoteles($user_id)");
$reseñas_hoteles=$reseñas_hoteles->fetch_all(MYSQLI_ASSOC);
?>


<div class="card text-left bg-primary">
  <img class="card-img-top" src="holder.js/100px180/" alt="">
  <div class="card-body">
    <h4 class="card-title"><b>Reseñas hechas por ti</b></h4>
    </div>
</div>

<?php   
    foreach($reseñas_hoteles as $res){ if($res["limpieza"]!=null){?>
        <div class="col-md-4">
        
        <br/>

        <div class="card text-left text-white bg-primary">

            
            <div class="card-body">
                
                <img src="https://images7.alphacoders.com/362/362619.jpg" width="70" height="70">
                <b><?php echo $res["hoteles_nombre"]; ?></b>
                <p class="card-text">Fecha:  <?php echo $res["fecha_reseña"]?></p>

                <p class="card-text"><b>Limpieza:  </b><?php echo  $res["limpieza"] ?> <i class="fas fa-star" style="color:yellow;"></i></p>
                <p class="card-text"><b>Servicio:  </b><?php echo  $res["servicio"]?><i class="fas fa-star" style="color:yellow;"></i></p>
                <p class="card-text"><b>Decoración:  </b><?php echo  $res["decoración"]?><i class="fas fa-star" style="color:yellow;"></i></p>
                <p class="card-text"><b>Calidad de camas:  </b><?php echo  $res["calidad_camas"]?><i class="fas fa-star" style="color:yellow;"></i></p>
                <?php if($res["Reseña"]!=""){?>
                <p class="card-text"><b>Reseña:  </b><?php echo  $res["Reseña"]?></p>
                <?php }?>

            </div>

    </div><br/>

    </div>
    <?php }} ?>




<?php   
    foreach($reseñas_paquetes as $res){ if($res["calidad_hoteles"]!=null){?>
        
        <div class="col-md-4">
        
        <br/>

        <div class="card text-left text-white bg-primary">

            
            <div class="card-body">
                
                <img src="https://images2.alphacoders.com/946/946565.jpg" width="70" height="70">
                <b><?php echo $res["paquetes_nombre"] ; ?></b>
                <p class="card-text">Fecha:  <?php echo $res["reseña_fecha"]?></p>

                <p class="card-text"><b>Calidad de hoteles:  </b><?php echo  $res["calidad_hoteles"] ?><i class="fas fa-star" style="color:yellow;"></i></p>
                <p class="card-text"><b>Transporte:  </b><?php echo  $res["transporte"]?><i class="fas fa-star" style="color:yellow;"></i></p>
                <p class="card-text"><b>Servicio:  </b><?php echo  $res["servicio"]?><i class="fas fa-star" style="color:yellow;"></i></p>
                <p class="card-text"><b>Precio y calidad:  </b><?php echo  $res["precio_calidad"]?><i class="fas fa-star" style="color:yellow;"></i></p>
                <?php if($res["reseña"]!=""){?>
                <p class="card-text"><b>Reseña:  </b><?php echo  $res["reseña"]?></p>
                <?php }?>

            </div>

    </div><br/>

    </div>
    <?php }} ?>




<?php  include("../templates/pie.php")  ?>