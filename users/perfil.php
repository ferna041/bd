<?php

include("../templates/cabecera.php")  

?>

<div class="row">
    
    
    <div class="col">
        
        <br/><br/><br/><br/>

        <div class="card text-left text-white bg-primary">

            
            <div class="card-body">
                
                <img src="../img/user-icon.png" width="70" height="70"">
                <h4> <?php echo "Mi perfil: $username $userlastname"; ?></h4>
                <p class="card-text"><?php echo "Nombre: $username"; ?></p>
                <p class="card-text"><?php echo "Apellido: $userlastname"; ?></p>
                <p class="card-text"><?php echo "Correo: $email" ?></p>
                <p class="card-text"><?php echo "Fecha de nacimiento: $fechanacimiento" ?></p>

            </div>

        </div>

        <br/><br/><br/><br/><br/>

    </div>



</div>

<?php  include("../templates/pie.php")  ?>