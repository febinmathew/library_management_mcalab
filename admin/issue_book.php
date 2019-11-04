

<?php require '../auth_check.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Issuers Details</title>

	<style type="text/css">
		.view_issue 
		{
			display: none;
		}
		table, th, td
		{
  			border: 1px solid black;
  			border-collapse: collapse;
		}
    </style>
    <link rel="stylesheet" type="text/css" href="../styles/main.css">
</head>
<body>
<input type="text" onkeyup="showHint(this.value)">
</body class="iframe_body">

<script>
function showHint(str) {
    if (str.length == 0) {
        //document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "gethint.php?q="+str, true);
        xmlhttp.send();
    }
}
</script>
</html>