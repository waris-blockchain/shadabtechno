<?php
$usnm= "";
$upass = "";
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>To</td>
      <td><label>
        <input type="text" name="to" id="to" />
      </label></td>
    </tr>
    <tr>
      <td>Subject</td>
      <td><label>
        <input type="text" name="sub" id="sub" />
      </label></td>
    </tr>
    <tr>
      <td>Body</td>
      <td><label>
        <input type="text" name="body" id="body" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <input type="submit" name="Send" id="Send" value="Submit" />
      </label></td>
    </tr>
  </table>
</form>
<?php
include("class.phpmailer.php");
define('GUSER', ''); // GMail username
define('GPWD', ''); 
if(isset($_REQUEST["Send"]))
{$to=$_REQUEST["to"];
$sub=$_REQUEST["sub"];
$body=$_REQUEST["body"];
if(smtpmailer($to,'',"RAHUL",$sub,$body))
{
echo "Send..";
}
else
{
	echo "Not Send";
}
}
function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = GUSER;  
	$mail->Password = GPWD;           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}

?>