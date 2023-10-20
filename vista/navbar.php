<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap/bootstrap.bundle.min.js"></script>
</head>
<body>
    

<div class="encabezado">
        <div class="imagen">
        <img src="../img/escudolyf.png" alt="">
        </div> 
    <h1>Bienvenido <?php echo $_SESSION["nombre"] ?> </h1>    
</div>


<?php
$solapa = basename($_SERVER['PHP_SELF']);
?>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link <?php echo ($solapa == 'home.php') ? 'active' : ''; ?>" href="../vista/home.php">Inicio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($solapa == 'alta_jugador.php') ? 'active' : ''; ?>" href="../vista/alta_jugador.php">Alta Jugador</a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo ($solapa == 'logout.php') ? 'active' : ''; ?>" href="../controlador/logout.php">Salir</a>
    </li>
</ul>


</body>
</html>