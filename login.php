<!DOCTYPE html>
<html>
<head>
	<title>MTPL</title>
	<link rel="stylesheet" href="loginstyle.css">
</head>
<body>
	<header>
		<div id="title">
			<center>
			<h1>MTPL</h1>
			<h2>Digital Cable Era</h2>
			</center>
		</div>
        <form name="form" id="form1"  action="logincheck.php" method="POST">
            <div class="input">Username: <input id="username" name="username1" type="text" placeholder="Enter Username.."></div>
            <span id="nam1"></span>
            <div class="input">Password: <input id="password" name="password1" type="text" placeholder="Enter Password.."></div>	
            <span id="mail"></span><br>
            <div class="input"><input type="submit" name="submits" value="login" style="width:280px;height:30px;background-color:blue;color:white;"></div><br>
			<a href="request.php" style="color: blue;margin-left:90px;font-size:1vw">forget password ?</a>
		</form>
		
	</header>
</body>
</html>

