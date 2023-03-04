<?php require './controlador/SessionOn.php'; ?> <!--Validacion de logueo-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Seleccion de Laboratorios</title>

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
   

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    

    <link rel="stylesheet" href="./Assets/CSS/Style.css" />
    <link rel="shortcut icon" href="./Assets/IMG/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./Assets/CSS/seleccion.css">


    
  </head>
  <body>
    <?php
  require './partials/header.php' //Requiriendo modulo de header
    ?>

    <main>
    <?php
                if(isset($_POST['ejecutar'])){

                    $entrada = $_POST['ejecutar'];
                    
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



                }
    ?>
    <form name="ejecutar" method="post">


<div class="container">
    <div class="row text-center">
        <h2>Simulacion de laboratorio</h2>
        <div class="menu-box">

            <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="K01" class='container-block'>
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
</div>

    <div class="container">

      <div class="row text-center">
        <h2>Seleccion de laboratorio 1F</h2>
        <div id="menu-box">

        
          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F03" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F3</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F04" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F4</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>


          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F05" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F5</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>
   
          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F06" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F6</span>
                    <p>Laboratorio de desarrollo</p>
                  </div>   
                </button>
          </div>
          
          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F07" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F7</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F08" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F8</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F09" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F9</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F10" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F10</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>
          
          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F11" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F11</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F12" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F12</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

        </div>    
      </div>
    </div>



    <div class="container">
      <div class="row text-center">
        <h2>Seleccion de laboratorio 2F</h2>
        <div id="menu-box">

          
        <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F23" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F23</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F24" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F24</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F25" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F25</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F26" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F26</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F27" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F27</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F28" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F28</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F29" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F29</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F30" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F30</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F31" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F31</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="F32" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio F32</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>
                 
          
        </div>    
      </div>
    </div>



    <div class="container">
      <div class="row text-center">
        <h2>Seleccion de laboratorio 1G</h2>
        <div id="menu-box">

        <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="G1" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G1</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

        </div>    
      </div>
    </div>


    <div class="container">
      <div class="row text-center">
        <h2>Seleccion de laboratorio 2G</h2>
        <div id="menu-box">

        <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="G9" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G9</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="G10" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G10</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>


          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="G11" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G11</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="G12" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G12</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>

          <div id="item" class="col-sm-6 col-md-3">
                <button type="submit" name="ejecutar" value="G13" class='container-block'>
                  <div class="block1">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <div class="block2">
                    <span>Laboratorio G13</span>
                    <p>Laboratorio de clases</p>
                  </div>   
                </button>
          </div>
                     
        </div>    
      </div>
    </div>

    </form>

    </main>

    <?php
  require './partials/Footer.php'
  ?>

    <!-- partial -->
<script src="./Assets/JS/seleccion.js"></script>
  </body>
</html>
