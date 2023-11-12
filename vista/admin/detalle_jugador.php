<?php
include("C:/xampp/htdocs/clubfutbol/bd/conexion.php");
session_start();
?>
<div class="users-table">
    <h2>JUGADOR</h2>
    <table>
        <thead>
            <tr>
                <td>NOMBRE</td>
                <td>FECHA NACIMIENTO</td>
                <td>PIERNA HABIL</td>
                <td>MANO HABIL</td>
                <td>POSICION</td>
                <td>POSICION ALTERNATIVA</td>
                <td>ESTADO</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            
            <?php
            
            $id_jugador = $_GET['id_jugador'];

            $sql= mysqli_prepare($connect, "SELECT jugadores.id_jugador, jugadores.nombre, jugadores.fecha_nacimiento,jugadores.pierna_habil,jugadores.mano_habil, 
            posicion.nombre_posicion , p.nombre_posicion as posicion_alt, estado_jugador.d_dato
            FROM jugadores 
            INNER JOIN usuarios ON usuarios.id_usuario = jugadores.id_username_fk
            INNER JOIN posicion ON posicion.id_posicion = jugadores.id_posicion_fk
            INNER JOIN estado_jugador ON estado_jugador.id_estado_jug = jugadores.id_estado_fk
            INNER JOIN posicion as p ON p.id_posicion = jugadores.posicion_alt
            WHERE id_jugador = ?" );
            mysqli_stmt_bind_param($sql, 'i', $id_jugador);
            mysqli_stmt_execute($sql);
            $resultado = mysqli_stmt_get_result($sql);

            while ($row = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['fecha_nacimiento'] ?></td>
                <td><?= $row['pierna_habil'] ?></td>
                <td><?= $row['mano_habil'] ?></td>
                <td><?= $row['nombre_posicion'] ?></td>
                <td><?= $row['posicion_alt'] ?></td>
                <td><?= $row['d_dato'] ?></td>
            
                <td> 
                <?php endwhile;
            
                mysqli_free_result($resultado);
                mysqli_close($connect);
                ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>


