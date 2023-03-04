
<?php
require './controlador/SessionOn.php';
require './controlador/database.php';


$sql = "select ID,user,contraseña,Nombre,Ubicacion,Estado,IP from equipos";
$query = mysqli_query($conex, $sql);



?>

<!doctype html>
<html lang="es">

<head>
    <title>Informacion Equipos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/CSS/Style.css">

</head>

<body>
    <header>
        <?php require './partials/header.php'; ?>
    </header>
    <main>
        <h1>Datos de equipos</h1>

        <a class='btn btn-info btn-sm float-right' href='./regisFormPc.php'>Registrar nuevo equipo</a>                                    <!--REALIZAAR EL REGISTRO DE EQUIPOS-->
        <div>
            <table class="table mt-5">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Nombre</th>
                        <th>Ubicacion</th>
                        <th>Estado</th>
                        <th>IP</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <th><?php echo $row['user'] ?></th>

                            <th><?php echo $row['contraseña'] ?></th>

                            <th><?php echo $row['Nombre'] ?></th>

                            <th><?php echo $row['Ubicacion'] ?></th>

                            
                            <th><?php
                            if($row['Estado']==='A'){
                                echo 'Activa';
                            }
                            if($row['Estado']==='I'){
                                 echo 'Inactiva'; 
                            }
                           
                            ?></th>

                            <th><?php echo $row['IP'] ?></th>




                            <th><a href="./editEquipo.php?ID=<?php echo $row['ID'] ?>" class="btn btn-info">Editar</a></th>

                            <th><a href="./controlador/BorrarPc.php?ID=<?php echo $row['ID'] ?>" class="btn btn-danger">Eliminar</a></th> 
                        </tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </main>
    <footer>
        <?php require './partials/Footer.php'; ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>