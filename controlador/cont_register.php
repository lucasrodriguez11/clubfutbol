<?php
include("../bd/conexion.php");

$nombre = $_POST['nombreyapellido'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$clave = $_POST['clave'];

$verificacion = mysqli_prepare($connect, "SELECT * FROM usuarios WHERE dni = ? OR email = ?");
mysqli_stmt_bind_param($verificacion, "is", $dni, $email);
mysqli_stmt_execute($verificacion);

$r = mysqli_stmt_get_result($verificacion);

if (mysqli_num_rows($r) > 0) {
    echo '
        <script>
        alert("Los datos que intenta ingresar ya se encuentran registrados.");
        </script>';
        exit();
}


$insertar = mysqli_prepare($connect, "INSERT INTO usuarios (nombre_apellido, email, clave, dni) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($insertar, "sssi", $nombre, $email, $clave, $dni);
$r = mysqli_stmt_execute($insertar);

if ($r) {
    echo '
        <script>
        alert("¡Registro exitoso!");
        location.href = "../vista/home.php";
        </script>';
} else {
    echo '
        <script>
        alert("Error en el registro: ' . mysqli_error($connect) . '");
        location.href = "../vista/home.php";
        </script>';
}

mysqli_close($connect);
?>
