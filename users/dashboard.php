
<?php 
require '../auth_check.php'; 
?>
<html>
<head>
<title>logcon</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="../dashboard.css">
</head>
<body class="body">
<div class="r">
<div class="q">
USER
</div>
<img class="jf p-2" src="../images/propic.png" /><br><br>

<div class="text-center">
<a href="../admin/change_password.php" >
<div class="btn btn-large btn-info">Change Password</div></a>

<a href="../auth_check.php?logout=1" class=""><div class="mt-3 btn btn-danger">Logout</div></a>
</div>

</div>
<div class="km">
<!-- btn btn-large btn-default -->
<div class="yr"><a href="../admin/view_book.php" target="iframe" class="btn btn-md btn-light">View Books</a></div>
<div class="yrr "><a href="./current_issues.php" target="iframe" class="btn btn-md btn-light">Issue History</a></div>

</div>

<iframe id="poy" class="dashboard_frame" name="iframe" src="../admin/view_book.php"></iframe>
</body>
</html>