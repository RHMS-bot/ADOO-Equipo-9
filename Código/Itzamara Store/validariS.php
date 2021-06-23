<?php
$usuario=$_POST['numero'];
$contraseña=$_POST['pass'];
$conexion = mysqli_connect("localhost", "turing","Turing123456$","itzamara");
session_start();
$_SESSION['numero']=$usuario;
$consulta="SELECT*FROM cliente where tel = '$usuario' and contrasenia = '$contraseña' ";
$resultado=mysqli_query($conexion, $consulta);
$filas=mysqli_num_rows($resultado);
$consultadmin = $consulta="SELECT*FROM cuquita where tel = '$usuario' and contrasenia = '$contraseña' ";
$resultadoadm=mysqli_query($conexion, $consultadmin);
$filasadm = mysqli_num_rows($resultadoadm);
if($filas){
        header("location:inicio.php");    
}elseif($filasadm){
        header("location:inicio.php");    
}else{
    ?>
    <?php
    include("index.php");   
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Credenciales incorrectas!',
        }
)
    </script>
    <?php
      session_destroy();
}
mysqli_free_result($resultado);
mysqli_free_result($resultadoadm);
mysqli_close($conexion);
?>