<?php
session_start();

if (!isset($_SESSION['user'])){
header("location: ./vista/login.php");
}
else{
    
    switch($_SESSION['rol']){
        
        case 1: header("location: ./vista/admin/home.php");
        break;

        case 2:header("location: ./vista/empleado/home.php");
        break;

        case 2:header("location: ./usuario/home.php");
        break;
        
        default: echo var_dump($_SESSION['rol']);
    }
    // header("location: ../controlador/cont_login");
}



?>

