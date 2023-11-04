<?php
include("C:/xampp/htdocs/clubfutbol/bd/conexion.php");

session_start();

if (!isset($_SESSION['user'])){
header("location: ../clubfutbol/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/rol_admin.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap/bootstrap.bundle.min.js"></script>
</head>
<body>





</body>
</html>

