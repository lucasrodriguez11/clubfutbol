<?php
include("C:/xampp/htdocs/clubfutbol/bd/conexion.php");

$nombre = $_POST['nombreyapellido'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$clave = $_POST['clave'];
$id_estado = $_POST['id_estado'];
$id_tipo_us = $_POST['id_tipo_us'];


$verificacion = mysqli_prepare($connect, "SELECT * FROM usuarios WHERE dni = ? OR email = ?");
mysqli_stmt_bind_param($verificacion, "is", $dni, $email);
mysqli_stmt_execute($verificacion);

$r = mysqli_stmt_get_result($verificacion);

if (mysqli_num_rows($r) > 0) {
    echo '
        <script>
        alert("Los datos que intenta ingresar ya se encuentran registrados.");
        location.href = "../vista/admin/home.php";
        </script>';
}


$insertar = mysqli_prepare($connect, "INSERT INTO usuarios (nombre_apellido, email, clave, dni, id_estado, id_tipo_us) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($insertar, "sssiii", $nombre, $email, $clave, $dni, $id_estado, $id_tipo_us);


if ($r) {
    echo '
        <script>
        alert("¡Registro exitoso!");
        location.href = "../vista/admin/home.php";
        </script>';
} else {
    echo '
        <script>
        alert("Error en el registro: ' . mysqli_error($connect) . '");
        location.href = "../vista/admin/home.php";
        </script>';
}

mysqli_close($connect);
?>
