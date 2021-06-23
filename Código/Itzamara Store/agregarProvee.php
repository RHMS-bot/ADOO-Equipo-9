<?php
    session_start();
    error_reporting(0);
    $cel = $_SESSION['numero'];
    if($cel != "5551142591"){
        echo 'No tienes permiso de entrar aqui!';
        die();
    }
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
            <h1 class="title">Agregar nuevo proveedor</h1>
            <form  action="validarProvee.php"  method="post" enctype="multipart/form-data">
                    <label class="lab" for="" >Nombre del proveedor</label>
                    <input  class="uwu" type="text" name="nombre" id="nombre" required >
                    <label class="lab" for="" >N&uacute;mero de contacto</label>
                    <input  class="uwu" type="numer"  name="contacto" id="contacto" maxlength="10" required>
                    <input  class="envio" type="submit" value="Agregar">
            </form>
        </div>       
        <br>
    </div>       
    <footer>
        <div class="bajo bg-primary py-3 d-flex align-items-center contenedor-footer w-100">
            <span class="text-secondary w-100 text-center">Itzamara Store &copy; 2021</span>
        </div>
    </footer>
</body>
</html>
