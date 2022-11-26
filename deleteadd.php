<?php

include("conexion.php");
$con=conectar();

$codpro=$_GET['idp'];

$sql="DELETE FROM producto  WHERE codpro='$codpro'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: fenix.php");
    }
?>
