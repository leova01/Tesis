<?php
include("./controlador/database.php");

$ID = $_GET['ID'];

$sql = "SELECT * FROM equipos WHERE ID='$ID'";
$query = mysqli_query($conex, $sql);

$row = mysqli_fetch_array($query);
?>
<?php require './controlador/SessionOn.php'; ?>
<!--Validacion de logueo-->

<!doctype html>
<html lang="es">

<head>
  <title>Editar PC</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="./Assets/CSS/Style.css">
</head>

<body>
  <header>
    <!-- place navbar here -->
    <?php require './partials/header.php' ?>
  </header>
  <main>
  <div class="container mt-5">

  
        <form action="" method="POST">


            <input type="text" class="form-control mb-3" name="ID" placeholder="ID" value="<?php echo $row['ID']  ?>" id="ID">
<script>
document.getElementById("ID").style.visibility = "hidden";
</script>

            <input type="text" class="form-control mb-3" name="Nombre" placeholder="Nombre" value="<?php echo $row['Nombre']  ?>">

            <input type="text" class="form-control mb-3" name="user" placeholder="usuario" value="<?php echo $row['user']  ?>">

            <input type="text" class="form-control mb-3" name="contraseña" placeholder="contraseña" value="<?php echo $row['contraseña']  ?>">

            <input type="text" class="form-control mb-3" name="Ubicacion" placeholder="Ubicacion" value="<?php echo $row['Ubicacion']  ?>">

            <input type="text" class="form-control mb-3" name="IP" placeholder="IP" value="<?php echo $row['IP']  ?>">

            <select name="Nivel" class="form-select mb-3" id="inputGroupSelect01">
                    <option>Seleccionar rango</option>
                    <option value="A">Activo</option>
                    <option value="I">Inactivo</option>
            </select>



            <input name="cambios" type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>

      <?php require './controlador/ActualizarModPc.PHP' ?>

    </div>
  </main>
  <footer>
    <!-- place footer here -->
    <?php require './partials/Footer.php' ?>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>