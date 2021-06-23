<?php
    require_once "conexion.php";
    
    //Definir Variables
    $username = $tel = $contra = $contra1 = "";
    $username_error = $tel_error = $contra_error = $contra1_error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Validando nombre
        if(empty(trim($_POST["nombre"]))){
            $username_error = "Por favor ingrese su nombre";
        }else{
            $sql = "SELECT idCliente FROM cliente WHERE nombre = ?";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                $param_username = trim($_POST["nombre"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    $username = trim($_POST["nombre"]);
                }else{
                    echo "Ups! Algo Salió mal, inténtalo más tarde";
                }
            }
        }
        //Validando telefono
        if(empty(trim($_POST["numero"]))){
            $tel_error = "Por favor ingrese su número telefónico";
        }else{
            $sql = "SELECT idCliente FROM cliente WHERE tel = ?";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_tel);

                $param_tel = trim($_POST["numero"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt)==1){
                        $tel_error = "Este número telefónico ya está en uso";
                    }else{
                        $tel = trim($_POST["numero"]);
                    }
                }else{
                    echo "Ups! Algo Salió mal, inténtalo más tarde";
                }
            }
        }
        //Validando Contraseña
        if(empty(trim($_POST["pass"]))){
            $contra_error = "Por favor, ingrese una contraseña";
        }elseif(strlen(trim($_POST["pass"])) < 5){
            $contra_error = "La contraseña debe de tener al menos 5 caracteres";
        }else{
            $contra = trim($_POST["pass"]); 
        }
        //Validando Contraseña1
        if(empty(trim($_POST["pass1"]))){
            $contra1_error = "Por favor, ingrese una contraseña";
        }elseif(strlen(trim($_POST["pass1"])) < 5){
            $contra1_error = "La contraseña debe de tener al menos 5 caracteres";
        }else{
            $contra1 = trim($_POST["pass1"]); 
        }
        //Comprobando contraseñas
        if($contra == $contra1){

        }else{
            $contra_error =   "Las contraseñas no coinciden";
        }
        
        if(empty($username_error) && empty($tel_error) && empty($contra_error) && empty($contra1_error)){
            $sql = "INSERT INTO cliente (nombre, contrasenia, tel) VALUE (?,?,?)";

            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_contra, $param_tel);

                $param_username = $username;
                $param_contra = $contra;
                $param_tel = $tel;
                if(mysqli_stmt_execute($stmt)){
                    header("location:index.php");
                }else{
                    echo "ERROR";
                }
            }
        }
        mysqli_close($conexion);

    }
?>