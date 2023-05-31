
<!doctype html>
<html lang="en">
  <head>
    <title>Iniciar sesion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="./css/bootstrap.css"/>
  </head>
  <body>

    <div class="container">

        <br/>
    
        <div class="row">

            <div class="col-md-4"></div>
            

            <div class="col-md-4">


                <br/>
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

                <br/><br/><br/><br/>
                
            </div>

        </div>

    </div>
        
      
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    </body>
</html>     
