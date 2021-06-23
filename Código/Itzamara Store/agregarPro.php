<?php
    session_start();
    error_reporting(0);
    $cel = $_SESSION['numero'];
    if($cel != "5551142591"){
      echo 'No tienes permiso de entrar aqui!';
      die();
    }
    require "conexion.php";
    $resultado = mysqli_query($conexion, "SELECT idProveedor, nombre FROM proveedor ORDER BY nombre ASC"); 
    mysqli_close($conexion);
    include "navegacionadmin.php";
?>
<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="./static/css/agregar.css" rel="stylesheet" type="text/css">
    <title>Inventario</title>
    
</head>
<body> 
    <script src="./static/alert/package/dist/sweetalert2.all.min.js"></script>
    <div class="container-all">
        <div class="ctn-form">
            <h1 class="title">Agregar producto</h1>
            <form  action="validarIn.php"  method="post" enctype="multipart/form-data">
                    <label class="lab" for="" >Nombre del producto</label>
                    <input  class="uwu" type="text" name="nombre" id="nombre" required >
                    <label class="lab" for="" >Precio</label>
                    <input  class="uwu" type="numer"  name="precio" id="precio" required>
                    <label class="lab" for="" >N&uacute;mero de unidades</label>
                    <input  class="uwu"  type="numer"  name="cantidad" id="cantidad"  required>
                    <label class="lab" for="" >Tipo de producto</label>
                    <input  class="uwu"  type="text"  name="tipo" id="tipo"  required>
                    <label class="lab" for="" >Seleccione el proveedor</label>
                    <select id="prove" name="prove" class="uwu sin_borde"  required >
                        <option value="0"></option>
                        <?php while ($row = mysqli_fetch_array($resultado)) {?>
                            <option value="<?php echo $row['idProveedor'];?>"><?php echo $row['nombre'];?></option>
                        <?php }?>
                    </select>
                    <label class="lab" for="" >C&oacute;digo del producto</label>
                    <input  class="uwu"  type="text"  name="cod" id="cod"  required>
                    <label class="lab" for="imagen" >Imagen del producto</label>
                    <input  class="uwu" type="file"  name="imagen" size="20"  required>
                    <input  class="envio" type="submit" value="Agregar">
            </form>
        </div>       
    </div>       
    <footer>
        <div class="bajo bg-primary py-3 d-flex align-items-center contenedor-footer w-100">
            <span class="text-secondary w-100 text-center">Itzamara Store &copy; 2021</span>
        </div>
    </footer>
</body>
</html>
