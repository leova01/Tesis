<?php
$nombre = $_SESSION["nombre"] . ' ' . $_SESSION["apellido"];

if ($_SESSION["Rango"] === '2') {
  echo "<h1 class='text-start fs-5' >Preparador responsable: ${nombre}</h1>";
}
if ($_SESSION["Rango"] === '1') {
  echo "<h1 class='text-start fs-5 ms-3' >Administrativo responsable: ${nombre}</h1>";
echo"
<div class='grid'>


<div class='item border'>
<h2>Personal</h2>
<a class='bubbly-button' href='./ModiPer.php'>Entrar</a>
</div>

</div>


  ";
}
?>

