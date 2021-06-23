<?php
    session_start();
    error_reporting(0);
    if($_SESSION['numero'] == "5551142591"){
        include "navegacionadmin.php";
    }elseif($_SESSION['numero'] != "" && $_SESSION['numero'] != "5551142591" ){
        include "navegacionclient.php";
    }else{
        include "navegacion.php";
    }
    include "conexion.php";
    $resultado = mysqli_query($conexion, "SELECT * FROM producto ORDER BY codigo ASC"); 
    mysqli_close($conexion);
?>
<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Itzamara Store</title>
    <link href="./static/css/style.css" rel="stylesheet" type="text/css">
    <link href="./static/css/agregar.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="wrap">
    <br><br><br><br><br>
        <div class="store-wrapper">
            <div class="category_list">
                <a href="#" class="category_item" category="all">Todo</a>
                <a href="#" class="category_item" category="ordenadores">Cuidado de la piel</a>
                <a href="#" class="category_item" category="laptops">Maquillaje</a>
                <a href="#" class="category_item" category="smartphones">Fragancias</a>
                <a href="#" class="category_item" category="monitores">Cuerpo y Sol</a>
            </div>
            <div class="products-list">
                <?php while ($row = mysqli_fetch_array($resultado)) {?>
                    <div class='product-item'>
                    <h4 class='text-center ' style="color: #686767; bold;"><?php echo $row['nombre']; ?></h3>
                        <img class="pro" src="<?php echo $row['imagen']; ?>">
                        <div class='item-text'>
                            <label class="proLab">C&oacute;digo: <?php echo $row['codigo']; ?></label>
                            <label class="proLab">Precio: $<?php echo $row['precio']; ?></label>
                            <label class="proLab">Disponibles: <?php echo $row['cantidad']; ?></label>
                            
                        </div>
                    </div>
                <?php }
                    
                ?>
            </div>
        </div>
    </div>
<br><br>
    <div>
        <p></p>
        
    </div>
    <footer>
        <div class="bajo bg-primary py-3 d-flex align-items-center contenedor-footer w-100">
            <span class="text-secondary w-100 text-center">Itzamara Store &copy; 2021</span>
        </div>
    </footer>
    
</body>
</html>

