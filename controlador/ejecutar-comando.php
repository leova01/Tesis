<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $ip_cliente = $_POST['ip_cliente'];
  $comando = "ipconfig";
  $resultado = exec("ssh usuario@".$ip_cliente." ".$comando);
  echo $resultado;
}
?>