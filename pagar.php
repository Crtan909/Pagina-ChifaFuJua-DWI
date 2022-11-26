<?php
    include 'Global/php/Config.php';
    include 'Global/php/Conexion.php';
    include 'btnCarrito.php';
    include 'TemplatePrueba/Cabecera.php';
?>

<?php
    if($_POST){
        $total = 0;
        $SID = session_id();
        $Correo=$_POST['email'];

        foreach($_SESSION['Tienda'] as $indice => $producto){
            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
        }

        $sentencia = $pdo->prepare("INSERT INTO `ventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `Status`) VALUES (NULL,:ClaveTransaccion, '', NOW(), :Correo, :Total, 'Pagado');"); 

        $sentencia -> bindParam(":ClaveTransaccion", $SID);
        $sentencia -> bindParam(":Total", $total);
        $sentencia -> bindParam(":Correo", $Correo);
        $sentencia -> execute();

        $idVenta = $pdo->lastInsertId();

        echo "<h3>".$total."</h3>";
    }
?>

<?php
    include 'TemplatePrueba/Pie.php';
?>