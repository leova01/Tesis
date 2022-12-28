<?php
$nombre = $_SESSION["nombre"] . ' ' . $_SESSION["apellido"];

if ($_SESSION["Rango"] === '2') {
  echo "<h1>Preparador responsable: ${nombre}</h1>";
}
if ($_SESSION["Rango"] === '1') {
  echo "<h1>Administrativo responsable: ${nombre}</h1>";
echo"
<div class='grid'>


<div class='item border'>
<h2>Registrar nuevo personal</h2>
<a class='bubbly-button' href='./regisForm.php'>Registrar</a>
</div>

<div class='item border'>
<h2>Editar informacion del personal</h2>
<a class='bubbly-button enviar'>Modificar</a>
</div>

</div>


  ";
}
?>

