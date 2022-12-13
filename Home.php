<?php
session_start();
if (empty($_SESSION["id"])){
    header("location: index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Labcomp</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/CSS/Style.css">
    <link rel="shortcut icon" href="./Assets/IMG/favicon.ico" type="image/x-icon">
</head>

<body>
<?php
    require './partials/header.php'
?>

<?php echo $_SESSION["nombre"];?>
  <main>
  <a class="bubbly-button enviar" href="./controlador/CerrarSesion.php">Cerrar sesion</a>
  </main>
  <?php
    require './partials/Footer.php'
    ?>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>