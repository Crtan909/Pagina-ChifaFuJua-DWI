<?php 
    include("conexion.php");
    $con=conectar();

$idp=$_GET['idp'];

$sql="SELECT * FROM producto WHERE codpro='$idp'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="updateadd.php" method="POST">
                    
                              
                                <input type="text" class="form-control mb-3" name="codpro" placeholder="codpro" value="<?php echo $row['codpro']  ?>">
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="precio" placeholder="precio" value="<?php echo $row['precio']  ?>">
								<input type="text" class="form-control mb-3" name="stock" placeholder="stock" value="<?php echo $row['stock']  ?>">
								<input type="text" class="form-control mb-3" name="idcat" placeholder="idcat" value="<?php echo $row['idcat']  ?>">
                                <input type="text" class="form-control mb-3" name="idprov" placeholder="idprov" value="<?php echo $row['idprov']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>