<?php
    require_once "conexion.php";
    $producto =$_POST['prod'];
    $cantidad =$_POST['cant'];
    $total =$_POST['tpaga'];
    $fecha =$_POST['fecha'];
    $client =$_POST['cliente'];
    $tipa = $_POST['tipa'];
    

   $producto = $cantidad = $total = $fecha =  $client = $tipa = null;
   $producto_error = $cantidad_error = $total_error = $fecha_error =  $client_error = $tipa_error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Validando producto
        if(empty(trim($_POST["prod"]))){
           $producto_error = "Por favor ingrese el producto";
        }else{
            $sql = "SELECT idVenta FROM venta WHERE Producto_codigo = ?";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "i", $param_producto);

                $param_producto = trim($_POST["prod"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                   $producto = trim($_POST["prod"]);
                }else{
                    echo "Ups! Algo Salió mal, inténtalo más tarde";
                }
            }
        }
        //Validando tipo de pago
        if(empty(trim($_POST["tipa"]))){
            $tipa_error = "Por favor ingrese el tipo de pago";
         }else{
             $sql = "SELECT idVenta FROM venta WHERE tipopago = ?";
 
             if($stmt = mysqli_prepare($conexion, $sql)){
                 mysqli_stmt_bind_param($stmt, "s", $param_tipa);
 
                 $param_tipa = trim($_POST["tipa"]);
 
                 if(mysqli_stmt_execute($stmt)){
                     mysqli_stmt_store_result($stmt);
                    $tipa = trim($_POST["tipa"]);
                 }else{
                     echo "Ups! Algo Salió mal, inténtalo más tarde";
                 }
             }
         }
        //Validando cliente
        if(empty(trim($_POST["cliente"]))){
            $client_error = "Por favor ingrese el cliente";
         }else{
             $sql = "SELECT idVenta FROM venta WHERE Cliente_idCliente = ?";
 
             if($stmt = mysqli_prepare($conexion, $sql)){
                 mysqli_stmt_bind_param($stmt, "i", $param_client);
 
                 $param_client = trim($_POST["cliente"]);
 
                 if(mysqli_stmt_execute($stmt)){
                     mysqli_stmt_store_result($stmt);
                    $client = trim($_POST["cliente"]);
                 }else{
                     echo "Ups! Algo Salió mal, inténtalo más tarde";
                 }
             }
         }
        //Validando fecha
        if(empty(trim($_POST["fecha"]))){
            $fecha_error = "Por favor ingrese la fecha";
         }else{
             $sql = "SELECT idVenta FROM venta WHERE fecha = ?";
 
             if($stmt = mysqli_prepare($conexion, $sql)){
                 mysqli_stmt_bind_param($stmt, "s", $param_fecha);
 
                 $param_fecha = trim($_POST["fecha"]);
 
                 if(mysqli_stmt_execute($stmt)){
                     mysqli_stmt_store_result($stmt);
                    $fecha = trim($_POST["fecha"]);
                 }else{
                     echo "Ups! Algo Salió mal, inténtalo más tarde";
                 }
             }
         }
         //Validando total a pagar
         if(empty(trim($_POST["tpaga"]))){
            $total_error = "Por favor ingrese el precio";
         }else{
             $sql = "SELECT idVenta FROM venta WHERE total = ?";
 
             if($stmt = mysqli_prepare($conexion, $sql)){
                 mysqli_stmt_bind_param($stmt, "i", $param_total);
 
                 $param_total = trim($_POST["tpaga"]);
 
                 if(mysqli_stmt_execute($stmt)){
                     mysqli_stmt_store_result($stmt);
                    $total = trim($_POST["tpaga"]);
                 }else{
                     echo "Ups! Algo Salió mal, inténtalo más tarde";
                 }
             }
         }
        //Validando cantidad
        if(empty(trim($_POST["cant"]))){
            $cantidad_error = "Por favor ingrese una cantidad";
         }else{
             $sql = "SELECT idVenta FROM venta WHERE cantidad = ?";
 
             if($stmt = mysqli_prepare($conexion, $sql)){
                 mysqli_stmt_bind_param($stmt, "i", $param_cantidad);
 
                 $param_cantidad = trim($_POST["cant"]);
 
                 if(mysqli_stmt_execute($stmt)){
                     mysqli_stmt_store_result($stmt);
                    $cantidad = trim($_POST["cant"]);
                 }else{
                     echo "Ups! Algo Salió mal, inténtalo más tarde";
                 }
             }
         }
      
               
        if(empty($$producto_error) && empty($cantidad_error) && empty($client_error) && empty($tipa_error) && empty($fecha_error) && empty($total_error)){
            $sql = "INSERT INTO venta (tipopago, total, fecha, cantidad, Producto_codigo, Cliente_idCliente) VALUE (?,?,?,?,?,?)";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "sisiii", $param_tipa, $param_total, $param_fecha, $param_cantidad, $param_producto, $param_client);
                $param_tipa = $tipa;
                $param_total = $total;
                $param_fecha = $fecha;
                $param_cantidad = $cantidad;
                $param_producto = $producto;
                $param_client =  $client;
                if(mysqli_stmt_execute($stmt)){
                    header("location:ventas.php");
                }else{
                    echo "ERROR";
                }
            }
        }
        mysqli_close($conexion);

    }
?>