<?php 
require_once('consultas\consultalogin.php');
session_start();
    if(isset($_POST['login']))
    {   $roles=$_POST['rol'];
       
        if (empty($roles))
        {
            header("location: ../index.php?Invalid= Seleccione un rol ");
        }
        else
        {
        if($roles =='admin')
        {
       if(empty($_POST['usuario']) || empty($_POST['clave']))
       {
            header("location: ../index.php?Empty= Por favor no deje en blanco");
       }
       else
       {
            $query="select * from empleado where ocupacion_empleado='Oficina' and correo_empleado='".$_POST['usuario']."' and clave_empleado='".$_POST['clave']."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['usuario'];
                header("location: ../menu.php");
            }
            else
            {
                 $query="select * from empleado where ocupacion_empleado='Tecnico' and correo_empleado='".$_POST['usuario']."' and clave_empleado='".$_POST['clave']."'";
                 $result=mysqli_query($con,$query);
     
                 if(mysqli_fetch_assoc($result))
                 {
                     $_SESSION['User']=$_POST['usuario'];
                     header("location: ../menutecnico.php");
                 }
                 else
                 {
                     header("location: ../index.php?Invalid= Por favor introduzca la clave o usuario correcto ");
                 }
            }
            
       }
       
       
    }
    
    else
    {
        if($roles =='cliente')
        {
       if(empty($_POST['usuario']) || empty($_POST['clave']))
       {
            header("location: ../index.php?Empty= Por favor no deje en blanco");
       }
       else
       {
            $query="select * from cliente where correo_cliente='".$_POST['usuario']."' and clave_cliente='".$_POST['clave']."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['usuario'];
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
   
}
    else
    {
        echo 'No funcionando';
    }

?>