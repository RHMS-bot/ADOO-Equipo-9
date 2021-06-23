<?php 
session_start();
  
$cel = $_SESSION['numero'];
if($cel != "5551142591"){
  echo 'No tienes permiso de entrar aqui!';
  die();
}
  include "navegacionadmin.php";
 
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
  <script src="./static/js/funciones.js"></script>
	<script src="./static/librerias/bootstrap/js/bootstrap.js"></script>
	<script src="./static/librerias/alertifyjs/alertify.js"></script>
  <script src="./static/librerias/select2/js/select2.js"></script>
</head>
<body>
<script src="./static/alert/package/dist/sweetalert2.all.min.js"></script>
  <br><br><br><br>
    <script src="./static/alert/package/dist/sweetalert2.all.min.js"></script>
    <diV class="container">
      <div id="buscador"></div>
		  <div id="tabla"></div>
    </diV>

  <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agrega una nueva Venta</h4>
        </div>
        <div class="modal-body">
        <form  action="agregarVenta.php"  method="post">
            <label>Producto</label>
            <select id="prod" name="prod" class="uwu sin_borde"  required >    
                <option value=""></option>
                <?php 
                    require "conexion.php";
                    $producto = mysqli_query($conexion, "SELECT codigo, nombre, tipo FROM producto ORDER BY nombre ASC"); 
                    mysqli_close($conexion);
                    while ($row = mysqli_fetch_array($producto)) {?>
                            <option value="<?php echo $row['codigo'];?>"><?php echo $row['nombre'];?></option>
                  <?php }?>
            </select>
            <label>Cantidad de Productos</label>
            <input type="number" name="cant" id="cant" class="form-control input-sm" required>
            <label>Total a Pagar</label>
            <input type="number" name="tpaga" id="tpaga" class="form-control input-sm" required>
            <label>Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control input-sm" required>
            <label>Comprador</label>
            <select id="cliente" name="cliente" class="uwu sin_borde"  required >    
                <option value=""></option>
                <?php 
                    require "conexion.php";
                    $cliente = mysqli_query($conexion, "SELECT idCliente,  nombre FROM cliente ORDER BY nombre ASC"); 
                    mysqli_close($conexion);
                    while ($row = mysqli_fetch_array($cliente)) {?>
                            <option value="<?php echo $row['idCliente' ];?>"><?php echo $row['nombre'];?></option>
                  <?php }?>
            </select>
            <label>Tipo de pago</label>
            <select id="tipa" name="tipa" class="uwu sin_borde"  required >    
                <option value=""></option>
                <option value="Contado">Contado</option>
                <option value="Parcialidades">Parcialidades</option>
            </select>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Agregar">
        </form>
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
          <h4 class="modal-title" id="myModalLabel">Editar una venta</h4>
        </div>
        <div class="modal-body">
        <form  action="modificarVenta.php"  method="post">
            <input type="text" hidden=""  id="ids" name="idverta">
            <label>Producto</label>
            <select id="prod1" name="prod1" class="uwu sin_borde"  required >    
                <option value=""></option>
                <?php 
                    require "conexion.php";
                    $producto = mysqli_query($conexion, "SELECT codigo, nombre FROM producto ORDER BY nombre ASC"); 
                    mysqli_close($conexion);
                    while ($row = mysqli_fetch_array($producto)) {?>
                            <option value="<?php echo $row['codigo'];?>"><?php echo $row['nombre'];?></option>
                  <?php }?>
            </select>
            <label>Cantidad de Productos</label>
            <input type="number" name="cant1" id="cant1" class="form-control input-sm" required>
            <label>Total a Pagar</label>
            <input type="number" name="tpaga1" id="tpaga1" class="form-control input-sm" required>
            <label>Fecha</label>
            <input type="date" name="fecha1" id="fecha1" class="form-control input-sm" required>
            <label>Comprador</label>
            <select id="client1" name="client1" class="uwu sin_borde"  required >    
                <option value=""></option>
                <?php 
                    require "conexion.php";
                    $cliente = mysqli_query($conexion, "SELECT idCliente,  nombre FROM cliente ORDER BY nombre ASC"); 
                    mysqli_close($conexion);
                    while ($row = mysqli_fetch_array($cliente)) {?>
                            <option value="<?php echo $row['idCliente' ];?>"><?php echo $row['nombre'];?></option>
                  <?php }?>
            </select>
            <label>Tipo de pago</label>
            <select id="tipa1" name="tipa1" class="uwu sin_borde"  required >    
                <option value=""></option>
                <option value="Contado">Contado</option>
                <option value="Parcialidades">Parcialidades</option>
            </select>
        
        </div>
        <div class="modal-footer">
        <input type="submit" class="btn btn-warning" value="Modificar">
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- -->
  <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Quieres eliminar esta venta?</h4>
      </div>
      <div class="modal-body">
      <form  action="eliminarVenta.php"  method="post">
          <input type="text" hidden=""  id="ids1" name="idverta1">
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-success" value="Si quiero eliminarlo">
      </form> 
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('./tablaVentas.php');
	});
</script>