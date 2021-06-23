<?php
    session_start();
    error_reporting(0);
    $cel = $_SESSION['numero'];
    if($cel != "5551142591"){
      echo 'No tienes permiso de entrar aqui!';
      die();
    }
    include "navegacionadmin.php";
    include "conexion.php";
    $resultado = mysqli_query($conexion, "SELECT * FROM producto ORDER BY codigo ASC"); 
    mysqli_close($conexion);
?>
<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Inventario</title>
    <link href="./static/css/style.css" rel="stylesheet" type="text/css">
    <link href="./static/css/agregar.css" rel="stylesheet" type="text/css">
</head>
<body>
    <script src="./static/alert/package/dist/sweetalert2.all.min.js"></script>
    <div class="wrap">
        <h1>Catálogo</h1>
        <div class="store-wrapper">
            <div class="category_list">
                <a href="agregarPro.php" class="category_item" category="all">Agregar Nuevo Producto</a>
                <a href="agregarProvee.php" class="category_item" category="all">Agregar Nuevo Proveedor</a>
               
            </div>
            <div class="products-list">
                <?php while ($row = mysqli_fetch_array($resultado)) {?>
                    <div class='product-item'>
                    <h3 class='text-center ' style="color: #686767; bold;"><?php echo $row['nombre']; ?></h3>
                        <img class="pro" src="<?php echo $row['imagen']; ?>">
                        <div class='item-text'>
                            <label class="proLab">C&oacute;digo: <?php echo $row['codigo']; ?></label>
                            <label class="proLab">Precio: $<?php echo $row['precio']; ?></label>
                            <label class="proLab">Disponibles: <?php echo $row['cantidad']; ?></label>                            
                        </div>
                    </div>
                <?php }?>
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

