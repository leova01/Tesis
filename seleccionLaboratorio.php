<?php  require './controlador/SessionOn.php'; ?>

<!doctype html>
<html lang="es">

<head>
  <title>Seleccion de Laboratorios</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!--Iconify-->
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<!------------------------------------------------------------------------------------------------------------->
<link rel="stylesheet" href="./Assets/CSS/Style.css" />
    <link rel="shortcut icon" href="./Assets/IMG/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./Assets/CSS/seleccion.css">
<!------------------------------------------------------------------------------------------------------------->

</head>

<body>
  <header>
    <!-- place navbar here -->
    <?php
        require './partials/header.php' //Requiriendo modulo de header
    ?>
  </header>
  <main>
  <div class="d-flex flex-row mb-3 ms-3"><a href="./GestionMaquinas.php" class="btn btn-info btn-sm float-left mt-3 me-5">Volver</a></div>
  <div id="loader" class="loader">Cargando...</div>

  <?php


                if(isset($_POST['ejecutar'])){

                    $entrada = $_POST['ejecutar'];
                    $idUser=$_SESSION["id"];

                    require './controlador/database.php';
              
                    $sql = "SELECT ip, user, contraseña FROM equipos WHERE Ubicacion = '$entrada' AND Estado = 'A'";
                    $query = mysqli_query($conex, $sql);
                
                    while ($row = mysqli_fetch_assoc($query)) {
                        $ip = $row['ip'];
                        $user = $row['user'];
                        $pass = $row['contraseña'];
                
                        $host = $ip;  // dirección IP de la PC cliente
                        $username = $user;  // nombre de usuario para la conexión SSH
                        $password = $pass;  // contraseña para la conexión SSH
                        $cmd = 'node pruebaExamen.js'; // Comando a ejecutar en la PC cliente
                
                        // Intentar establecer la conexión SSH
                        $ssh = @ssh2_connect($host);
                
                        // Verificar si la conexión SSH se estableció correctamente
                        if (is_resource($ssh)) {
                            // Realizar la autenticación SSH
                            $auth = @ssh2_auth_password($ssh, $username, $password);
                            if ($auth) {
                                // Ejecutar el comando en la PC cliente
                                $output = ssh2_exec($ssh, $cmd);
                                stream_set_blocking($output, true);
                                $data = '';
                                while ($buf = fread($output, 4096)) {
                                    $data .= $buf;
                                }
                                echo $data;
                            } else {
                                echo "No se pudo autenticar en la PC cliente con la dirección IP: " . $ip . "<br>";
                            }
                        } else {
                            echo "No se pudo establecer la conexión SSH para la PC cliente con la dirección IP: " . $ip . "<br>";
                        }
                    }
                /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                 
                    // $sql2 = "SELECT DISTINCT *
                    //  FROM chequeo
                    //  WHERE created_at BETWEEN DATE_SUB(NOW(), INTERVAL 5 MINUTE) AND NOW() AND DATE(created_at) = CURDATE() order by nombreDispositivo;";

                    
                    $sql2="UPDATE chequeo c JOIN equipos e ON c.nombreDispositivo = e.Nombre SET idUsuario = $idUser 
                    WHERE c.created_at BETWEEN DATE_SUB(NOW(), INTERVAL 5 MINUTE) AND NOW() AND DATE(c.created_at) = CURDATE()
                     AND e.Ubicacion = '$entrada'AND idUsuario IS NULL ORDER BY c.nombreDispositivo;";
                    $query2 = mysqli_query($conex, $sql2);

                    $sql3="SELECT DISTINCT c.*
                    FROM chequeo c JOIN equipos e ON c.nombreDispositivo = e.Nombre
                    WHERE c.created_at BETWEEN DATE_SUB(NOW(), INTERVAL 5 MINUTE) AND NOW() AND DATE(c.created_at) = CURDATE() AND e.Ubicacion = '$entrada'
                    ORDER BY c.nombreDispositivo;
                    ";
                   $query3 = mysqli_query($conex, $sql3);

                   
                   echo "<div id='resultado'>";

                   echo "<div id='carouselExampleFade' class='carousel slide carousel-fade' data-bs-ride='carousel'>
                   <div class='carousel-inner'>
                     ";

                   while($row = mysqli_fetch_assoc($query3)){
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


                        

                    $formulario="<div class='carousel-item active'>
                                  <div class='card'>
                                  <div class='card-body'>
                                  <h5 class='card-title'> Computador $nombreDispositivo</h5>
                                  <p class='card-text'>El computador $nombreDispositivo tiene un sistema operativo $plataforma con una arquitectura $arquitectura, 
                                  este tiene como fecha y hora al momento de hacer este reporte $fechaPc como fecha y hora asignada, 
                                  esta computadora consta de un procesador $modelo_cpu fabricado por $fabricante_cpu que consta con una velocidad de $velocidad_cpu, 
                                  el equipo cuenta con una cantidad de $memoria_total.GB de memoria RAM total, 
                                  los seriales de la/las memoria/s RAM son las siguientes $memoria_serialNums separadas por un guion cada una respectivamente,  
                                  tiene una GPU $modelo_gpu distribuido por $proveedor_gpu cuenta con una Memoria de $vram_gpu.GB de video y cuenta con un disco duro de $tamaño_disco.GB de espacio utilizable, 
                                  su serial es $serialNum_disco.</p>
                                  </div>
                                  <input type='hidden' name='id' value='$id'>
                                  </div>
                                  </div>";

                    echo $formulario;       
                    } 
                    
                    
                    echo"  </div>
                    <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleFade' data-bs-slide='prev'>
                      <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                      <span class='visually-hidden'>Previous</span>
                    </button>
                    <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleFade' data-bs-slide='next'>
                      <span class='carousel-control-next-icon' aria-hidden='true'></span>
                      <span class='visually-hidden'>Next</span>
                    </button>
                  </div>";

                    echo "</div>";

                }

?>





<form name="ejecutar" method="post">
    <div class="container">
        <div class="row text-center">
        <h2>Simulacion de laboratorio</h2>
            <div class="col">
                <button type="submit" name="ejecutar" value="K01" class='container-block btn-hover' onclick="showLoader()" >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio Simulado</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
        </div>
    </div>

    <div class="container">
         <div class="row mb-4">
            <h2>Seleccion de laboratorio 1F</h2>
            <div class=" col">
                <button type="submit" onclick="showLoader()" name="ejecutar" value="F03" class='container-block btn-hover'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F3</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
            <button type="submit" onclick="showLoader()" name="ejecutar" value="F04" class='container-block btn-hover'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F4</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
            <button type="submit" onclick="showLoader()" name="ejecutar" value="F05" class='container-block btn-hover'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F5</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
                <button type="submit" onclick="showLoader()" name="ejecutar" value="F06" class='container-block btn-hover'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F6</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>

         </div>

         <div class="row mb-4">

            <div class="col">
                <button type="submit" onclick="showLoader()" name="ejecutar" value="F07" class='container-block btn-hover'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F7</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>

            <div class="col">
                <button type="submit" onclick="showLoader()" name="ejecutar" value="F08" class='container-block btn-hover'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F8</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>

            <div class=" col">
                <button type="submit" onclick="showLoader()" name="ejecutar" value="F09" class='container-block btn-hover'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F9</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>

            <div class=" col">
                <button type="submit" onclick="showLoader()" name="ejecutar" value="F10" class='container-block btn-hover'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F10</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>

         </div>

         <div class="row">
            <div class="col">
            <button type="submit" onclick="showLoader()" name="ejecutar" value="F11" class='container-block btn-hover'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F11</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
            <button type="submit" onclick="showLoader()" name="ejecutar" value="F12" class='container-block btn-hover'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F12</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col"></div>
            <div class="col"></div>
         </div>
    </div>

    <div class="container">
        <div class="row mb-4">
            <h2>Seleccion de laboratorio 2F</h2>
            <div class="col">
                <button type="submit"  onclick="showLoader()" name="ejecutar" value="F23" class='container-block btn-hover' >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F23</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
                <button type="submit"  onclick="showLoader()" name="ejecutar" value="F24" class='container-block btn-hover' >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F24</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
                <button type="submit"  onclick="showLoader()" name="ejecutar" value="F25" class='container-block btn-hover' >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F25</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
                <button type="submit"  onclick="showLoader()" name="ejecutar" value="F26" class='container-block btn-hover' >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F26</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
        </div>

        <div class="row text-center mb-4">
            <div class="col">
                <button type="submit"  onclick="showLoader()" name="ejecutar" value="F27" class='container-block btn-hover' >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F27</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
                <button type="submit"  onclick="showLoader()" name="ejecutar" value="F28" class='container-block btn-hover' >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F28</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>

            <div class="col">
                <button type="submit"  onclick="showLoader()" name="ejecutar" value="F29" class='container-block btn-hover' >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F29</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>

            <div class="col">
                <button type="submit"  onclick="showLoader()" name="ejecutar" value="F30" class='container-block btn-hover' >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F30</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
        </div>

        <div class="row text-center">
            <div class="col">
                <button type="submit"  onclick="showLoader()" name="ejecutar" value="F31" class='container-block btn-hover' >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F31</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
                <button type="submit"  onclick="showLoader()" name="ejecutar" value="F32" class='container-block btn-hover' >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F32</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>

        <div class="container">
        <div class="row text-center">
        <h2>Seleccion de laboratorio 1G</h2>
            <div class="col">
                <button type="submit" name="ejecutar" value="G01" class='container-block btn-hover' onclick="showLoader()" >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G01</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row text-center mb-4">
        <h2>Seleccion de laboratorio 2G</h2>
            <div class="col">
                <button type="submit" name="ejecutar" value="G09" class='container-block btn-hover' onclick="showLoader()" >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G09</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
                <button type="submit" name="ejecutar" value="G10" class='container-block btn-hover' onclick="showLoader()" >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G10</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
                <button type="submit" name="ejecutar" value="G11" class='container-block btn-hover' onclick="showLoader()" >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G11</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col">
                <button type="submit" name="ejecutar" value="G12" class='container-block btn-hover' onclick="showLoader()" >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G12</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
        </div>
        
        <div class="row text-center">
            <div class="col">
                <button type="submit" name="ejecutar" value="G13" class='container-block btn-hover' onclick="showLoader()" >
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G13</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>

    </div>

</form>


  </main>
  <footer>
    <!-- place footer here -->
    <?php
  require './partials/Footer.php'
  ?>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <!----------------------------------------------------------------------------------------------------------->
  <script src="./Assets/JS/seleccion.js"></script>
</body>

</html>