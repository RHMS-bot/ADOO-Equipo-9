<?php 
	require_once "conexion.php";
	$id = $_POST['idverta1'];
    echo $id;
	$sql="DELETE from venta where idVenta=$id";
	$result=mysqli_query($conexion,$sql);
    mysqli_close($conexion);
    if($result){
        header("location:ventas.php");
    }else{
        echo "NO SE PUDO ELIMINAR LA VENTA";
    }
 ?>