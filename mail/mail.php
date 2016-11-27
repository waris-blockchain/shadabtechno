<?php
include_once("class.phpmailer.php");
$mail=new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP

$mail->Host= "smtp.gmail.com"; // SMTP server

$mail->SMTPDebug= 1; // enables SMTP debug information (for testing)

// 1 = errors and messages

// 2 = messages only

$mail->SMTPAuth = true; // enable SMTP authentication

$mail->SMTPSecure = "ssl"; // sets the prefix to the servier

$mail->Host= "smtp.gmail.com";// sets GMAIL as the SMTP server

$mail->Port  = 465; // set the SMTP port for the GMAIL server

$mail->Username = "khan312waris@gmail.com";//"shrma.aashish@gmail.com"; // GMAIL username

$mail->Password= "786**wak";//"aashurup";// GMAIL password

$mail->SetFrom('khan312waris@gmail.com', 'aashu');

$mail->AddReplyTo("khan312waris@gmail.com.com","Kumar");

$mail->Subject= "Hey, check out http://www.vishalkumar.in";

$mail->AltBody = "Hey, check out this new post on www.vishalkumar.in"; // optional, comment out and test
$body="fgfgf";
$mail->MsgHTML($body);

$address = "waris_khan@mailinator.com";

$mail->AddAddress($address, "Kumar");
echo "sent@";
?>