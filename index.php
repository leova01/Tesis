


<!doctype html>
<html lang="es">

<head>
    <title>LabComp</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/CSS/Style.css">
    <link rel="shortcut icon" href="./Assets/IMG/favicon.ico" type="image/x-icon">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg shadow">
            <div class="container-fluid">
                <a class="navbar-brand px-5" href="#">
                    <img src="./Assets/IMG/logo-urbe-sinfondo.gif" alt="" class="img-fluid m-1 " width="190">
                </a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container text-center" id="ContenidoP">

            <div class="row">
                <div class="col">
                    <h1>Inicio de aplicacion de gestión de procesos operativos</h1>
                    <p>Esta opción permite a los preparadores ingresar al sistema de gestion de procesos.</p>
                    <iconify-icon icon="gridicons:share-computer" width="90px"></iconify-icon>
                </div>
                <div class="col">
                    <div class="card">
                        <h5 class="card-title">Ingrese credenciales</h5>
                        <form  method="POST">
                            <div class="input-group flex-nowrap ">
                                <span class="input-group-text" id="addon-wrapping">
                                    <iconify-icon icon="mdi:email"></iconify-icon>
                                </span>
                                <input name="email" type="eail" class="form-control" placeholder="Correo electronico" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <div class="input-group flex-nowrap mt-5">
                                <span class="input-group-text" id="addon-wrapping">
                                    <iconify-icon icon="material-symbols:lock"></iconify-icon>
                                </span>
                                <input name="password" type="password" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <input name="btnIngreso" class="bubbly-button enviar" type="submit" value="Iniciar sesión">
                        </form>
                        <?php
                        require 'inic.php'
                        ?>
                    </div>
                </div>
            </div>

            <!--
            <button class="bubbly-button" onclick="log()">Iniciar Sesion</button>
            or
            <button class="bubbly-button" onclick="reg()">Registrar Usuario</button>
            -->

    </main>
    <footer class="text-center">
        <p>Universidad Privada Dr. Rafael Belloso Chacín.</p>
        <p>Dirección de Tecnologías de la Información - Unidad de Servicios Web</p>
        <p>© 2022 Powered by Servieduca All rights reserved</p>
    </footer>









    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="./Assets/JS/Botones.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>