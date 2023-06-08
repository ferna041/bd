<?php

include("../templates/cabecera.php");
?>


<div class="row">
                
                
                <div class="col-md-4"></div>
                
                
                
                <div class="col-md-4">
                    
                    <?php
                                                    
                        include("../conexionbd.php");
                        include("actualizarperfil.php");

                    ?>

                    <div class="card ">

                        <div class="card-body">

                            <form method="post" action="">


                                <div class="form-group row">
                                    
                                <label for="nombre" class="col-sm-14 col-form-label"> Nombre:</label>
                                <div class="col-sm-10">
                                    <input id="nombre" name="nombre" type="name" class="form-control" value="<?php echo $username; ?>">
                                </div>

                                <br/><br/>

                                <div class="form-group row">
                                    <label for="apellido" class="col-sm-10 col-form-label"> Apellido:</label>
                                    <div class="col-sm-11">
                                    <input id="apellido" name="apellido" type="name" class="form-control" value="<?php echo $userlastname; ?>">
                                </div>

                                <br/><br/>

                                <div class="form-group row">
                                    <label for="fecha" class="col-sm-10 col-form-label"> Fecha de nacimiento:</label>
                                    <div class="col-sm-10">
                                    <input id="fecha" name="fecha" type="date" class="form-control" value="<?php echo $fechanacimiento; ?>">
                                </div>

                                <br/><br/>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-10 col-form-label"> Email:</label>
                                    <div class="col-md-14">
                                        <input id="email" name="email" type="email" class="form-control" value="<?php echo $email; ?>">
                                    </div>
                                </div>

                                <br/><br/>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-10 col-form-label">Contraseña</label>
                                    <div class="col-sm-12">
                                        <input id="password" name="password" type="password" class="form-control" value=""></div>

                                    <br/><br/>
                                </div>

                                <div class="text-center">
                                    <button href="./modificar" type="submit" name="btnact" value="ok" class="btn btn-primary"> Actualizar </button>
                                </div>



                                </div>
                            </form>

                        </div>

                    </div>

                </div>


</div>
</div>


<?php

include("../templates/pie.php")  

?>