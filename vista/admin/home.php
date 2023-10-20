<?php
include("../bd/conexion.php");
session_start();

if (!isset($_SESSION['user'])) {
    header("location: ../index.php");
    exit(); // exit() ess para evitar que el código siga ejecutándose después de redirigir.
}

function consultar_tipous() {
    global $connect; // un global para acceder a la conexión global.
    $tipous = array();
    
    $sql = "SELECT id_tipous, descripcion FROM tipous";
    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $tipous[] = $row;
    }

    return $tipous;
}


$sql = "SELECT usuarios.nombre_apellido, usuarios.dni, usuarios.email, tipous.descripcion AS tipous_descripcion
        FROM usuarios
        INNER JOIN tipous ON usuarios.id_tipo_us = tipous.id_tipous";

$resultado = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap/bootstrap.bundle.min.js"></script>
</head>
<body>
    
<?php
include("../vista/navbar.php")
?>
<section class="section1" id="section1">
<h1>Registro de Usuario </h1>
    <div class="sectionjugador">
      
    <form action="../controlador/cont_register.php" method="POST" id="form_registro">
            <label for="nombreyapellido">Nombre</label>
            <input type="text" id="nombreyapellido" name="nombreyapellido" required>
            <label for="dni">D.N.I</label>
            <input type="number" id="dni" name="dni" required>
            <label for="email">Correo</label>
            <input type="email" id="email" name="email" required>
            <label for="clave">Contraseña</label>
            <input type="password" id="clave" name="clave" required>
            <br></br>


            <div class="tipous">
            <label for="tipous">Tipo de Usuario</label>
            <select name="tipous" id="tipous">
            
                <?php
                $tipous = consultar_tipous();
                foreach ($tipous as $tipouss) {
                    echo "<option value='{$tipouss['id_tipous']}'>{$tipouss['descripcion']}</option>";
                }
                ?>
             </select>

             <div class="btn-register" id="registro" name="registro">
                <button type="submit">Registrar Usuario</button>
            </div>
             </div>
            </div>
            <br>
          
        </form>
    </div>
</section>

<div class="sectiontabla">
        <h2>Usuarios</h2>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>D.N.I</th>
                    <th>Correo</th>
                    <th>Tipo de usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila['nombre_apellido'] . "</td>";
                    echo "<td>" . $fila['dni'] . "</td>";
                    echo "<td>" . $fila['email'] . "</td>";
                    echo "<td>" . $fila['tipous_descripcion'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
</body>

</html>
