<?php
include("conexion.php");
$con=conectar();

$idp=$_POST['idp'];
$codpro=$_POST['codpro'];
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$stock=$_POST['stock'];
$idcat=$_POST['idcat'];
$idprov=$_POST['idprov'];


$sql="INSERT INTO producto VALUES('$idp','$codpro','$nombre','$precio','$stock','$idcat','$idprov')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: fenix.php");
    
}else {
}
?>