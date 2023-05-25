
<?php include("template/cabecera.php");?>

            <div class="col-md-4">
                
            </div>

            <div class="col-md-4">


                <br/><br/><br/><br/><br/><br/><br/>
                <div class="card">
                    <div class="card-header">

                        Iniciar sesion

                    </div>

                    <div class="card-body">


                        <form method="post" action="">

                            <?php
                            
                                include("conexionbd.php");
                                include("controladorinicio.php");

                            ?>

                            <div class = "form-group">

                                <label>Correo electronico:</label>
                                <input id="email" type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico">
                                <small id="emailHelp" class="form-text text-muted">Recuerda, tus datos estan a salvo con nosotros.</small>

                            </div>

                            <div class="form-group">

                                <label>Contraseña:</label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">

                            </div>

                            <div class="text-center">
                                <br/>
                                <input name="btniniciosesion" class="btn btn-primary" type="submit" value="Iniciar sesion">
                                <br/><br/>
                                <a href="crearcuenta.php">¿No tienes una cuenta? Creala aquí!</a>
                            </div>

                            

                        </form>
                        
                        
                        
                    </div>
                    
                </div>
                
            </div>
            
<?php include("template/pie.php");?>