<?php
include("C:/xampp/htdocs/clubfutbol/bd/conexion.php");
session_start();


function consultar_posicion() {
    
    include("../../bd/conexion.php");
    
    $sql = "SELECT id_posicion, nombre_posicion FROM posicion";
    $result = mysqli_query($connect, $sql);
    
    $posiciones = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $posiciones[] = $row;
    }
    
    mysqli_free_result($result);
    mysqli_close($connect);
    
    return $posiciones;
}
function consultar_usuario() {
    
    include("../../bd/conexion.php");
    
    $sql = "SELECT id_usuario, dni FROM usuarios";
    $result = mysqli_query($connect, $sql);
    
    $usuario = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $usuario[] = $row;
    }
    
    mysqli_free_result($result);
    mysqli_close($connect);
    
    return $usuario;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/clubfutbol/vista/admin/css/home.css">
    <link rel="stylesheet" type="text/css" href="/clubfutbol/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="/clubfutbol/bootstrap/bootstrap.bundle.min.js"></script>
    <title>Alta Jugador</title>
</head>
<body>


<?php
include("../navbar.php");
?>


<div class="section2">
<div class="sectionjugadoralta">
  
     <form action="../../controlador/cont_altajugador.php" method="POST">

     <h1>Alta Jugador</h1>
    <label for="nombrej">Nombre Jugador</label>
    <input type="text" name="nombrej" id="nombrej">
  
    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

    <label for="nombre_posicion">Posicion</label>
    <select name="nombre_posicion" id="nombre_posicion">
        <?php
        $posiciones = consultar_posicion();
        foreach ($posiciones as $posicion) {
            echo "<option value='{$posicion['id_posicion']}'>{$posicion['nombre_posicion']}</option>";
        }
        ?>
    </select> 
  
    <label for="posicion_alt">Posicion Alternativa</label>
    <select name="posicion_alt" id="posicion_alt">
        <?php
        foreach ($posiciones as $posicion) {
            echo "<option value='{$posicion['id_posicion']}'>{$posicion['nombre_posicion']}</option>";
        }
        ?>
    </select>

    <label for="pierna_habil">Pierna Habil</label>
    <select name="pierna_habil" id="pierna_habil">
        <option value="izquierda">Izquierda</option>
        <option value="derecha">Derecha</option>
        <option value="ambas">Ambas</option>
    </select>
  
    <label for="mano_habil">Mano Habil</label>
    <select name="mano_habil" id="mano_habil">
        <option value="izquierda">Izquierda</option>
        <option value="derecha">Derecha</option>
        <option value="ambas">Ambas</option>
    </select>

    <label for="usuario">Usuario</label>
    <select name="usuario" id="usuario">
    <?php
      $usuario = consultar_usuario();
        foreach ($usuario as $usuarios) {
            echo "<option value='{$usuarios['id_usuario']}'>{$usuarios['dni']}</option>";
        }
        ?>
    </select>

    <label for="nro_dorsal">Numero Camiseta</label>
    <<input type="number" id="nro_dorsal" name="nro_dorsal" required>

    <div class="btn-jugador" id="btn-jugador" name="btn-jugador">
        <button type="submit">Agregar Jugador</button>
    </div>
</form>

</div>
</div>

<div class="sectiontabla2">
    <?php
if (isset($jugador)) {
    echo "<h2>Datos del Jugador</h2>";
    echo "<table border='1'>
            <tr>
                <th>Nombre Jugador</th>
                <th>Fecha de Nacimiento</th>
                <th>Posición</th>
                <th>Posición Alternativa</th>
                <th>Pierna Hábil</th>
                <th>Mano Hábil</th>
                <th>Usuario</th>
                <th>Número Camiseta</th>
            </tr>
            <tr>
                <td>{$jugador['nombrej']}</td>
                <td>{$jugador['fechaNacimiento']}</td>
                <td>{$jugador['nombrePosicion']}</td>
                <td>{$jugador['posicionAlt']}</td>
                <td>{$jugador['piernaHabil']}</td>
                <td>{$jugador['manoHabil']}</td>
                <td>{$jugador['usuario']}</td>
                <td>{$jugador['nroDorsal']}</td>
            </tr>
          </table>";
}
?>
    </div>

    <?php
    // cont_altajugador.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombrej = $_POST["nombrej"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];
    $nombrePosicion = $_POST["nombre_posicion"];
    $posicionAlt = $_POST["posicion_alt"];
    $piernaHabil = $_POST["pierna_habil"];
    $manoHabil = $_POST["mano_habil"];
    $usuario = $_POST["usuario"];
    $nroDorsal = $_POST["nro_dorsal"];

    // Procesa los datos como desees, como guardarlos en una base de datos.
    // Ejemplo de cómo guardarlos en un array:
    $jugador = [
        "nombrej" => $nombrej,
        "fechaNacimiento" => $fechaNacimiento,
        "nombrePosicion" => $nombrePosicion,
        "posicionAlt" => $posicionAlt,
        "piernaHabil" => $piernaHabil,
        "manoHabil" => $manoHabil,
        "usuario" => $usuario,
        "nroDorsal" => $nroDorsal,
    ];
}
?>


</body>
</html>