<?php
    require_once "conexion.php";
    

    $producto =$_REQUEST['nombre'];
    $precio =$_REQUEST['precio'];
    $cantidad =$_REQUEST['cantidad'];
    $tipo =$_REQUEST['tipo'];
    $prove =$_REQUEST['prove'];
    
    $nombreimagen = $_FILES['imagen']['name'];
    $archivo = $_FILES['imagen']['tmp_name'];
    $tipoImagen = $_FILES['imagen']['type'];
    $tamImagen= $_FILES['imagen']['size'];
    $ruta = "./static/img/stock";
    
    $ruta = $ruta."/".$nombreimagen;
    if($tamImagen<=1000000){
        if($tipoImagen == "image/jpeg" || $tipoImagen == "image/jpg" || $tipoImagen == "image/png" || $tipoImagen == "image/gif"){
            move_uploaded_file($archivo, $ruta);

            $query = mysqli_query($conexion,"INSERT INTO producto VALUES ('','$producto', $precio, $cantidad, '$tipo', '$ruta', $prove)");
            mysqli_close($conexion);
            if($query){
                
?>
            
            <?php
               header("location:inventario.php");
            ?>      
            
<?php
            }else{
                include("index.php");   
?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrio un erro intenta más tarde!'
                    })
                </script>
<?php 
            }       
        }else{
            include("agregarPro.php");   
?>
            <script>
                Swal.fire(
                    'EL ARCHIVO NO ES UNA IMAGEN!',
                    '',
                    'error'
                )
            </script>
                
<?php       
        }
    }else{
        include("agregarPro.php");   
        
        ?>
            <script>
                Swal.fire(
                    'EL ARCHIVO ES MUY GRANDE!',
                    '',
                    'error'
                )
            </script>
<?php       
        
    }  
?>