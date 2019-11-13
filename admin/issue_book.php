

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
        .bg_card{
            background:white;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../styles/main.css">
</head>
<?php
if ($_POST["user_id"] && $_POST["book_id"]){

//echo $_POST["user_id"] . " /////////// ".$_POST["book_id"];
$sql = "INSERT INTO book_issue(user_id,book_id,issue_date,issue_status,return_date) VALUES(".
$_POST["user_id"] .",".
$_POST["book_id"].",CURDATE(),0,CURDATE()+10);";
//echo $sql;
if ($conn->query($sql) === TRUE) {
        echo "<div class=\"bg_card\" ><h2>New issue successfully</h2></div>";
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>
<body>
<!-- <input type="text" onkeyup="showHint(this.value)"> -->
<form method="POST">
<input type="number" name="user_id">
<input type="number" name="book_id">
<input type="submit" value="Create Issue" >
</form>
<!-- </body class="iframe_body"> -->

<script>
/*function showHint(str) {
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
}*/
</script>
</html>