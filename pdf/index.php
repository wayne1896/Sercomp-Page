<?php


include("../config/conexion2.php");
    //Incluimos la librería
    require_once __DIR__.'/../vendor/autoload.php';
    
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    ob_start();
    include './documentos/factura.php'; 
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->render();
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=documento.pdf");
    echo $dompdf->output();
    $file_name = md5(rand()) . '.pdf';
    $file=$dompdf->output();
    echo $file;
    file_put_contents($file_name, $file);

	
    $sql_user=mysqli_query($con,"select * from perfil where id_perfil=1");
    $rw_user=mysqli_fetch_array($sql_user);
    $nombre=$rw_user['nombre_empresa'];
    $correo=$rw_user['email'];
    $clave=$rw_user['password'];

    
//datos del cliente su correo y nombre 
$id_cliente= intval($_GET['id_cliente']);

$sql_cliente=mysqli_query($con,"select * from cliente where id_cliente='".$id_cliente."'");
$rw_cliente=mysqli_fetch_array($sql_cliente);
$nombrecompleto=$rw_cliente['nombre_cliente']." ".$rw_cliente['apellido_cliente'];
$correocliente=$rw_cliente['correo_cliente'];

//Create an instance; passing `true` enables exceptions
require '../vendor\phpmailer\phpmailer\src\Exception.php';
require '../vendor\phpmailer\phpmailer\src/PHPMailer.php';
require '../vendor\phpmailer\phpmailer\src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);

try {
//Server settings
$mail->SMTPDebug = 2;                      //Enable verbose debug output
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Port = 587;  
$mail->Username = $correo;
$mail->Password = $clave;         
$mail->SMTPSecure = 'tls';                           //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom($correo, $nombre);
$mail->addAddress($correocliente, $nombrecompleto);     //Add a recipient




//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->AddAttachment($file_name);         //Adds an attachment from a path on the filesystem
$mail->Subject = 'Factura Nueva';   //Sets the Subject of the message
$mail->Body = 'Please Find Customer details in attach PDF File.';
$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
