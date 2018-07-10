<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

define('GMAILUSER', 'ladinstar@gmail.com'); // utilisateur Gmail
define('GMAILPWD', 'ata831012'); // Mot de passe Gmail

/**
 * Help to send a message
 *
 * @param string $to To
 * @param string $from From
 * @param string $from_name From Name 
 * @param string $subject Subject
 * @param string $body Bdiy
 * @return boolean
 */
function smtpMailer($to, $from, $from_name, $subject, $body) {
	$mail = new PHPMailer();  // Cree un nouvel objet PHPMailer
	$mail->IsSMTP(); // active SMTP
	$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
	$mail->SMTPAuth = true;  // Authentification SMTP active
	$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = GMAILUSER;
	$mail->Password = GMAILPWD;
    $mail->SetFrom($from, $from_name);
    $mail->SetLanguage('fr');
	$mail->Subject = $subject;
	$mail->isHTML(true);
	$mail->Body = $body;
    $mail->AddAddress($to);
	if(!$mail->Send()) {
		return 'Mail error: '.$mail->ErrorInfo;
	} else {
		return true;
	}
}
// $messsage = '
// 	<div style="background-color: #f4f4f4;font-family: Arial,Helvetica,sans-serif;max-width: 500px;color:black" align="center">
// 		<center>
// 			<div align="center" style="padding:20px 5px">
// 				<a href="http://www.allharamadji.com" style="text-decoration: underline;"><img src="http://via.placeholder.com/1920x1080" width="200" alt=""></a>
// 				<h2>Thank you for signing up to our Newsletter</h2>
// 				<div>
// 					<p>As a subscriber, you will be among the first to know our latest music, movies and adversitings.</p>
// 					<p>We are looking forward to seeing you again in our site</p>
// 				</div>
// 			</div>
// 			<footer style="padding:40px 0px;text-align: center;background-image: linear-gradient(to left,rgb(19, 17, 17), rgb(90, 84, 84))">
// 				<a style="text-decoration: underline;color:rgb(241, 241, 241);padding: 0px 5px;" href="http://www.google.com">Vidéos </a>
// 				<a style="text-decoration: underline;color:rgb(241, 241, 241);padding: 0px 5px;" href="http://www.google.com">Films </a>
// 				<a style="text-decoration: underline;color:rgb(241, 241, 241);padding: 0px 5px;" href="http://www.google.com">Adversiting </a>
// 				</ul>
// 			</footer>
// 			<p style="font-size: 12px;text-align: center;">
// 				If you would like to receive fewer emails from shamak allharamadji, you can <a href="http://www.google.com" style="color:black;text-decoration: underline;">unsubscribe</a> to stop receiving special offers. 
// 			</p>
// 		</center>
// 	</div>';
// $result = smtpmailer( 'alladintroumba@gmail.com','ladinstar@gmail.com', 'Alladin Troumba', 'Votre Message', $messsage);
// if (!$result)
// {
// 	// erreur -- traiter l'erreur
// 	echo $result;
// }
// else{
// 	echo "OK Mon bon petit";
// }
?>