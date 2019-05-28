<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'example@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'password'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port =  587; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('example@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('example@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('pudropafye@etoic.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заказ звонка с PROFREMKRAN';
$mail->Body    = 'Имя: ' .$name . ' <br>Телефон: ' .$phone. '<br><br><br> Хорошего дня!';
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Что-то пошло не так';
} else {
    header('location: thank-you.html');
}
?>