<style type="text/css">
body {
	background-color: #999;
}
</style>

<?php 
// linea con redireccion luego de ejecutar la consulta

$url = $_SERVER['HTTP_REFERER'];

 header ("Location: $url");

//recibimos las variables enviadas por el formulario 

$destinatario = $_POST['destinatario'];
$mensaje = $_POST['mensaje'];
$emisor = $_POST['emisor'];
$asunto = $_POST['asunto'];
$todos = $_POST['todos'];
$estatus = "NO LEIDO";
/*//conectamos a la base
$host = "localhost";
$usuario = "root";
$clave = "sysadmin";
$bd = "TEMOOGLE";
$connect=mysql_connect ($host, $usuario, $clave); 
// seleccionamos la base 
mysql_select_db ( $bd, $connect ); 

// definimos la consulta
$query = 	'INSERT INTO buzon (asunto,fecha,hora,destinatario,emisor,url,mensaje,estatus)
			VALUES (\''.$asunto.'\',\''.date("Y-m-d").'\',\''.date("H:i:s").'\',\''.$destinatario.'\',\''.$emisor.'\',\''.$url.'\',\''.$mensaje.'\',\''.$estatus.'\')';
// hacemos la consulta
mysql_query ($query, $connect) or die (mysql_error());
*/


?>
<?php
require "class.phpmailer.php";
try {
	$mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas
	$body             = '<p>Este es un Mensaje de Prueba</p>';
	$body             = preg_replace('/\\\\/','', $body); //Escapar backslashes
	$mail->IsSMTP();                           // Usamos el metodo SMTP de la clase PHPMailer
	$mail->SMTPAuth   = true;                  // habilitado SMTP autentificación
	$mail->Port       = 587;                    // puerto del server SMTP
	$mail->Host       = "smtp.prodigy.net.mx"; // SMTP server
	$mail->Username   = "jtemores@prodigy.net.mx";     // SMTP server Usuario
	$mail->Password   = "aboga129";            // SMTP server password
	$mail->From       = "jtemores@prodigy.net.mx"; //Remitente de Correo
	$mail->FromName   = "$emisor"; //Nombre del remitente
	$to = "raul@temores.com.mx"; //Para quien se le va enviar
	$mail->AddAddress($to);
	$mail->Subject  = "TEMOOGLE  $asunto  "; //Asunto del correo
	$mail->MsgHTML("$mensaje<br><br><hr> ESTE MENSAJE FUE ENVIADO POR <strong>     [ $emisor ]</strong>");
	$mail->IsHTML(true); // Enviar como HTML
	$mail->Send();//Enviar
	echo 'El Mensaje a sido enviado.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();//Mensaje de error si se produciera.
}
?>
