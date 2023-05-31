<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.css"/>
  </head>
  <body>

        <div class="container">

            <br/>

            
            <div class="row">
                
                
                <div class="col-md-4"></div>
                
                
                
                <div class="col-md-4">
                    
                    <div class="card ">

                        <div class="card-body">

                            <form method="post" action="">

                                <?php
                                                        
                                    include("conexionbd.php");
                                    include("controladorcrear.php");

                                ?>

                                <div class="form-group row">
                                    
                                    <label for="inputEmail3" class="col-sm-14 col-form-label"> Nombre:</label>
                                    <div class="col-sm-10">
                                        <input id="nombre" name="nombre" type="name" class="form-control" id="inputEmail3" placeholder="Ingrese su nombre">
                                    </div>

                                    <br/><br/>

                                    <div class="form-group row">
                                        <label for="apellido" class="col-sm-10 col-form-label"> Apellido:</label>
                                        <div class="col-sm-11">
                                        <input id="apellido" name="apellido" type="name" class="form-control" placeholder="Ingrese su apellido">
                                    </div>

                                    <br/><br/>

                                    <div class="form-group row">
                                        <label for="fecha" class="col-sm-10 col-form-label"> Fecha de nacimiento:</label>
                                        <div class="col-sm-10">
                                        <input id="fecha" name="fecha" type="date" class="form-control" placeholder="Ingrese su fecha de nacimiento">
                                    </div>

                                    <br/><br/>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-10 col-form-label"> Email:</label>
                                        <div class="col-md-14">
                                            <input id="email" name="email" type="email" class="form-control" id="inputEmail3" placeholder="Ingrese su correo electronico">
                                        </div>
                                    </div>

                                    <br/><br/>

                                    <div class="form-group row">
                                        <label for="password" class="col-sm-10 col-form-label">Contraseña</label>
                                        <div class="col-sm-12">
                                            <input id="password" name="password" type="password" class="form-control" id="inputPassword3" placeholder="Ingrese su contraseña">
                                        </div>
                                    </div>

                                    
                                    <div class="col-sm-10">
                                        <br/>
                                        <input name="btncrear" class="btn btn-primary" type="submit" value="Registrarse">
                                    </div>

                                </div>
                            </form>

                        </div>

                    </div>

                </div>


            </div>

        </div>
      



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

