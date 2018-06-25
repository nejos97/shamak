<?php 
    date_default_timezone_set('Etc/UTC');

    require '../PHPMailerAutoload.php';
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = "mail.authsmtp.com";
    $mail->Port = 2525;
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false;
    $mail->SMTPSecure = ''; // To enable TLS/SSL encryption change to 'tls'
    $mail->AuthType = "CRAM-MD5";
    $mail->Username = "USERNAME";
    $mail->Password = "PASSWORD";
    $mail->setFrom('YOU@YOUR-DOMAIN-NAME.COM', 'YOUR NAME');
    $mail->addReplyTo('YOU@YOUR-DOMAIN-NAME.COM', 'YOUR NAME');
    $mail->addAddress('YOU@YOUR-DOMAIN-NAME.COM', 'YOUR NAME'); //(Send the test to yourself)
    $mail->Subject = 'PHPMailer SMTP test';
    $mail->isHTML(true);
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
    
?>