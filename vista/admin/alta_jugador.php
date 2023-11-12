<?php
include("C:/xampp/htdocs/clubfutbol/bd/conexion.php");
session_start();


function consultar_posicion() {
    
    include("../../bd/conexion.php");
    
    $sql = "SELECT id_posicion, nombre_posicion FROM posicion  ";
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

function consultar_estado_jugador() {
    include("../../bd/conexion.php");
    
    $sql = "SELECT id_estado_jug, d_dato FROM estado_jugador";
    $result = mysqli_query($connect, $sql);
    
    $estadojugador = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $estadojugador[] = $row;
    }
    
    mysqli_free_result($result);
    mysqli_close($connect);
    
    return $estadojugador;
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

    <label for="id_username_fk">Usuario</label>
    <select name="id_username_fk" id="id_username_fk">
    <?php
      $usuario = consultar_usuario();
        foreach ($usuario as $usuarios) {
            echo "<option value='{$usuarios['id_usuario']}'>{$usuarios['dni']}</option>";
        }
        ?>
    </select>

    <label for="nombrej">Nombre Jugador</label>
    <input type="text" name="nombrej" id="nombrej">

    <label for="id_estado_fk">Estado</label>
    <select name="id_estado_fk" id="id_estado_fk">
    <?php
      $estadojugador = consultar_estado_jugador();
        foreach ($estadojugador as $estadojugador) {
            echo "<option value='{$estadojugador['id_estado_jug']}'>{$estadojugador['d_dato']}</option>";
        }
        ?>
    </select>
  
    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>

    <label for="id_posicion_fk">Posicion</label>
    <select name="id_posicion_fk" id="id_posicion_fk">
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

    <label for="nro_dorsal">Numero Camiseta</label>
    <input type="number" id="nro_dorsal" name="nro_dorsal" required>

    <div class="btn-jugador" id="btn-jugador" name="btn-jugador">
        <button type="submit">Agregar Jugador</button>
    </div>
</form>

</div>
</div>

<div class="table table-bordered border-primary">
    <h2>PLANTILLA DE JUGADORES</h2>
    <table>
        <thead>
            <tr>
                <td>USUARIO</td>
                <td>NOMBRE JUGADOR</td>
                <td>ESTADO</td>
                <td>CATEGORIA</td>
                <td>POSICION</td>
                <td>NUMERO CAMISETA</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            
            <?php
            $sql = "SELECT jugadores.id_jugador, usuarios.dni, jugadores.nombre, estado_jugador.d_dato , jugadores.fecha_nacimiento, posicion.nombre_posicion, jugadores.nro_dorsal
                    FROM jugadores
                    INNER JOIN usuarios ON jugadores.id_username_fk = usuarios.id_usuario
                    INNER JOIN estado_jugador ON jugadores.id_estado_fk = estado_jugador.id_estado_jug
                    INNER JOIN posicion ON jugadores.id_posicion_fk = posicion.id_posicion";
            $result = mysqli_query($connect, $sql);
            
            while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                <td><?= $row['dni'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['d_dato'] ?></td>
                <td><?= $row['fecha_nacimiento'] ?></td>
                <td><?= $row['nombre_posicion'] ?></td> 
                <td><?= $row['nro_dorsal'] ?></td>
                <td> 
                <a href="detalle_jugador.php?id_jugador=<?= $row['id_jugador'] ?>" class="users-table--edit">Ver detalle</a>
                </td>
                </tr>
                <?php endwhile;
            
                mysqli_free_result($result);
                mysqli_close($connect);
                ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>

</body>
</html>