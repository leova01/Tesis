<?php require './controlador/SessionOn.php'; ?> <!--Validacion de logueo-->

<!doctype html>
<html lang="es">

<head>
    <title>Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/CSS/Style.css">
    <link rel="stylesheet" href="./Assets/CSS/regis.css">
    <link rel="shortcut icon" href="./Assets/IMG/favicon.ico" type="image/x-icon">
</head>

<body>

    <?php
    require './partials/header.php'
    ?> <!--requiriendo modulo del header-->

    <main>

        <?php if (!empty($message)) : ?>
            <p> <?= $message ?></p>
        <?php endif; ?>

        <h1 class="">Registrar equipo</h1>


        <form  method="POST">

        <div class="input-group">
                <span class="input-group-text">
                    <iconify-icon icon="material-symbols:drive-file-rename-outline-outline-sharp"></iconify-icon>
                </span>
                <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre pc">
            </div>



            <div class="input-group">
                <span class="input-group-text">
                    <iconify-icon icon="material-symbols:location-on"></iconify-icon>
                </span>
                <input name="ubicacion" type="text" aria-label="" class="form-control" placeholder="ingrese ubicacion de pc">
            </div>



            <div class="input-group">
                <span class="input-group-text">
                    <iconify-icon icon="eos-icons:ip"></iconify-icon>
                </span>
                <input name="ip" type="text" class="form-control" placeholder="Ingrese ip pc">
            </div>

            <div class="input-group">
                <span class="input-group-text">
                    <iconify-icon icon="ic:sharp-verified-user"></iconify-icon>
                </span>
                <input name="user" type="text" aria-label="" class="form-control" placeholder="ingrese username de pc">
            </div>

            <div class="input-group">
                <span class="input-group-text" id="addon-wrapping">
                    <iconify-icon icon="material-symbols:lock"></iconify-icon>
                </span>
                <input name="pass" type="password" class="form-control" placeholder="Clave" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group">
                <span class="input-group-text" id="addon-wrapping">
                    <iconify-icon icon="material-symbols:lock"></iconify-icon>
                </span>
                <input name="pass2" type="password" class="form-control" placeholder="Repetir Clave" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">
                    <iconify-icon icon="ic:baseline-security"></iconify-icon>
                </label>
                <select name="estado" class="form-select" id="inputGroupSelect01">
                    <option selected>Selecciona un rango</option>
                    <option value="A">Activa</option>
                    <option value="I">Inactiva</option>
                </select>
            </div>
            <input name="Registrar" class="bubbly-button enviar" type="submit">
        </form>
<?php  include "./controlador/registerPc.php"; ?> <!--Requiriendo las funciones de Registro-->


    </main>
    <?php
    require './partials/Footer.php'
    ?><!--requiriendo modulo del footer-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>

</html>