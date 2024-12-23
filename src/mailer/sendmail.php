<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';

function sendMail($mesSubject,$mesBody,$altBody,$address){
    $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'd34calvo@gmail.com';
    $mail->Password = 'jydbjbeprwgmticw';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('d34calvo@gmail.com', 'Future Guardians Initiative');
    $mail->addAddress($address);
    $mail->isHTML(true);
    $mail->Subject = $mesSubject;
    $mail->Body = $mesBody;
    $mail->AltBody = $altBody;

    $mail->send();
    echo 'Email has been sent successfully.';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
sendMail('Thank You for Joining us','<h1>Greetings!</h1><p>Thank you for registering with the Future Guardians Initiative. Stay tuned for updates!</p>
        <p style="color:rgb(0,0,100);font-weight:bold;">Your OTP is 6398</p>
        <button style="padding:10px 10px;color:rgb(255, 255, 255);font-weight:500;background:rgb(0,100,0);border:none;border-radius:20px;">Not You</button>
    <br />','Hey there and Welcome you are just a few steps from setting up your account! Enter this otp please to continue 6398','www.owinocalvince@gmail.com');
