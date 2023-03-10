<?php require './controlador/SessionOn.php'; ?>
<!--Validación de login-->

<?php require './controlador/database.php';?>
<!--conexion BD-->


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
  <header>
    <!-- place navbar here -->
    <?php
  require './partials/header.php' //Requiriendo modulo de header
  ?>
  </header>
  <main>
    <div class="">
      <div class="d-flex flex-row mb-3 ms-3"><a href="./Home.php" class="btn btn-info btn-sm float-left mt-3 me-5">Volver</a></div>
      <div class=""><h1>Datos de equipos</h1></div>
     
    </div>
  

  <?php
$idUser=$_SESSION["id"];

if ($_SESSION["Rango"] === '2') {
    $sql = "select * from chequeo c where idUsuario = '$idUser' order by created_at desc ;";
    $query = mysqli_query($conex, $sql);

    
 
}
if ($_SESSION["Rango"] === '1') {

   $sql = "SELECT c.*, u.Nombre, u.Apellido 
   FROM chequeo c 
   INNER JOIN usuario u ON u.ID = c.idUsuario 
   WHERE u.ID = c.idUsuario  
   ORDER BY c.created_at DESC;";
    $query = mysqli_query($conex, $sql);

}
?>
<!--VALIDACION DE RANGO-->


  <div>
    <table class="table mt-5">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Nombre Pc</th>
                        <th>Fecha de creacion</th>
                        <th>Ultima modificacion</th>
                        <th>Observacion</th>
                        <?php if($_SESSION["Rango"] === '1'){echo '<th>preparador</th>';}?>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <th><?php echo $row['nombreDispositivo'] ?></th>

                            <th><?php echo $row['created_at'] ?></th>

                            <th><?php echo $row['updated_at'] ?></th>

                            <th><?php echo $row['descripcion'] ?></th>

                            <?php if($_SESSION["Rango"] === '1'){
                              ?>
                              <th><?php echo $row['Nombre'].' '.$row['Apellido']?></th>
                              <?php
                            }?>

                            <th><a href="./editAnotacion.php?ID=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>

                            <th><a href="./controlador/BorrarAnotacion.php?ID=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>
                        </tr>
                    <?php
                    }
                    ?>
            </table>
  </div>





  </main>
  <footer>
    <!-- place footer here -->
    <?php
  require './partials/Footer.php'
  ?>
  </footer>

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