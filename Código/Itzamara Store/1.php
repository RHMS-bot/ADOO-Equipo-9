<?php 
    include "navegacion.php";
    include "conexion.php";
    $ven = mysqli_query($conexion, 'SELECT c.nombre as "nombre", v.tipopago as "tpago", v.total as "totalpa", v.fecha as "fecha", p.nombre as "product", p.tipo as "tipo" FROM venta as v INNER JOIN cliente as c INNER JOIN producto as p ON (v.Cliente_idCliente = c.idCliente AND v.Producto_codigo = p.codigo)'); 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Ventas</title>
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
  <br><br><br><br>
    <script src="./static/alert/package/dist/sweetalert2.all.min.js"></script>
    <diV class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover table-condensed table-bordered">
                    <caption>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                            Agregar Nueva Venta
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </caption>
                    <tr>
                        <td>Producto</td>
                        <td>Tipo de Producto</td>
                        <td>Cantidad de Productos</td>
                        <td>Total a pagar</td>
                        <td>Fecha</td>
                        <td>Comprador</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($ven)) {?>
                      <tr>
                        <td><?php echo $row['product']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><?php echo $row['tpago']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td>
                            <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion"> </button>
                        </td>
                        <td>
                            <button class="btn btn-danger glyphicon glyphicon-remove"> </button>
                        </td>
                <?php }?>
                </table>
            </div>
        </div>
    </diV>

  <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agrega una nueva Venta</h4>
        </div>
        <div class="modal-body">
            <label>Producto</label>
            <select id="prove" name="prove" class="uwu sin_borde"  required >
                <option value="0"></option>
            </select>
            <label>Tipo de Producto</label>
           <br><label>lo de arriba</label><br>
            <label>Cantidad de Productos</label>
            <input type="" name="" id="" class="form-control input-sm">
            <label>Total a Pagar</label>
            <input type="" name="" id="" class="form-control input-sm">
            <label>Fecha</label>
            <input type="" name="" id="" class="form-control input-sm">
            <label>Comprador</label>
            <input type="" name="" id="" class="form-control input-sm">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" id="guardarnuevo">
              Agregar
            </button>
        </div>
      </div>
    </div>
  </div>

   <!-- Modal para edicion de datos -->
  <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
            <input type="" name="" hidden="" id="" >
            <label>Producto</label>
            <select id="prove" name="prove" class="uwu sin_borde"  required >
                <option value="0"></option>
            </select>
            <label>Tipo de Producto</label>
           <br><label>lo de arriba</label><br>
            <label>Cantidad de Productos</label>
            <input type="" name="" id="" class="form-control input-sm">
            <label>Total a Pagar</label>
            <input type="" name="" id="" class="form-control input-sm">
            <label>Fecha</label>
            <input type="" name="" id="" class="form-control input-sm">
            <label>Comprador</label>
            <input type="" name="" id="" class="form-control input-sm">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Actualizar Venta</button>
        </div>
      </div>
    </div>
  </div>
  <footer>
        <div class="bajo bg-primary py-3 d-flex align-items-center contenedor-footer w-100">
            <span class="text-secondary w-100 text-center">Itzamara Store &copy; 2021</span>
        </div>
    </footer>
</body>
</html>