<?php
include("C:/xampp/htdocs/clubfutbol/bd/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/clubfutbol/css/nav.css">
    <link rel="stylesheet" type="text/css" href="/clubfutbol/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="/clubfutbol/bootstrap/bootstrap.bundle.min.js"></script>

</head>
<body>
    

<div class="encabezado">
        <div class="imagen">
        <img src="/clubfutbol/img/escudolyf.png" alt="">
        </div> 
    <h1>Bienvenido <?php echo $_SESSION["nombre"] ?> </h1>    
</div>



<?php

$solapa = basename($_SERVER['PHP_SELF']);
?>

<ul class="nav nav-tabs">
    <?php
    switch ($_SESSION['rol']) {
        case '1':
            echo '<li class="nav-item">
                    <a class="nav-link ' . (($solapa == 'home.php') ? 'active' : '') . '" href="/clubfutbol/vista/admin/home.php">Registro Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . (($solapa == 'alta_jugador.php') ? 'active' : '') . '" href="/clubfutbol/vista/admin/alta_jugador.php">Alta Jugador</a>
                </li>';
            break;
        case '2':
            echo '<li class="nav-item">
                    <a class="nav-link ' . (($solapa == 'alguna_pagina_empleado.php') ? 'active' : '') . '" href="../vista/alguna_pagina_empleado.php">Otra Pfffágina para Empleado</a>
                </li>';
            break;
        default:
            echo '<li class="nav-item">
                    <a class="nav-link ' . (($solapa == 'alguna_pagina_usuario.php') ? 'active' : '') . '" href="../vista/alguna_pagina_usuario.php">-----</a>
                </li>';
            break;
    }
    ?>
    <li class="nav-item">
        <a class="nav-link <?php echo ($solapa == 'logout.php') ? 'active' : ''; ?>" href="/clubfutbol/controlador/logout.php">Salir</a>
    </li>
</ul>

</body>
</html>