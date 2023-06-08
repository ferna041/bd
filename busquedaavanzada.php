<?php include("templates/cabecera.php"); ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Busqueda Avanzada</h4>
        <form action="controlsearchadv.php" method="GET">
            <div class="row">

                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tipobusqueda">Seleccione el tipo de busqueda:</label>
                        <select class="form-control" id="tipobusqueda" name="tipobusqueda">

                            <option value="HyP">Hoteles y paquetes</option>
                            <option value="Paquetes">Solo Paquetes</option>
                            <option value="Hoteles">Solo Hoteles</option>

                        </select>
                    </div>
                </div>
                
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="precio">Seleccione rango de precios:</label>
                        <select class="form-control" id="precio" name="precio">

                            <option value="nada">Seleccione una opcion</option>
                            <option value="100k">Menor a $100.000</option>
                            <option value="100-500k">Entre $100.000 y $500.000</option>
                            <option value="500k-1MM">Entre $500.000 y $1.000.000</option>
                            <option value="mas1MM">Mas de $1.000.000</option>

                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="estrellas">Calificacion minima:</label>
                        <select class="form-control" id="estrellas" name="estrellas">
                            
                            <option value="nada">Seleccione una opcion</option>
                            <option value="fivestars">5 estrellas</option>
                            <option value="4estrellas">4 estrellas</option>
                            <option value="3estrellas">3 estrellas</option>
                            <option value="2estrellas">2 estrellas</option>

                        </select>
                    </div>
                </div>


            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
</div>

<?php include("templates/pie.php"); ?>