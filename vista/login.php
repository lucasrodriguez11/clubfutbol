<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Iniciar Sesión</title>
</head>

<body>
    <section>
        <div class="login-box">
            <div class="form-box">
                <h2>ACCEDER</h2>

                <form action="../controlador/cont_login.php" method="POST">
                <div class="inputbox">
                    <input type="number" name="dni" id="dni" required>
                    <label for="dni">Dni</label>
                </div>

                <div class="inputbox">
                    <input type="password" name="clave" id="clave" required>
                    <label for="name">Contraseña</label>
                </div>

                <button>Identificarme</button>
            
                </form>
            </div>
        </div>
    </section>

    <script>


    </script>
</body>

</html>