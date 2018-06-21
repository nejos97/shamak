<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

define('GMailUSER', 'ladinstar@gmail.com'); // utilisateur Gmail
define('GMailPWD', 'ata831012'); // Mot de passe Gmail

function smtpMailer($to, $from, $from_name, $subject, $body) {
	$mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
	$mail->IsSMTP(); // active SMTP
	$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
	$mail->SMTPAuth = true;  // Authentification SMTP active
	$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = GMailUSER;
	$mail->Password = GMailPWD;
    $mail->SetFrom($from, $from_name);
    $mail->SetLanguage('fr');
	$mail->Subject = $subject;
	$mail->Body = $body;
    $mail->AddAddress($to);
	if(!$mail->Send()) {
		return 'Mail error: '.$mail->ErrorInfo;
	} else {
		return true;
	}
}
$result = smtpmailer('ladinstar@mail.com', 'alladintroumba@mail.com', 'Alladin Troumba', 'Votre Message', 'Le sujet de votre message');
if (true !== $result)
{
	// erreur -- traiter l'erreur
	echo $result;
}
?>