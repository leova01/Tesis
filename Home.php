<?php require './controlador/SessionOn.php'; ?>
<!--Validación de login-->

<!doctype html>
<html lang="es">

<head>
  <title>Labcomp</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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


  <main class="mt-5">

    <?php require './controlador/PrepOrCord.php'; ?>
    <div class='grid border'>


      <div class="item border">
        <h2>Equipos</h2>
        <img class='rounded mx-auto d-block img-fluid' style='width:125px;' src="./Assets/IMG/computadora.png" alt="">
          <div>
            <ul class="d-block">
              <il><a class="bubbly-button enviar mx-auto" href="./GestionMaquinas.php">Gestion de equipos</a></il>
            </ul>
          </div>


          </div>


          <div class='item border d-inline'>
        <h2>Anotaciones de registros previos</h2>
        <img class='rounded mx-auto d-block img-fluid' style='width:125px;' src="./Assets/IMG/reporte.png" alt="">
        <a href="./anotaciones.php" class='bubbly-button enviar'>Anotaciones</a>
      </div>

 

      </div>




    </div>




  </main>
  <?php
  require './partials/Footer.php'
  ?>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

  <!--Libreria de iconos iconify -->
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
  <!--libreria Jquery-->
<script src = "https://code.jquery.com/jquery-3.6.3.min.js" ></script>
  <!--libreria ajax-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!--libreria local js -->
  
</body>

</html>