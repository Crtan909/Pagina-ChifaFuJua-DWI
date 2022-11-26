<?php
    include 'Global/php/Config.php';
    include 'btnCarrito.php';
    include 'TemplatePrueba/Cabecera.php';
?>

<br>
<h3>Lista de carrito</h3>
<?php
    if(!empty($_SESSION['Tienda'])){
?>

<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%">Descripción</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>

        <?php 
        $total=0;
        foreach($_SESSION['Tienda'] as $indice => $producto){ 
        ?>

        <tr>
            <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
            <td width="15%" class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
            <td width="20%" class="text-center"><?php echo $producto['PRECIO'] ?></td>
            <td width="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'], 2); ?></td>
            <td width="5%">
                <form action="" method="POST">
    
                    <input type="hidden" name="id" id="id" value="<?php echo $producto['ID']; ?>">
                    
                    <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                    
                </form>
            </td>
        </tr>

        <?php 
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
        } 
        ?>

        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2) ?></h3></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">
                <form action="pagar.php" method="POST">
                    <div class="alert alert-success">
                        <div class="form-group">
                            <label for="my-input">Correo de contacto:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Por favor escribe tu corréo">
                        </div>
                        <small id="emailHelp" class="form-text text-muted">Los productos se enviaran al destinatario del correo</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" value="proceder" name="btnAccion">
                        Proceder a pagar >>
                    </button>
                </form>
            </td>
        </tr>

    </tbody>
</table>

<?php }else{ ?>

<div class="alert alert-success">
    No hay productos en el carrito
</div>

<?php } ?>

<?php
    include 'TemplatePrueba/Pie.php';
?>