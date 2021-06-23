<?php 
    include "navegacion.php";
?>
<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Iniciar sesion</title>
    
</head>
<body>
    <!--JavaScripts-->
    <script src="./static/alert/package/dist/sweetalert2.all.min.js"></script>
    <br><br><br><br>
    <div class="container my-5">
        <div class="informacion">
            <div class="seccion-info-contacto d-flex my-5 align-items-center flex-column">
                
            </div>
            <div class="alto seccion-formulario bg-primary container w-50 my-5  text-formulario justify-content-center border">
                <div class="perfilTi ">
                    <img class="fotPerfili"  src="./static/img/usuario.png" alt="iniciar sesion"/>
                </div>
                <div class="datosf">
                    <form  action="validariS.php" class="m-5" method="post">
                        <label for="correo" class="inicia">N&uacute;mero de contacto</label>
                        <br/>
                        <input type="number" class="inicia" name="numero"  id="numero" maxlength="10" placeholder="Ingresa tu n&uacute;mero de contacto" required/>
                        <br/><br/>
                        <label for="pass" class="inicia">Contrase&ntilde;a</label>
                        <br/>
                        <input  type="password" class="inicia" name="pass" id="pass" placeholder="Ingresa tu contrase&ntilde;a" required/>
                        <br><br>
                        <div class="seccion-enviar1 d-flex align-items-center justify-content-center">
                            <button type="submit" class="btnenviar">Iniciar sesi&oacute;n</button>
                        </div>
                        <br><br>
                        <div class="seccion-enviar1 d-flex align-items-center justify-content-center">
                            <a class="btnenviar" href="./registrar.php">Registrar</a>
                        </div>
                    </form>
                </div>
                
             </div>   
        </div>
    </div>
    <div class="bajo bg-primary py-3 d-flex align-items-center contenedor-footer w-100">
        <span class="text-secondary w-100 text-center">Itzamara Store &copy; 2021</span>
    </div>
</body>

</html>