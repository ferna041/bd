<?php

session_start();
$user_id=$_SESSION['usuario_id'];
$username=$_SESSION['usuario_nombre'];
$userlastname=$_SESSION['usuario_apellido'];
$email=$_SESSION['usuario_email'];
$fechanacimiento=$_SESSION['usuario_fechanacimiento'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrestigueTravels</title>
    <link rel="stylesheet" href="../css/bootstrap.css"/>
</head>
<body>
    
    <nav class="navbar navbar-expand navbar-dark bg-primary text-white">
        
        
        <div class="navbar-collapse justify-content-start">
            
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    
                    <a class="nav-link text-white" href="index.php"><img src="../img/Logo_UTFSM.png" width="30" height="30">PrestigueTravels</a>
                </li>
                
                <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="../paquetes.php">Paquetes</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../hoteles.php">Hoteles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../wishlist.php">WishList</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../carrito.php">Carrito</a>
                    </li>


                    
                </ul>
            </div>
            
            <div class="collapse navbar-collapse justify-content-end">
                
                
                <ul class="navbar-nav">


                    <li class="nav-item">

                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">

                                    <?php echo "Cuenta: $username $userlastname";?></a>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="./users/perfil.php">Ver perfil</a>
                                <a class="dropdown-item" href="../../control_cerrarsesion.php">Cerrar sesion</a>
                                
                            </div>
                        </div>


                    </li>


                </ul>

            </div>

                
                       
        </nav>

        

        <div class="container">

        <br/>
            
            <div class="row">






