
<?php require __DIR__.'/../auth_check.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>STUDENT DETAILS</title>
<link rel="stylesheet" href="m.css">
</head>
<body class="body">
<div class="login">
<form action="../auth_check.php" method="POST">
<h1>Login</h1>
<div class="user">
<img src="user.jpg" width="20px" height="20px"/>
<input class="iii" type="text" name="user_email" placeholder="Username"  value="fmfebinmathew@gmail.com" required/>
</div>
<div class="pass">
<img src="lock.jpg" width="20px" height="20px"/>
<script>
var img='open';
function myFunction() {
  var x = document.getElementById("yu");
  var i=document.getElementById("io");
  if (x.type == "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }


if(x.value.length>0 && img == "open")
	{
	document.getElementById("io").src="close.png";
	img='close';
	}
	else
	{
	i.src="open.png";
	img='open';
x.type="password";
	}
	
if(x.value.length==0)
i.src="open.png";
	
}
</script>
<input id="yu" type="password" name="user_pass" placeholder="Password" text="123456" required>
<span class="lkl" name="iii">
<img id="io" src="open.png"   name="open" width="20px" height="15px"  onclick="myFunction()"/>
</span>

</div><br>
<input id="bbb" type="submit" name="login" value="Login"/>
<br>
<input id="ghg" type="button" name="signup" value="signup" onclick="window.location='sign_up.php';"/>
<a  class="ww" href="fff.html">forget password</a>
</div>
</form>
</body>
</html>
