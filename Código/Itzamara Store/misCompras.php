<?php 
    session_start();
    error_reporting(0);
    $cel = $_SESSION['numero'];
    if($cel == "5551142591" || $cel == "" || $cel == null){
        echo 'No tienes permiso de entrar aqui!';
        die();
    }
    include "navegacionclient.php";
    include "conexion.php";
    $cel = $_SESSION['numero'];
    $consulta="SELECT c.nombre as 'nombre', c.tel as 'tele' , v.cantidad as 'tpago', v.total as 'totalpa', v.fecha as 'fecha', p.nombre as 'product', p.tipo as 'tipo' 
    FROM venta as v INNER JOIN cliente as c INNER JOIN producto as p ON (v.Cliente_idCliente = c.idCliente AND v.Producto_codigo = p.codigo ) WHERE c.tel = '$cel'";
    $com = mysqli_query($conexion,$consulta ); 
    mysqli_close($conexion);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Mis Compras</title>
	<link rel="stylesheet" type="text/css" href="./static/librerias/bootstrap/css/bootstraps.css">
	<link rel="stylesheet" type="text/css" href="./static/librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="./static/librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="./static/librerias/select2/css/select2.css">
    <link href="./static/css/agregar.css" rel="stylesheet" type="text/css">

	<script src="./static/librerias/jquery-3.2.1.min.js"></script>
  <script src="js/funciones.js"></script>
	<script src="./static/librerias/bootstrap/js/bootstrap.js"></script>
	<script src="./static/librerias/alertifyjs/alertify.js"></script>
  <script src="./static/librerias/select2/js/select2.js"></script>
</head>
<body>
  <br><br><br><br><br><br><br><br>
    <script src="./static/alert/package/dist/sweetalert2.all.min.js"></script>
    <diV class="container">
        <h2 >Mis compras</h2>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover table-condensed table-bordered text-center">
                   
                    <tr class="PrincipalesT Uno">
                        <td>Producto</td>
                        <td>Tipo de Producto</td>
                        <td>Cantidad de Productos</td>
                        <td>Total a pagar</td>
                        <td>Fecha</td>
                    </tr>
                    <?php while ($raw = mysqli_fetch_array($com)) {?>
                      <tr>
                        <td><?php echo $raw['product']; ?></td>
                        <td><?php echo $raw['tipo']; ?></td>
                        <td><?php echo $raw['tpago']; ?></td>
                        <td>$<?php echo $raw['totalpa']; ?></td>
                        <td><?php echo $raw['fecha']; ?></td>
                <?php }?>
                </table>
            </div>
        </div>
    </diV>
    <br><br><br><br><br><br><br><br>
    <footer>
        <div class="bajo bg-primary py-3 d-flex align-items-center contenedor-footer w-100">
            <span class="text-secondary w-100 text-center">Itzamara Store &copy; 2021</span>
        </div>
    </footer>
</body>
</html>