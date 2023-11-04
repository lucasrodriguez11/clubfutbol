<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <title>Registro</title>
</head>
<body>
    <section>
        <div class="register-box">
            <div class="form-box">
                <form action="../controlador/cont_register.php" method="POST" id="form_registro">
                    <h2>REGISTRO</h2>

                    <div class="inputbox">
                        <input type="text" id="nombreyapellido" name="nombreyapellido" required>
                        <label for="nombreyapellido">Nombre Completo</label>
                    </div>

                    <div class="inputbox">
                        <input type="number" id="dni" name="dni" required>
                        <label for="dni">D.N.I</label>
                    </div>

                    <div class="inputbox">
                        <input type="email" id="email" name="email" required>
                        <label for="email">Correo</label>
                    </div>

                    <div class="inputbox">
                        <input type="password" id="clave" name="clave" required>
                        <label for="clave">Contraseña</label>
                    </div>
                    
                    <div class="btn-register" id="registro" name="registro">
                        <button type="submit">Registrar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script type="text/javascript" src="../js/funciones.js"></script>
    
</body>
</html>
