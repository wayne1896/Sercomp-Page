<?php 
require_once('consultas\consultalogin.php');
session_start();
    if(isset($_POST['login']))
    {   
       
        
       if(empty($_POST['usuario']) || empty($_POST['clave']))
       {
            header("location: ../index.php?Empty= Por favor no deje en blanco");
       }
       else
       {
            $query="select * from empleado where ocupacion_empleado='Oficina' and usuario='".$_POST['usuario']."' and clave_empleado='".$_POST['clave']."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['usuario'];
                $_SESSION['user_login_status'] = 1;
 
                header("location: ../menu.php");
            }
            else
            {
                 $query="select * from empleado where ocupacion_empleado='Tecnico' and usuario='".$_POST['usuario']."' and clave_empleado='".$_POST['clave']."'";
                 $result=mysqli_query($con,$query);
     
                 if(mysqli_fetch_assoc($result))
                 {
                     $_SESSION['User']=$_POST['usuario'];
                     $_SESSION['user_login_status'] = 1;
 
                     header("location: ../menutecnico.php");
                 }
                  
       else
       {
            $query="select * from cliente where correo_cliente='".$_POST['usuario']."' and clave_cliente='".$_POST['clave']."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['usuario'];
                $_SESSION['user_login_status'] = 1;
                header("location: ../menucliente.php");
            }
            else
            {
                header("location: ../index.php?Invalid= Por favor introduzca la clave o usuario correcto ");
            }
       }
               
                 
            }
       
       
       
       
        }

      
      
    
    }
    
    
        
    
    
  
    else
    {
        echo 'No funcionando';
    }

?>
