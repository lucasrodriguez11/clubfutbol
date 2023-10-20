<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bdname = "escuelafutbol";


$connect = mysqli_connect($servername, $username, $password, $bdname);

if (!$connect) {

    echo "fallo la conexion";
}

?>



