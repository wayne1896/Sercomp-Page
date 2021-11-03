<?php
 require_once __DIR__.'./../vendor/autoload.php';
 			require '../vendor\phpmailer\phpmailer\src\Exception.php';
require '../vendor\phpmailer\phpmailer\src/PHPMailer.php';
require '../vendor\phpmailer\phpmailer\src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//start session
session_start();
//load and initialize user class
include 'UsuariosCliente.php';
$user = new User();
if(isset($_POST['forgotSubmit'])){
	//check whether email is empty
    if(!empty($_POST['emailcliente'])){
		//check whether user exists in the database
		$prevCon['where'] = array('correo_cliente'=>$_POST['emailcliente']);
		$prevCon['return_type'] = 'count';
		$prevUser = $user->getRows($prevCon);
		if($prevUser > 0){
			//generat unique string
			$uniqidStr = md5(uniqid(mt_rand()));;
			
			//update data with forgot pass code
			$conditions = array(
				'correo_cliente' => $_POST['emailcliente']
			);
			$data = array(
				'olvido_pass_iden' => $uniqidStr
			);
			$update = $user->update($data, $conditions);
            include("../config/conexion2.php");
            	
    $sql_user=mysqli_query($con,"select * from perfil where id_perfil=1");
    $rw_user=mysqli_fetch_array($sql_user);
    $nombre=$rw_user['nombre_empresa'];
    $correo=$rw_user['email'];
    $clave=$rw_user['password'];

    
//datos del cliente su correo y nombre 
$id_cliente= $_POST['emailcliente'];

$sql_cliente=mysqli_query($con,"select * from cliente where correo_cliente='".$id_cliente."'");
$rw_cliente=mysqli_fetch_array($sql_cliente);
$nombrecompleto=$rw_cliente['nombre_cliente']." ".$rw_cliente['apellido_cliente'];
$correocliente=$rw_cliente['correo_cliente'];

$mail = new PHPMailer(true);
			
			
				if($update){
                    $resetPassLink = 'http://localhost/tesis/recuperacion/ReiniciarPasswordCliente.php?fp_code='.$uniqidStr;
                
    try {
                      
                    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 587;  
    $mail->Username =$correo ;
    $mail->Password = $clave;         
    $mail->SMTPSecure = 'tls';                
                    //get user detail
                    
                    //send reset password email
                    $mail->setFrom($correo, $nombre);
                    $mail->addAddress($correocliente, $nombrecompleto);
                    $mail->Subject = "Solicitud de actualización de contraseña";
                    $mail->Body = 'Estimado '.$nombrecompleto.',
                     
                    <br/>Recientemente se envió una solicitud para restablecer una contraseña para su cuenta. Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada.
                    <br/>Para restablecer su contraseña, visite el siguiente enlace: <a href="'.$resetPassLink.'"></a>
                    <br/><br/>Saludos,
                    <br/>Tesis';
                    //set content-type header for sending HTML email
                    
                    $mail->send();
                    
                    $sessData['estado']['type'] = 'success';
                    $sessData['estado']['msg'] = 'Por favor revise su correo electrónico, hemos enviado un enlace de restablecimiento de contraseña a su correo electrónico registrado.';
                    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    


			}else{
				$sessData['estado']['type'] = 'error';
				$sessData['estado']['msg'] = 'Some problem occurred, please try again.';
			}
		}else{
			$sessData['estado']['type'] = 'error';
			$sessData['estado']['msg'] = 'El correo electrónico dado no está asociado con ninguna cuenta.'; 
		}
		
    }else{
        $sessData['estado']['type'] = 'error';
        $sessData['estado']['msg'] = 'Ingrese el correo electrónico para crear una nueva contraseña para su cuenta.'; 
    }
	//store reset password estado into the session
    $_SESSION['sessData'] = $sessData;
	//redirect to the forgot pasword page
    header("Location:../EnviarPasswordCliente.php");
}elseif(isset($_POST['resetSubmit'])){
	$fp_code = '';
	if(!empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['fp_code'])){
		$fp_code = $_POST['fp_code'];
		//password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['estado']['type'] = 'error';
            $sessData['estado']['msg'] = 'Confirmar que la contraseña debe coincidir con la contraseña.'; 
        }else{
			//check whether identity code exists in the database
            $prevCon['where'] = array('olvido_pass_iden' => $fp_code);
            $prevCon['return_type'] = 'single';
            $prevUser = $user->getRows($prevCon);
            if(!empty($prevUser)){
				//update data with new password
				$conditions = array(
					'olvido_pass_iden' => $fp_code
				);
				$data = array(
					'clave_cliente' => $_POST['password']
				);
				$update = $user->update($data, $conditions);
				if($update){
					$sessData['estado']['type'] = 'success';

                    $sessData['estado']['msg'] = 'La contraseña de su cuenta se ha restablecido con éxito. Por favor inicie sesión con su nueva contraseña.';

				}else{
					$sessData['estado']['type'] = 'error';
					$sessData['estado']['msg'] = 'Ha ocurrido algún problema, por favor intente de nuevo.';
				}
            }else{
                $sessData['estado']['type'] = 'error';
                $sessData['estado']['msg'] = 'No está autorizado a restablecer una nueva contraseña de esta cuenta.';
            }
        }
    }else{
        $sessData['estado']['type'] = 'error';
        $sessData['estado']['msg'] = 'Todos los campos son obligatorios, por favor complete todos los campos.'; 
    }
	//store reset password estado into the session
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['estado']['type'] == 'success')?'../index.php':'ReiniciarPassword.php?fp_code='.$fp_code;
	//redirect to the login/reset pasword page
    header("Location:".$redirectURL);
}elseif(!empty($_REQUEST['logoutSubmit'])){
	//remove session data
    unset($_SESSION['sessData']);
    session_destroy();
	//store logout estado into the ession
    $sessData['estado']['type'] = 'success';
    $sessData['estado']['msg'] = 'Has salido exitosamente de tu cuenta.';
    $_SESSION['sessData'] = $sessData;
	//redirect to the home page
    header("Location:../index.php");
}else{
	//redirect to the home page
    header("Location:../index.php");
}