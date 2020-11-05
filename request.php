<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include "connection.php";
// Instantiation and passing `true` enables exceptions
if(isset($_POST['submit'])){
	$emailTo=$_POST['email'];
	$sql="select * from logintable where user='$emailTo'";
	$query=mysqli_query($conn,$sql);
	$result=mysqli_num_rows($query);
    if($result>0)
	{
	$row=mysqli_fetch_assoc($query);
	$id= $row['id'];
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'mtplcablenetwork@gmail.com';                     // SMTP username
		$mail->Password   = 'MTPL1234';                               // SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$mail->setFrom('shubhampokharkar4@gmail.com', 'MTPL services');
		$mail->addAddress($emailTo);     // Add a recipient
		$mail->addReplyTo('no-reply@gmail.com', 'No reply');

		// Content
		$url = "https://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/resetpassword.php?id=$id";
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Your password reset link';
		$mail->Body    = "<h1>You requested a password reset</h1>
							Click <a href='$url'>this link to do so";
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		echo "<script>alert('Message has been sent')</script>";
		echo "<script>window.open('login.php','_self')</script>";
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
	}
	else
	{
		echo "<script>alert('please enter a registered email')</script>";
	}
}
?>
<!doctype html>
<html>
	<head>
		<title>MTPL</title>
		<style>
		    .body{
				margin-top:15%;
				margin-left:38%;
			}
			label{
				font-size:1.5vw;
			}
			#emal, #sub{
				width: 300px;
				padding: 12px 20px;
				margin: 8px 0;
				box-sizing: border-box;
			}
			#sub{
				background-color:blue;
				color:white;
				font-weight:bold;
			}
		</style>
	</head>
	<body>
	<div class="body">
		<form name="myform" action="" method="POST" onSubmit="return ValidateForm()">
			<label for="email">Email : </label></br>
			<input id="emal" type="text" name="email" placeholder="email@gmail.com"></br>
			<input id="sub" type="submit" name="submit" value="Send a mail">
		</form>
	</div>
		<script>
			function ValidateForm(){
				var email=document.myform.email.value;
				if(email=="" || email==null)
				{
					alert("Please enter a email");
					return false;
				}
				else{
					return true;
				}
			}
		</script>
	<body>
</html>
