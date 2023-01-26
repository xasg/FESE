<?php
class notificacion{
var $subject;
var $email="adrian.sg@fese.org.mx";
var $mensaje;
//var $headers="From:";
//var $from;
var $header_="MIME-Version: 1.0\r\n Content-type: text/plain; charset=UTF-8 \r\n";

	function enviar($from, $subject,$mensaje ){
		$headers = "From:".$from."\r\n";
		$correo=mail($email, '=?UTF-8?B?'.base64_encode($subject).'?=', $mensaje, $header_ .$headers);	
		echo $correo;
	}

}

	
	// headers del email
	
	// Enviamos el mensaje
	//$email.=",registroies@fese.org.mx";
	
  	
  	
	

?>