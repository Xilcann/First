 <?php
$paquetes = $_POST['paquetes'];

$res = $_POST['res'];

$neg = $_POST['neg'];

$tv = $_POST['tv'];

$notv = $_POST['notv'];

$telcontac = $_POST['telcontac'];

$pack = $_POST['pack'];

$nombre = $_POST['nombre'];

$direccion = $_POST['direccion'];

$estado = $_POST['estado'];

$email = $_POST['email'];

$tel = $_POST['tel'];

$enviar = $_POST['enviar'];

$body = "Residencial: ".$res."<br /> Negocios: ".$neg."<br /> TV extra: ".$tv. "<br />Numero Tv's: ".$notv.
	"<br />Telefono extra: ".$telcontac."<br />Nombre: ".$nombre."<br />Direccion: ".$direccion."<br />Estado: ".$estado.
	"<br />e-mail: ".$email. "<br />Telefono: ".$tel;

date_default_timezone_set('America/Mexico_City');



//function envia_convenio($mail,$4cta,$fec_exp){

require('class.phpmailer.php');

//$adjunto = "./saved/Convenio_".$4cta."_".$fec_exp.".pdf";

try {

	$mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas

	//$body = '<p>Este es un Mensaje de Prueba</p>';

	$body = preg_replace('/\\\\/','', $body); //Escapar backslashes

	$mail->IsSMTP();                           // Usamos el metodo SMTP de la clase PHPMailer

	$mail->SMTPAuth   = true;			// habilitado SMTP autentificación

	$mail->SMTPSecure = 'ssl';                  

	$mail->Port       = 465;                    // puerto del server SMTP

	$mail->Host       = 'mail.canalventastotalplay.com'; // SMTP server

	$mail->Username   = 'clientes@canalventastotalplay.com';     // SMTP server Usuario

	$mail->Password   = 'Totalplay2019#';            // SMTP server password

	$mail->From       = 'clientes@canalventastotalplay.com'; //Remitente de Correo

	$mail->FromName   = 'Ventas Total Play'; //Nombre del remitente

	$mail->AddAddress('clientes@canalventastotalplay.com', "Ventas Total Play");

	$mail->Subject  = ("CLIENTE NUEVO"); //Asunto del correo

	$mail->MsgHTML($body);

	$mail->IsHTML(true); // Enviar como HTML

	$mail->Send('msj enviado');//Enviar

} catch (phpmailerException $e) {

	echo $e->errorMessage();//Mensaje de error si se produciera.
	

}

echo ("Gracias por su preferencia. Pronto lo contactaremos");	
	
	 








?>

