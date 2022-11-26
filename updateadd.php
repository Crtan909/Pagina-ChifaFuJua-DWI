<?php

include("conexion.php");
$con=conectar();

$codpro=$_POST['codpro'];
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$stock=$_POST['stock'];
$idcat=$_POST['idcat'];
$idprov=$_POST['idprov'];

$sql="UPDATE producto SET nombre='$nombre',precio='$precio',stock='$stock',idcat='$idcat',idprov='$idprov' where codpro='$codpro' ";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: fenix.php");
    }
?>