
<?php 
require '../auth_check.php'; 
?>
<html>
<head>
<title>logcon</title>
<link rel="stylesheet" href="../dashboard.css">
</head>
<body class="body">
<div class="r">
<div class="q">
ADMIN
</div>
<img class="jf" src="../images/propic.png" /><br><br>
<div class="sd"><a href="./change_password.php" >
<button class="sd">Change Password</button></a></div><br>
<div class="ds"><a href="../auth_check.php?logout=1"><button class="ds">Logout</button></a></div>
</div>
<div class="km">
<div class="yr"><a href="./add_book.php" target="iframe">Add Book</a></div>
<div class="yrr"><a href="./view_book.php"target="iframe"/>View Books</a></div>
<div class="yp"><a href="./current_issues.php" target="iframe"/>Issued Books</a></div>
<div class="ypp"><a href="./issue_book.php" target="iframe"/>New Book Issue</a></div>
</div>
<iframe id="poy" class="dashboard_frame" name="iframe"></iframe>
</body>
</html>
