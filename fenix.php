<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM producto";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Insertar Productos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
	<body background="images.jfif">
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1><th>Ingrese datos</th></h1>
                                <form action="insertaradd.php" method="POST">

                                    
                                    <input type="text" class="form-control mb-3" name="codpro" placeholder="codpro">
                                    <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre">
                                    <input type="text" class="form-control mb-3" name="precio" placeholder="precio">
                                    <input type="text" class="form-control mb-3" name="stock" placeholder="stock">
									<input type="text" class="form-control mb-3" name="idcat" placeholder="idcat">
                                    <input type="text" class="form-control mb-3" name="idprov" placeholder="idprov">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
									    <th>idp</th>
                                        <th>codpro</th>
                                        <th>nombre</th>
                                        <th>precio</th>
                                        <th>stock</th>
										<th>idcat</th>
                                        <th>idprov</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
											    <th><?php  echo $row['idp']?></th>
                                                <th><?php  echo $row['codpro']?></th>
                                                <th><?php  echo $row['nombre']?></th>
                                                <th><?php  echo $row['precio']?></th>  
												<th><?php  echo $row['stock']?></th> 
												<th><?php  echo $row['idcat']?></th> 
                                                <th><?php  echo $row['idprov']?></th>     
                                                <th><a href="actualizaradd.php?idp=<?php echo $row['codpro'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="deleteadd.php?idp=<?php echo $row['codpro'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>