<?php 

if(isset($_POST["sendMail"])){
	include "classes/class.phpmailer.php"; 

$currentDate = date("d-m-Y");
	$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'p3plcpnl0441.prod.phx3.secureserver.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'fakemail@monoestereo.com.mx';                 // SMTP username
$mail->Password = 'v%4TH]$3pFR0';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = $_POST['fromMail'];
$mail->FromName = $_POST['nameMail'];
$mail->addAddress("victorvazqueztres@gmail.com"); 
$mail->addAddress("lsgrrd@gmail.com"); 
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Contacto Web";
$mail->Body ='<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>entro</title>
</head>
<body style="padding:10px; color:#333; background:url(http://monoestereo.com.mx/monoEstereo/img/asteroids.jpg) ;">
	<div class="mail" style="position:relative; max-width: 350px;background: #ffcc00;padding: 20px;padding-bottom: 40px;min-height: 500px;	position: relative;	margin: 15px;">
		<h1>entro</h1>
		<div class="body">
			<div><b style="color:#333;">nombre: </b>';
			$mail->Body .= $_POST['nameMail'];
			$mail->Body .='</div>
			<div><b style="color:#333;">email: </b>';
			$mail->Body .= $_POST['fromMail'];
			$mail->Body .='</div>
			<div><b style="color:#333;">fecha: </b>';
			$mail->Body .= $currentDate;
			$mail->Body .='</div>
			<div>
				<b style="color:#333;">mensaje:</b>
				<p style="margin-top:5px;">';
				$mail->Body .=$_POST['messageMail'];
				$mail->Body .='</p>
			</div>
		</div>
		<div class="footer" style="position: absolute;	bottom:20px;"><a style="color:#333;" href="http://www.entto.co"><b>www.entto.co</b></a></div>
	</div>
</body>
</html>';

$mail->AltBody = 'Mensaje de:'.'\r\n';
$mail->AltBody .= $_POST['nameMail'];
$mail->AltBody .= 'Email:';
$mail->AltBody .= $_POST['fromMail'];
$mail->AltBody .= 'Mensaje:';
$mail->AltBody .= $_POST['messageMail'];

if(!$mail->send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	echo '<h3>Thank you!
Your message has been successfully sent. We will contact you very soon!</h3>';
}

}




//CONTRATANOS MAIL
if(isset($_POST["cotSend"])){
	include "classes/class.phpmailer.php"; 

	$mail = new PHPMailer;
$currentDate = date("d-m-Y");

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'p3plcpnl0441.prod.phx3.secureserver.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'fakemail@monoestereo.com.mx';                 // SMTP username
$mail->Password = 'v%4TH]$3pFR0';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = $_POST['cotMail'];
$mail->FromName = $_POST['cotName'];
$mail->addAddress("luisgerardo@monoestereo.com.mx"); 
$mail->addAddress("victorvazqueztres@gmail.com"); 
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Contratanos Web";
$mail->Body ='<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>monoestereo</title>
</head>
<body style="padding:10px; color:#333; background:url(http://monoestereo.com.mx/monoEstereo/img/science.png) ;">
	<div class="mail" style="max-width: 350px; background: #ffcc00; padding: 20px; padding-bottom: 40px; min-height: 500px; position: relative; margin: 15px;">
		<h1>entro</h1>
		<div class="body">
			<div><b style="color:#333;">nombre: </b>';
			$mail->Body .= $_POST['cotName'];
			$mail->Body .='</div>
			<div><b style="color:#333;">company: </b>';
			$mail->Body .= $_POST['cotComp'];
			$mail->Body .='</div>
			<div><b style="color:#333;">email: </b>';
			$mail->Body .= $_POST['cotMail'];
			$mail->Body .='</div>
			<div><b style="color:#333;">telefono: </b>';
			$mail->Body .= $_POST['cotTel'];
			$mail->Body .='</div>
			<div><b style="color:#333;">servicio: </b>';
			$mail->Body .= $_POST['cotServ'];
			$mail->Body .='</div>
			<div><b style="color:#333;">presupuesto: </b>';
			$mail->Body .= $_POST['cotPres'];
			$mail->Body .='</div>
			<div><b style="color:#333;">fecha: </b>';
			$mail->Body .= $currentDate;
			$mail->Body .='</div>
			<div>
				<b style="color:#333;">objetivos:</b>
				<p style="margin-top:5px;">';
				$mail->Body .=$_POST['cotObj'];
				$mail->Body .='</p>
			</div>
		</div>
		<div class="footer" style="position: absolute;bottom:20px;"><a style="color:#333;" href="http://www.entro.co"><b>www.entro.co</b></a></div>
	</div>
</body>
</html>';

$mail->AltBody = 'presupuesto:'.'\r\n';
$mail->AltBody .= $_POST['cotPres'];
$mail->AltBody .= 'company:';
$mail->AltBody .= $_POST['cotComp'];
$mail->AltBody .= 'servicio:';
$mail->AltBody .= $_POST['cotServ'];
$mail->AltBody .= 'objetivos:';
$mail->AltBody .= $_POST['cotObj'];

if(!$mail->send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	echo '<h3>Thank you!
Your message has been successfully sent. We will contact you very soon</h3>';
	}	
}
?>

<a class="close-reveal-modal">&#215;</a>