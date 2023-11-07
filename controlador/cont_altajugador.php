<?php
include("C:/xampp/htdocs/clubfutbol/bd/conexion.php");

$nombre = $_POST['nombrej'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$pierna_habil = $_POST['pierna_habil'];
$mano_habil = $_POST['mano_habil'];
$posicion_alt = $_POST['posicion_alt'];
$nombre_posicion = $_POST['nombre_posicion'];
$nro_dorsal = $_POST['nro_dorsal'];

$insertar = mysqli_prepare($connect, "INSERT INTO jugadores (nombre, fecha_nacimiento, pierna_habil, mano_habil, posicion_alt, nombre_posicion, nro_dorsal) VALUES (?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($insertar, "ssssssi", $nombre, $fecha_nacimiento, $pierna_habil, $mano_habil, $posicion_alt, $nombre_posicion, $nro_dorsal);


if (mysqli_stmt_execute($insertar)) {
    echo '
        <script>
        alert("¡Registro exitoso!");
        location.href = "../vista/admin/alta_jugador.php";
        </script>';
} else {
    echo '
        <script>
        alert("Error en el registro: ' . mysqli_error($connect) . '");
        location.href = "../vista/admin/alta_jugador.php";
        </script>';
}

mysqli_stmt_close($insertar);
mysqli_close($connect);
?>



