<?php
     include "conexion.php";
     $ven = mysqli_query($conexion, 'SELECT v.idVenta as "id", v.tipopago as "tp", c.nombre as "nombre", v.cantidad as "tpago", v.total as "totalpa", v.fecha as "fecha", p.nombre as "product", p.tipo as "tipo" 
     FROM venta as v INNER JOIN cliente as c INNER JOIN producto as p ON (v.Cliente_idCliente = c.idCliente AND v.Producto_codigo = p.codigo) ORDER BY fecha DESC'); 
     mysqli_close($conexion);
?>
  
<div class="row">
            <div class="col-sm-12">
              <h2>Ventas</h2>
                <table class="table table-hover table-condensed table-bordered text-center">
                    <caption>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                            Agregar Nueva Venta
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </caption>
                    <tr class="PrincipalesT Uno">
                        <td>Fecha</td>
                        <td>Producto</td>
                        <td>Tipo de Producto</td>
                        <td>Cantidad</td>
                        <td>Total a pagar</td>
                        <td>Comprador</td>
                        <td>Tipo de Pago</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($ven)) {
                      $datas = $row['id']."||".$row['product']."||".$row['tpago']."||".$row['totalpa']."||".$row['fecha']."||".$row['nombre']."||".$row['tp'];
                      ?>

                      <tr>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['product']; ?></td>
                        <td><?php echo $row['tipo']; ?></td>
                        <td><?php echo $row['tpago']; ?></td>
                        <td>$<?php echo $row['totalpa']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['tp']; ?></td>
                        <td>
                            <button class="btn-warning btn glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datas ?>')">
                            </button>
                        </td>
                        <td>
                        <button class="btn btn-danger glyphicon glyphicon-remove" data-toggle="modal" data-target="#modalEliminar" onclick="preguntarSiNo('<?php echo $datas ?>')"> </button>
                        </td>
                    <?php }?>
                </table>
            </div>
        </div>