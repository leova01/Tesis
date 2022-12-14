<?php require './controlador/SessionOn.php'; ?>
<!--Validacion de logueo-->

<!doctype html>
<html lang="en">

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


  <main class="">

    <?php require './controlador/PrepOrCord.php'; ?>
    <div class='grid border'>

    
    <div class="item border">
  <h2>Seleccion de aula</h2>
  <form action="">
    <div>
      <h3 class="d-inline">1F</h3>
      <ul class="d-inline">
        <il><input onclick="PopUp('F3')" class="opcion" type="button" value="F3" /></il>
        <il><input onclick="PopUp('F4')" class="opcion" type="button" value="F4" /></il>
        <il><input onclick="PopUp('F5')" class="opcion" type="button" value="F5" /></il>
        <il><input onclick="PopUp('F6')" class="opcion" type="button" value="F6"/></il>
        <il><input onclick="PopUp('F7')" class="opcion" type="button" value="F7"/></il>
        <il><input onclick="PopUp('F8')" class="opcion" type="button" value="F8"/></il>
        <il><input onclick="PopUp('F9')" class="opcion" type="button" value="F9"/></il>
        <il><input onclick="PopUp('F10')" class="opcion" type="button" value="F10"/></il>
        <il><input onclick="PopUp('F11')" class="opcion" type="button" value="F11"/></il>
        <il><input onclick="PopUp('F12')" class="opcion" type="button" value="F12"/></il>
      </ul>
    </div>


    <div>
      <h3 class="d-inline">Prueba</h3>
      <ul class="d-inline">
        <il><input onclick="PopUp('K01')" class="opcion" type="button" value="Prueba"/></il>
      </ul>
    </div>
</form>

</div>


      <div class='item border'>
        <h2>Ver registros previos</h2>
        <a class='bubbly-button enviar'>Solicitar Registros</a>
      </div>

    </div>

    <div class='ventana' id='ventana'>
      <iconify-icon icon='material-symbols:close' onclick='ClosePopUp()' class='salir'></iconify-icon>

      
      <div id='contenido2' class="contenido"></div>
      <input id='contenido'class="" type="text" value=" " disabled/>


      <div id="informacion"></div>
      <button type="button" id="procesar">Aceptar</button>
    </div>

    <a class="bubbly-button enviar" href="./controlador/CerrarSesion.php">Cerrar sesion</a>
  </main>
  <?php
  require './partials/Footer.php'
  ?>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<!--Libreria de iconos iconify -->
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
  
  <!--libreria Jquery -->
 <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<!--libreria ajax-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!--libreria local js -->
  <script src="./Assets/JS/PopUp.js"></script>
</body>

</html>