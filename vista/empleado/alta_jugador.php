<?php
include("./bd/conexion.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/clubfutbol/css/home.css">
    <link rel="stylesheet" type="text/css" href="/clubfutbol/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="/clubfutbol/bootstrap/bootstrap.bundle.min.js"></script>
    <title>Alta Jugador</title>
</head>
<body>


<?php
include("../vista/navbar.php")
?>


<div class="section1">
<div class="sectionjugador">
     <h1>Alta Jugador</h1>
<form action="" method="POST">
  
  <label for="nombrej">Nombre Jugador</label>
  <input type="text" name="nombrej" id="nombrej">

  <label for="edad">Edad</label>
  <input type="text" name="edad" id="edad">
  <br>
  
  <label for="nombre_posicion">Posicion</label>
  <select type="text" name="nombre_posicion" id="nombre_posicion">Posicion</select>
  <br>

  <label for="pierna_habil">Pierna Habil</label>
  <select name="pierna_habil" id="pierna_habil">
  
  <label for=""></label>
  <select name="" id=""></select>

</form>

</div>
</div>


</body>
</html>