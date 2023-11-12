<?php
include("C:/xampp/htdocs/clubfutbol/bd/conexion.php");

$nombre = $_POST['nombrej'];
$id_estado_fk = $_POST['id_estado_fk'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$pierna_habil = $_POST['pierna_habil'];
$mano_habil = $_POST['mano_habil'];
$id_posicion_fk = $_POST['id_posicion_fk'];
$posicion_alt = $_POST['posicion_alt'];
$id_username_fk = $_POST['id_username_fk'];
$nro_dorsal = $_POST['nro_dorsal'];

$insertar = mysqli_prepare($connect, "INSERT INTO jugadores (nombre,id_estado_fk, fecha_nacimiento, pierna_habil, mano_habil, id_posicion_fk, posicion_alt, nro_dorsal, id_username_fk) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Vincular los parámetros
mysqli_stmt_bind_param($insertar, "sssssssss", $nombre,$id_estado_fk, $fecha_nacimiento, $pierna_habil, $mano_habil, $id_posicion_fk, $posicion_alt, $nro_dorsal, $id_username_fk);


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

<?php
$dni = $_POST['dni'];
$clave = $_POST['clave'];

$query = mysqli_prepare($connect, "SELECT * FROM jugadores WHERE dni = ? and clave = ? " );
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



