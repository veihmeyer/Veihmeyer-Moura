<?php
header("Content-Type: text/html; charset=utf-8");
require("phpmailer/class.phpmailer.php");
// Envia email com nova senha
$mail = new PHPMailer();

$mail->Host = "mail.google.com";

$mail->From = htmlspecialchars($_POST['email']);
$mail->FromName = $_POST['name'];

$mail->AddAddress(htmlspecialchars('veihmeyer@hotmail.com'));

$mail->IsHTML(true);
$mail->CharSet = "utf-8";
$mail->Subject = htmlspecialchars("Envio de Mensagem");

$messageBody = '<html><body>';
$messageBody .= "O usuário ".$_POST['name']." enviou uma mensagem.<br><br>";
//escolher url
$messageBody .= "<strong>Nome:</strong> ".$_POST['name'];
$messageBody .= "<br /><strong>Email:</strong> ".$_POST['email'];
$messageBody .= "<br /><strong>CEP:</strong> ".$_POST['cep'];
$messageBody .= "<br /><strong>Rua:</strong> ".$_POST['rua'];
$messageBody .= "<br /><strong>Bairro:</strong> ".$_POST['bairro'];
$messageBody .= "<br /><strong>Cidade:</strong> ".$_POST['cidade'];
$messageBody .= "<br /><strong>Estado:</strong> ".$_POST['uf'];
$messageBody .= "<br /><strong>Mensagem:</strong> ".$_POST['message'];
$messageBody .= "</body></html>";

$mail->Body = $messageBody;

$mail->Send();

?>
<script type="text/javascript">
	alert('Mensagem enviada com sucesso!');
	window.location = "index.html";
</script>