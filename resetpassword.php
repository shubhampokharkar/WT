<?php
include "connection.php";

if(!isset($_GET['id'])){
	exit("can't find page");
}

$id=$_GET['id'];

$sql = "select user from logintable where id='$id'";
$getEmailQuery = mysqli_query($conn,$sql);
if(mysqli_num_rows($getEmailQuery)==0){
	exit("can't find page");
}

if(isset($_POST['submit']))
{
	$password=$_POST['Password'];
	
	$row=mysqli_fetch_array($getEmailQuery);
	$user=$row['user'];
	
	$query=mysqli_query($conn,"update logintable set password='$password' where user='$user'");
}
?>
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
				font-weight:bold;
			}
			#pass, #sub{
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
		    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<label>Reset Password</label><br>
			<input id="pass" type="text" name="Password" placeholder="Password"><br>
			<input id="pass"type="text" name="cpassword" placeholder="confirm password"><br>
			<input id="sub" type="submit" name="submit" value="Update">
		</form>
	</div>
		<script>
			function ValidateForm(){
				var password=document.myform.Password.value;
				var cpassword=document.myform.cpassword.value;
				if(password=="" || password==null)
				{
					alert("Please enter a Password");
					return false;
				}
				else if(password=="" || password==null)
				{
					alert("Please enter a confirm Password");
					return false;
				}
				else if(password!=cpassword)
				{
					alert("Password and conform password should be same");
					return false;
				}
				else{
					return true;
				}
			}
		</script>
	<body>
</html>