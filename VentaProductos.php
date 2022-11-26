<?php
    include 'Global/php/Config.php';
    include 'Global/php/Conexion.php';
    include 'btnCarrito.php';
    include 'TemplatePrueba/Cabecera.php';
?>
<?php if($mensaje!=""){ ?>
<div class="alert alert-success">
    <?php echo $mensaje; ?>
    <a href="MostrarCarrito.php" class="badge badge-success">Ver carrito</a>
</div>
<?php } ?>
<div class="row">
    <?php
        $sentencia=$pdo->prepare("SELECT * FROM `producto`");
        $sentencia->execute();
        $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php foreach($listaProductos as $producto){  ?>
                
        <div class="col-3">
            <div class="card">
                <img title="<?php echo $producto['nombre']; ?>"
                    alt="<?php echo $producto['nombre']; ?>"
                    class="card-img-top"
                    src="<?php echo $producto['img']; ?>"
                    data-toggle="popover"
                    data-trigger="hover"
                    height="317px"
                    >
                <div class="card-body">
                    <span><?php echo $producto['nombre']; ?></span>
                    <h5 class="card-tittle">S/<?php echo $producto['precio']; ?></h5>

                    <form action="" method="post">
                        
                        <input type="hidden" name="Id" id="Id" value="<?php echo openssl_encrypt($producto['idp'], COD, KEY); ?>">
                        <input type="hidden" name="Nombre" id="Nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY); ?>">
                        <input type="hidden" name="Precio" id="Precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
                        <input type="hidden" name="Cantidad" id="Cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                                
                        <button type="submit"
                        class="btn btn-primary"
                        name="btnAccion"
                        value="Agregar"
                        type="submit">Agregar al carrito</button>

                    </form>
                </div>
            </div>
        </div>

    <?php } ?>

    </div>

</div>

<script>

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

</script>

<?php
    include 'TemplatePrueba/Pie.php';
?>

