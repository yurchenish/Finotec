
<?php 
$eman = $_POST['eman'];
$email = $_POST['email'];
$text = $_POST['text'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'yurchenish@inbox.ru';                 // Наш логин
$mail->Password = '6w8ck4rvxzS';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('yurchenish@inbox.ru');   // От кого письмо 
$mail->addAddress('yurchenish@yandex.ru');     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новая заявка с сайта';
$mail->Body    = '
	<h2>Новое письмо</h2>
	<b>Имя:</b> ' . $eman .'<br>
	<b>Почта:</b> ' . $email . '<br>
	<b>Сообщение:</b> ' . $text . '';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    echo "Error";
} else {
    header('location: ../index.html');
}
?>
