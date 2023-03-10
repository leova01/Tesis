<?php require './controlador/SessionOn.php'; ?>
<!--Validación de login-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestion de equipos</title>

      <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="./Assets/CSS/Style.css">
  <link rel="shortcut icon" href="./Assets/IMG/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./Assets/CSS/grid.css">
  <link rel="stylesheet" href="./Assets/CSS/PopUp.css">
</head>
<body>
<?php
  require './partials/header.php' //Requiriendo modulo de header
  ?>    

<main class="mt5">
<div class="d-flex flex-row mb-3 ms-3"><a href="./Home.php" class="btn btn-info btn-sm float-left mt-3 me-5">Volver</a></div>
<div class="grid mt-5">
    <div class="item border mt-5">
        <h2>Modificar informacion de equipos</h2>
        <img src="./Assets/IMG/InformacionPc.png" alt="" class='rounded mx-auto d-block img-fluid' style='width:125px;'>
        <div>
            <ul class="d-block">
              <il><a class="bubbly-button enviar" href="./modiEquipos.php">Gestion de equipos</a></il>
            </ul>
          </div>
    </div>


    <div class="item border mt-5">
        <h2>Realizar analisis de equipos</h2>
        <img src="./Assets/IMG/analisis.png" alt="" class='rounded mx-auto d-block img-fluid' style='width:125px;'>
        <div>
            <ul class="d-block">
              <il><a class="bubbly-button enviar" href="./seleccionLaboratorio.php">Analizar</a></il>
            </ul>
          </div>
    </div>
</div>

</main>

  <?php
  require './partials/Footer.php'
  ?>

</body>
</html>

