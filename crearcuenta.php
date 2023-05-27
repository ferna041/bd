<?php include("template/cabecera.php");?>



<form method="post" action="">

    <?php
                            
        include("conexionbd.php");
        include("controladorcrear.php");

    ?>

    <div class="form-group row">
        
        <label for="inputEmail3" class="col-sm-2 col-form-label"> Nombre:</label>
        <div class="col-sm-10">
            <input id="nombre" name="nombre" type="name" class="form-control" id="inputEmail3" placeholder="Ingrese su nombre">
        </div>

        <br/><br/>

        <div class="form-group row">
            <label for="apellido" class="col-sm-2 col-form-label"> Apellido:</label>
            <div class="col-sm-10">
            <input id="apellido" name="apellido" type="name" class="form-control" placeholder="Ingrese su apellido">
        </div>

        <br/><br/>

        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label"> Fecha de nacimiento:</label>
            <div class="col-sm-10">
            <input id="fecha" name="fecha" type="date" class="form-control" placeholder="Ingrese su fecha de nacimiento">
        </div>

        <br/><br/>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label"> Email:</label>
            <div class="col-sm-10">
                <input id="email" name="email" type="email" class="form-control" id="inputEmail3" placeholder="Ingrese su correo electronico">
            </div>
        </div>

        <br/><br/>

        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-10">
                <input id="password" name="password" type="password" class="form-control" id="inputPassword3" placeholder="Ingrese su contraseña">
            </div>
        </div>

        <br/><br/>

        <div class="col-sm-10">
            <input name="btncrear" class="btn btn-primary" type="submit" value="Registrarse">
        </div>

    </div>
</form>





<?php include("template/pie.php");?>