<?php
require_once("config.yml");

//設定time out
set_time_limit(120);
//echo !extension_loaded('openssl')?"Not Available":"Available";

require_once("./PHPMailer-5.2.9/PHPMailerAutoload.php"); //記得引入檔案 
$mail = new PHPMailer;

//$mail->SMTPDebug = 3; // 開啟偵錯模式

$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = $account; // SMTP username
$mail->Password
 = $password; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to

$mail->setFrom($account, $user); //寄件的Gmail
$mail->addAddress($receiver, $receiver_name); // 收件的信箱

$mail->isHTML(true); // Set email format to HTML

/*
    內文
*/

$mail->Subject = $subject;
$mail->Body = $content;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
 echo 'Message could not be sent.';
 echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
 echo 'Message has been sent';
}


?> 
