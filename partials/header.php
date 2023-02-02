<header>
        <nav class="navbar navbar-expand-lg shadow">
            <div class="container-fluid">
                <a class="navbar-brand px-5" href="Home.php">
                    <img src="./Assets/IMG/logo-urbe-sinfondo.gif" alt="" class="img-fluid m-1 " width="190">
                    <?php
                        if(isset($_SESSION["id"])){
                            echo '<a class="bubbly-button enviar" href="./controlador/CerrarSesion.php">Cerrar sesion</a>';
                        }
                        
                    ?>
                </a>
            </div>
        </nav>
    </header>