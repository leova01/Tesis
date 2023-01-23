
<?php
require './controlador/database.php';
require './controlador/SessionOn.php';

$sql = "SELECT `ID`,`Nombre`,`Apellido`,`email`,`Nivel`FROM `usuario`";
$query = mysqli_query($conex, $sql);

?>

<!doctype html>
<html lang="es">

<head>
    <title>Title</title>
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
        <h1>Ingrese datos del trabajador</h1>
        <form action="">
            <input type="text" placeholder="Nombre">
            <input type="text" placeholder="Apellido">
            <input type="text" placeholder="Email">
            <input type="button" value="Buscar" class="btn btn-info">
            
        </form>
        <div>
            <table class="table mt-5">
                <thead class="table-success table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Rango</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <th><?php echo $row['ID'] ?></th>
                            <th><?php echo $row['Nombre'] ?></th>

                            <th><?php echo $row['Apellido'] ?></th>

                            <th><?php echo $row['email'] ?></th>

                            <th><?php echo $row['Nivel'] ?></th>

                            <th><a href="./EditPrep.php?ID=<?php echo $row['ID'] ?>" class="btn btn-info">Editar</a></th>

                            <th><a href="./controlador/BorrarPrep.php?ID=<?php echo $row['ID'] ?>" class="btn btn-danger">Eliminar</a></th> 
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