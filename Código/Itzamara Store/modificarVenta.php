<?php
    require_once "conexion.php";
    $producto =$_POST['prod1'];
    $cantidad =$_POST['cant1'];
    $total =$_POST['tpaga1'];
    $fecha =$_POST['fecha1'];
    $client =$_POST['client1'];
    $tipa = $_POST['tipa1'];
    $id = $_POST['idverta'];
    $sql="UPDATE venta set tipopago='$tipa', total=$total, fecha='$fecha', cantidad=$cantidad, Producto_codigo = $producto, Cliente_idCliente = $client where idVenta=$id";
    $result=mysqli_query($conexion,$sql);
    mysqli_close($conexion);
    if($result){
        header("location:ventas.php");
    }else{
        echo "No se pudo modificar la venta!";
    }
?>


