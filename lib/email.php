<?php 

require_once('./Connections/email.php');

//Comprobamos que se haya realizado el insert en la base de datos

$subject = "Contacto FESE";
// check form  
if ($_POST['email'] != "") {
	
	// email de destino
	$email = $_POST['email'];
	
	// asunto del email
	
	
	// Cuerpo del mensaje
	$mensaje = "-------------------------------------------------------------------------------------------------------------------------------------- \n";
	$mensaje.= "              CONFIRMACIÓN  ENVIO DE CONTACTO         \n";
	$mensaje.= "-------------------------------------------------------------------------------------------------------------------------------------- \n";
	// $mensaje.= "Su informacion de contacto se a enviado correctamente\n\n";
	$mensaje.= "Estimado ".$_POST['name']."  hemos recibido su informacion en breve nos pondremos en contacto  \n\n";	
	$mensaje.= "FECHA:    ".date("d/m/Y")."\n\n";
	
	$mensaje.= "Mensaje: ".$_POST['message']."  \n\n";	
	// $mensaje.= "Para registrar iniciativas ingrese a la siguiente dirección electrónica con sus datos de usuario\n\n";
	$mensaje.= "http://fese.org.mx";
	
	
	// headers del email
	$headers = "From: contacto@fese.org.mx\r\n";
	// Enviamos el mensaje
	$header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
  	$email.=",";
	
	
		if (mail($email, '=?UTF-8?B?'.base64_encode($subject).'?=', $mensaje, $header_ .$headers)) {
				$aviso.= "
			<div class=\"sukses\" style=\"float:none; margin:0 auto; position: relative;\">
				Su registro ha sido exitoso, en breve le llegará la notificación a su correo electrónico, en caso de que no le llege la notificación revise su bandeja de correo no deseado.

			</div>
					";
		} else {$aviso = "Error de envío";
		
		 $aviso="
					<div class=\"gagal\" style=\"float:none; margin:0 auto; position: relative;\">
						Su registro no se ha llevado a cabo intentelo nuevamente
					</div>
					";
		
		}
		
	
	
					
				
	
}
?>