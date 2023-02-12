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
<!-- <a class="bubbly-button enviar" href="./controlador/CerrarSesion.php">Cerrar sesion</a> -->

  <main class="mt-5">

    <?php require './controlador/PrepOrCord.php'; ?>
    <div class='grid border'>


      <div class="item border">
        <h2>Seleccion de laboratorio</h2>
        <img class='rounded mx-auto d-block img-fluid' style='width:125px;' src="./Assets/IMG/computadora.png" alt="">
        <form action="">
          <div>
            <h3 class="d-inline">Prueba</h3>
            <ul class="d-inline">
              <il><input onclick="PopUp('K01')" class="opcion" type="button" value="Prueba" /></il>
            </ul>
          </div>

          <div>

          <?php
if (isset($_GET['submit'])) {
  // Inicialización de cURL
  $ch = curl_init();

  // Configuración de la solicitud
  curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/system-info');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json')
  );

  // Ejecución de la solicitud
  $result = curl_exec($ch);

  // Verificación de errores
  if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
  }

  // Cierre de cURL
  curl_close($ch);

  // Decodificación de la respuesta
  $response = json_decode($result, true);

  // Acceso a los datos de la respuesta
  echo 'Nombre del dispositivo: ' . $response['nombreDispositivo'] . '<br>';
  echo 'Arquitectura del sistema: ' . $response['sistema']['arquitectura'] . '<br>';
  echo 'Plataforma del sistema: ' . $response['sistema']['plataforma'] . '<br>';
  echo 'Versión del SO: ' . $response['sistema']['versionSO'] . '<br>';
  echo 'Fecha: ' . $response['fecha'] . '<br>';
  echo 'Hora: ' . $response['hora'] . '<br>';
  echo 'Fabricante de la CPU: ' . $response['cpu']['fabricante'] . '<br>';
  echo 'Modelo de la CPU: ' . $response['cpu']['modelo'] . '<br>';
  echo 'Velocidad de la CPU: ' . $response['cpu']['velocidad'] . '<br>';
  echo 'Memoria total: ' . $response['memoria']['total'] . '<br>';
  echo 'Memoria libre: ' . $response['memoria']['libre'] . '<br>';
  echo 'Fabricante de la tarjeta gráfica: ' . $response['tarjetaGrafica']['fabricante'] . '<br>';
  echo 'Modelo de la tarjeta gráfica: ' . $response['tarjetaGrafica']['modelo'] . '<br>';
  echo 'Memoria de la tarjeta gráfica: ' . $response['tarjetaGrafica']['memoria'] . '<br>';
}
?>

<form method="get">
  <input type="submit" name="submit" value="Enviar">
</form>

          </div>

        </form>

      </div>


      <div class='item border'>
        <h2>Ver registros previos</h2>
        <img class='rounded mx-auto d-block img-fluid' style='width:125px;' src="./Assets/IMG/reporte.png" alt="">
        <a class='bubbly-button enviar'>Solicitar Registros</a>
      </div>

    </div>

    <div class='ventana' id='ventana'>
      <iconify-icon icon='material-symbols:close' onclick='ClosePopUp()' class='salir'></iconify-icon>


      <div id='contenido2' class="contenido"></div>
      <input id='contenido' class="" type="text" value=" " disabled />


      <div id="informacion"></div>
      <button type="button" id="procesar">Aceptar</button>
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

  <!--libreria Jquery -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <!--libreria ajax-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <!--libreria local js -->
  <script src="./Assets/JS/PopUp.js"></script>
</body>

</html>