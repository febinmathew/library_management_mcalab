<html>
<head>
<title>signup_page</title>
<link rel="stylesheet" href="m.css">
</head>
<body class="body">
<div class="pop">
<h2>Sign up</h2>
<form action="../auth_check.php" method="POST">
<input type="text" name="user_name" placeholder="Enter Name" required><br>
<input type="text" name="user_email" placeholder="Enter Email" required><br>
<!-- <input type="text" name="department" placeholder="Enter Your Department" required><br> -->
<input type="text" name="admission_no" placeholder="Admission number" required><br>
<input type="password" name="user_pass" placeholder="Enter password" required><br>
<input type="password" name="user_pass_confirm" placeholder="Confirm password" required><br>
<button class="lol" name="sign_up" type="submit">Sign up</button>
</form>
</div>
</body>
</html>



