<?php
include("./controlador/database.php");

$ID = $_GET['ID'];

$sql = "SELECT * FROM chequeo WHERE ID='$ID'";
$query = mysqli_query($conex, $sql);

$row = mysqli_fetch_array($query);
?>
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
  <header>
    <!-- place navbar here -->
    <?php
  require './partials/header.php' //Requiriendo modulo de header
  ?>
  </header>
  <main>
  <div class="container mt-5">

  
<form action="" method="POST">
    <input type="text" class="form-control mb-3" name="ID" placeholder="ID" value="<?php echo $row['id']  ?>" id="ID">
<script>
document.getElementById("ID").style.visibility = "hidden";
</script>


<?php
                    $id = $row['id'];
                    $nombreDispositivo = $row['nombreDispositivo'];
                    $arquitectura = $row['arquitectura'];
                    $plataforma = $row['plataforma'];
                    $fechaPc = $row['fechaPc'];
                    $fabricante_cpu = $row['fabricante_cpu'];
                    $modelo_cpu = $row['modelo_cpu'];
                    $velocidad_cpu = $row['velocidad_cpu'];
                    $memoria_total = $row['memoria_total'];
                    $memoria_serialNums = $row['memoria_serialNums'];
                    $descripcion = $row['descripcion'];
                    $proveedor_gpu = $row['proveedor_gpu'];
                    $modelo_gpu = $row['modelo_gpu'];
                    $vram_gpu = $row['vram_gpu'];
                    $tamaño_disco = $row['tamaño_disco'];
                    $serialNum_disco = $row['serialNum_disco'];
                    $created_at = $row['created_at'];
                    $updated_at = $row['updated_at'];
?>
<div class="col">
    <div class="row"><h5 class=''> Computador <?php echo $nombreDispositivo  ?></h5></div>
    <div class="row">
        <p class=''>El computador <?php echo $nombreDispositivo  ?> tiene un sistema operativo <?php echo $plataforma  ?> con una arquitectura <?php echo $arquitectura  ?>, este tiene como fecha y hora al momento de hacer este reporte <?php echo $fechaPc?> como fecha y hora asignada, esta computadora consta de un procesador <?php echo $modelo_cpu  ?> fabricado por <?php echo $fabricante_cpu?> que consta con una velocidad de <?php echo $velocidad_cpu?>, el equipo cuenta con una cantidad de <?php echo $memoria_total?>.GB de memoria RAM total, los seriales de la/las memoria/s RAM son las siguientes <?php echo $memoria_serialNums?> separadas por un guion cada una respectivamente, tiene una GPU <?php echo $modelo_gpu?> distribuido por <?php echo $proveedor_gpu?>  cuenta con una Memoria de <?php echo $vram_gpu?>.GB de video y cuenta con un disco duro de <?php echo $tamaño_disco?>.GB de espacio utilizable, su serial es <?php echo $serialNum_disco?>.</p>
    </div>
    <div class="row">
        <p class=''><small class='text-muted'>Ingresar datos de informe Fisico</small></p>
    </div>
    <div class="row">
        <textarea name='DESCRIPCION' id='' cols='15' rows='10' placeholder='INGRESAR INFORMACION DEL ESTADO FISICO DEL COMPUTADOR AQUI'><?php echo $row['descripcion']  ?></textarea>
        </div>
    <div class="row">
        <input name="cambios" type="submit" class="btn btn-primary btn-block" value="Actualizar">
    </div>
</div>                            
</div>

</form>


<?php
 require './controlador/ActualizarModAnotacion.php' 
 ?>

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
</body>

</html>