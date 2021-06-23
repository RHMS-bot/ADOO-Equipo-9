
<?php
    require_once "conexion.php";
//cantidad, precio, tipo, codigo, unidad, nombre, imagen
    
    //Definir Variables
    $producto  = $imagen = $codigo = $tipopro = "";
    $precio =  $unidad = $provee = NULL;
    $producto_err = $precio_err = $unidad_err = $codigo_err = $imagen_err = $tipopro_err = $provee_err ="";

    if($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "FILE"){
        //Validando nombre
        if(empty(trim($_POST["nombre"]))){
            $producto_err = "Por favor ingrese el nombre del producto";
        }else{
            $sql = "SELECT codigo FROM producto WHERE nombre = ?";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_producto);

                $param_producto = trim($_POST["nombre"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    $producto = trim($_POST["nombre"]);
                }else{
                    echo "Ups! Algo Salió mal, inténtalo más tarde";
                }
            }
        }
        //Validando proveedor
        if(empty(trim($_POST["prove"]))){
            $provee_err = "Por favor ingrese el proveedor del producto";
        }else{
            $sql = "SELECT codigo FROM producto WHERE Proveedor_idProveedor = ?";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "i", $param_provee);

                $param_provee = trim($_POST["prove"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    $provee = trim($_POST["prove"]);
                }else{
                    echo "Ups! Algo Salió mal, inténtalo más tarde";
                }
            }
        }
        //Validando Imagen
        if(empty(trim($_FILES["imagen"]['name']))){
            $imagen_err = "Por favor ingrese una imagen";
        }else{
            $sql = "SELECT codigo FROM producto WHERE imagen = ?";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_imagen);

                $param_imagen = trim($_FILES["imagen"]['name']);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    $producto = trim($_FILES["imagen"]['name']);
                    $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/Itzamara_Store/static/img/stock/';

                    move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombreImagen);
                 
                }else{
                    echo "Ups! Algo Salió mal, inténtalo más tarde";
                }
            }
        }
        //Validando Tipo
        if(empty(trim($_POST["tipo"]))){
            $tipopro_err = "Por favor ingrese el tipo de producto";
        }else{
            $sql = "SELECT codigo FROM producto WHERE tipo = ?";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_tipopro);

                $param_tipopro = trim($_POST["tipo"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    $tipopro = trim($_POST["tipo"]);
                }else{
                    echo "Ups! Algo Salió mal, inténtalo más tarde";
                }
            }
        }
        //Validando codigo
        if(empty(trim($_POST["cod"]))){
            $codigo_err = "Por favor ingrese el código del producto";
        }else{
            $sql = "SELECT codigo FROM producto WHERE cod = ?";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_codigo);

                $param_codigo = trim($_POST["cod"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt)==1){
                        $codigo_err = "Este código ya está en uso";
                    }else{
                        $codigo = trim($_POST["codigo"]);
                    }
                }else{
                    echo "Ups! Algo Salió mal, inténtalo más tarde";
                }
            }
        }
        //Validando precio
        if(empty(trim($_POST["precio"]))){
            $precio_err = "Por favor ingrese el precio del producto";
        }else{
            $sql = "SELECT codigo FROM producto WHERE precio = ?";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "d", $param_precio);

                $param_precio = trim($_POST["precio"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    $precio = trim($_POST["precio"]);
                }else{
                    echo "Ups! Algo Salió mal, inténtalo más tarde";
                }
            }
        }
        //Validando cantidad
        if(empty(trim($_POST["cantidad"]))){
            $unidad_err = "Por favor ingrese el número de unidades del producto";
        }else{
            $sql = "SELECT codigo FROM producto WHERE cantidad = ?";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "i", $param_unidad);

                $param_unidad = trim($_POST["cantidad"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    $unidad = trim($_POST["cantidad"]);
                }else{
                    echo "Ups! Algo Salió mal, inténtalo más tarde";
                }
            }
        }
        

        if(empty($producto_err) && empty($precio_err) && empty($codigo_err) && empty($unidad_err)){
            $sql = "INSERT INTO producto (codigo, nombre, precio, cantidad, tipo, imagen, Proveedor_idProveedor) VALUE (?,?,?,?,?,?,?,?)";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "isdisss", $param_codigo, $param_producto, $param_precio, $param_unidad, "hola", "hola1", "hola2");

                $param_producto = $producto;
                $param_codigo= $codigo;
                $param_precio = $precio;
                $param_unidad = $unidad;
                if(mysqli_stmt_execute($stmt)){
                    header("location:agregarPro.php");
                }else{
                    echo "ERROR";
                }
            }
        }
        mysqli_close($conexion);

    }
        
        
?>


require_once "conexion.php";
    $provee = $_POST['prove'];
    $produc = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cant = $_POST['cantidad'];
    $tipopro = $_POST['tipo'];
    $cod = $_POST['codigo'];
    $nombreImagen = $_FILES['imagen']['name'];
    $tipoImagen = $_FILES['imagen']['type'];
    $tamImagen = $_FILES['imagen']['size'];
    if($tamImagen<=1000000){
        if($tipoImagen == "image/jpeg" || $tipoImagen == "image/jpg" || $tipoImagen == "image/png" || $tipoImagen == "image/gif"){
            $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/Itzamara_Store/static/img/stock/';
            move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombreImagen);
        }else{
            echo "SOLO SE PUEDEN SUBIR IMAGENES";
            
        }
    }else{
        echo "EL TAMAÑO ES MUY GRANDE";
    }
    
    $consul = "INSERT INTO producto ( imagen) VALUES ($nombreImagen)";
    $resultados = mysqli_query($conexion, $consul);

    