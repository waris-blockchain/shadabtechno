<?php
include_once("class.phpmailer.php");

//get data from post
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = 'Mail-from'.$name.':'.$_POST['message'];

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtpout.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "shadaabpowerpress@gmail.com";
$mail->Password = "shadaabpowerpress123";
$mail->SetFrom("shadaabpowerpress@gmail.com");
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AddAddress($email);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
 	header('Location:/shadabtechno/index.php?status=1');
    echo "Message has been sent";
 }