<?php
    session_start();
    error_reporting(0);
    if($_SESSION['numero'] == "5551142591"){
        include "navegacionadmin.php";
    }elseif($_SESSION['numero'] != "" && $_SESSION['numero'] != "5551142591" ){
        include "navegacionclient.php";
    }else{
        echo "NECESITAS INICIAR SESION";
        die();
    }
    include "conexion.php";
?> 
<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Contacto</title>
    <link rel="shortcut icon" type="image/ico" href="./static/img/icono.ico">
    <link href="./static/css/navegacion.css" rel="stylesheet" type="text/css">
    <link href="./static/css/perfil.css" rel="stylesheet" type="text/css">
    <link href="./static/css/index.css" rel="stylesheet" type="text/css">
    <link href="./static/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="./static/css/generales.css" rel="stylesheet" type="text/css">
    <link href="./static/css/cursos.css" rel="stylesheet" type="text/css">
    <link href="./static/css/iniciarSesion.css" rel="stylesheet" type="text/css">
    <link href="./static/css/contacto.css" rel="stylesheet" type="text/css">
</head>

<body>
    <br><br><br><br>
    <div class="container my-5">
        <div class="informacion">
            <div class="seccion-info-contacto d-flex align-items-center flex-column">
                <span class="title-1 font-weight-bold">Contacto</span>
                <!--<img class="w-50 my-5 rounded" src="./static/img/contacto.jpg" alt="contacto">-->
                <p class="text-justify title-3">
                    Env&iacute;anos cualquier mensaje, duda, queja o sugerencia que desees.<br/>
                    Nosotros nos pondremos en contacto contigo.
                </p>
            </div>
            <div class="seccion-formulario1 container w-75 d-flex justify-content-center border">
                <form  action="" class="w-100" method="get">
                    <h2>Todos los campos son obligatorios</h2>
                    <label for="nombre" class="d-block font-weight-bold my-1">Nombre</label>
                    <input type="text" class="w-100" name="nombre" id="nombre" placeholder="Ingresa tu nombre" required/>
                    <label for="correo" class="d-block font-weight-bold my-1">Correo electr&oacute;nico</label>
                    <input type="email" class="w-100" name="correo" id="correo" placeholder="Ingresa tu correo electrónico" required/>
                    <label for="mensaje" class="d-block font-weight-bold my-1">Mensaje</label>
                    <textarea name="mensaje" class="w-100" rows="15" cols="200" id="mensaje" placeholder="Ingresa tu mensaje, duda, queja o sugerencia"></textarea>
                    <div class="seccion-enviar d-flex align-items-center justify-content-center">
                        <button class="btn my-2 text-decoration-none">Enviar mensaje</button>
                    </div>
                </form>
             </div>   
        </div>
    </div>
    <div class="bajo bg-primary py-3 d-flex align-items-center contenedor-footer w-100">
        <span class="text-secondary w-100 text-center">Itzamara Store &copy; 2021</span>
    </div>
</body>

</html>