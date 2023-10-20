<?php
include("../bd/conexion.php");

$dni = $_POST['dni'];
$clave = $_POST['clave'];

$query = mysqli_prepare($connect, "SELECT * FROM usuarios WHERE dni = ? and clave = ? " );
mysqli_stmt_bind_param($query, 'is', $dni, $clave);
mysqli_stmt_execute($query);

$filas = mysqli_stmt_get_result($query);

if (mysqli_num_rows($filas) > 0) {

    session_start();
    foreach ($filas as $fila) {
        $_SESSION['user'] = $fila['dni'];
        $_SESSION['rol'] = $fila['id_tipo_us'];
        $_SESSION['nombre'] = $fila['nombre_apellido'];
        $rol = $fila['id_tipo_us'];
    }

    header("location: ../index.php");
}

mysqli_close($connect);
