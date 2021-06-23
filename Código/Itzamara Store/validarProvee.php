<?php
    require_once "conexion.php";
    

    $nombre =$_REQUEST['nombre'];
    $contacto =$_REQUEST['contacto'];
    
  
    $query = mysqli_query($conexion,"INSERT INTO proveedor VALUES ('','$nombre', $contacto)");
    mysqli_close($conexion);
            if($query){
                
?>
            
            <?php
               header("location:inventario.php");
            ?>      
            
<?php
            }else{
                include("agregarProvee.php");   
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
?>
 
