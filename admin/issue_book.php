

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<?php
if (isset($_POST["user_id"]) && isset($_POST["book_id"])){

//echo $_POST["user_id"] . " /////////// ".$_POST["book_id"];
$sql = "INSERT INTO book_issue(user_id,book_id,issue_date,issue_status,return_date) VALUES(".
$_POST["user_id"] .",".
$_POST["book_id"].",CURDATE(),0,CURDATE()+10);";
//echo $sql;
if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE books SET book_quantity=book_quantity-1 WHERE id=".$_POST["book_id"].";";
		$conn->query($sql);
        echo "<div class=\"bg_card\" ><h4>Issue successful!</h4></div>";
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>
<body class="form_area">
<center>
<h2 class="m-3">New Book Issue</h2>
</center>
<!-- <input type="text" onkeyup="showHint(this.value)"> -->
<form method="POST" class="p-3">

<div class="form-group  col-sm-12 mt-1">
    <label for="exampleFormControlInput1">Enter User ID</label>

    <input type="number" required name="user_id" class="form-control" id="exampleFormControlInput1" placeholder="ex : 1">
	
	
</div>
<div class="form-group  col-sm-12">
    <label for="exampleFormControlInput1">Enter Book ID</label>

    <input type="number" required name="book_id" class="form-control" id="exampleFormControlInput1" placeholder="ex : 3">
	
<input class="btn btn-primary mt-3" type="submit" value="Create Issue" >
	
</div>

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