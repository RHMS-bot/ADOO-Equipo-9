<?php 
    $conexion = mysqli_connect("localhost", "turing","Turing123456$","itzamara");
    if($conexion === false){
        die("ERROR EN LA CONEXION" . mysqli_connect_error());
    }
?>