<?php

include("./database.php");


$ID=$_GET['ID'];

$sql="DELETE FROM usuario  WHERE ID='$ID'";
$query=mysqli_query($conex,$sql);

    if($query){
        Header("Location:../ModiPer.php");
    }
?>