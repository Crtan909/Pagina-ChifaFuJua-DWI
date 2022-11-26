<?php
    session_start();

    $mensaje = "";

    if(isset($_POST['btnAccion'])){

        switch($_POST['btnAccion']){
            case 'Agregar':
                //ID
                if(is_numeric(openssl_decrypt($_POST['Id'], COD, KEY))){
                    $ID = openssl_decrypt($_POST['Id'], COD, KEY);
                    $mensaje.= "Ok, ID correcto ".$ID."<br/>";
                }else{
                    $mensaje.= "Ups... ID incorrecto"; break;
                }
                //Nombre
                if(is_string(openssl_decrypt($_POST['Nombre'], COD, KEY))){
                    $Name = openssl_decrypt($_POST['Nombre'], COD, KEY);
                    $mensaje.= "Ok, nombre correcto ".$Name."<br/>";
                }else{
                    $mensaje = "Ups... algo paso con el nombre"; break;
                }
                //Precio
                if(is_numeric(openssl_decrypt($_POST['Precio'], COD, KEY))){
                    $Price = openssl_decrypt($_POST['Precio'], COD, KEY);
                    $mensaje.= "Ok, precio correcto ".$Price."<br/>";
                }else{
                    $mensaje = "Ups... algo paso con el precio"; break;
                }
                //Cantidad
                if(is_numeric(openssl_decrypt($_POST['Cantidad'], COD, KEY))){
                    $Cant = openssl_decrypt($_POST['Cantidad'], COD, KEY);
                    $mensaje.= "Ok, cantidad correcto ".$Cant."<br/>";
                }else{
                    $mensaje = "Ups... algo paso con la cantidad"; break;
                }

                if(!isset($_SESSION['Tienda'])){
                    $producto = array(
                        'ID'=>$ID,
                        'NOMBRE'=>$Name,
                        'PRECIO'=>$Price,
                        'CANTIDAD'=>$Cant
                    );
                    $_SESSION['Tienda'][0]=$producto;
                    $mensaje = "Producto agregado al carrito";
                }else{

                    $idProducto = array_column($_SESSION['Tienda'], "ID");
                    if(in_array($ID,$idProducto)){
                        echo "<script>alert('El producto ya a sido seleccionado..');</script>";
                        $mensaje = "";
                    }else{
                        
                        $NumeroProductos = count($_SESSION['Tienda']);
                        
                        $producto = array(
                            'ID'=>$ID,
                            'NOMBRE'=>$Name,
                            'PRECIO'=>$Price,
                            'CANTIDAD'=>$Cant
                        );
                        
                        $_SESSION['Tienda'][$NumeroProductos]=$producto;
                        $mensaje = "Producto agregado al carrito";
                    }
                }
                //$mensaje= print_r($_SESSION, true);
                

                break;
            case 'Eliminar':
                if(is_numeric($_POST['id'])){
                    $ID = $_POST['id'];
                    foreach($_SESSION['Tienda'] as $indice => $producto){
                        if($producto['ID']==$ID){
                            unset($_SESSION['Tienda'][$indice]);
                            echo "<br><br><br>";
                            echo "<div class=\"alert alert-success text-center\" >Se elimino satisfactoriamente.</div>";
                        }
                    }
                }else{
                    $mensaje.= "Ups... ID incorrecto"; break;
                }


        }
    }

?>